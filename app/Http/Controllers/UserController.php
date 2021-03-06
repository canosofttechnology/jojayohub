<?php

namespace App\Http\Controllers;

use App\Mail\CustomerVerification;
use App\Models\CategoryPermitted;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    protected $user = null;
    protected $customer = null;
    protected $category = null;
    protected $vendor = null;
    protected $employee = null;
    protected $category_permitted = null;

    public function __construct(User $user,Customer $customer,ProductCategory $category,Vendor $vendor,Employee $employee,CategoryPermitted $category_permitted)
    {
        $this->user = $user;
        $this->customer = $customer;
        $this->category = $category;
        $this->vendor = $vendor;
        $this->employee = $employee;
        $this->category_permitted = $category_permitted;
        //$this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_tab = "manage";
        $allCategories = $this->category->get();
        $allUsers = $this->user->where('roles', '!=', 'customers')->get();
        return view('admin.pages.users', compact('allUsers', 'active_tab', 'allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active_tab = "create";
        $allCategories = $this->category->get();
        $allUsers = $this->user->where('roles', '!=', 'customers')->get();
        return view('admin.pages.users', compact('allUsers', 'active_tab', 'allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->user->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['contact'] = $request->contact;
        $data['image'] = $request->image;
        $data['roles'] = $request->roles;

        $this->user->fill($data);
        $status = $this->user->save();
        $user_id = $this->user->id;
        if($data['roles'] == 'vendor'){
            $vendor_data['user_id'] = $user_id;
            $vendor_data['company'] = $request->company;
            $vendor_data['company_address'] = $request->company_address;
            $vendor_data['vendor_address'] = $request->vendor_address;
            $vendor_data['status'] = $request->status;
            $this->vendor->fill($vendor_data);
            $vendor_data = $this->vendor->save();
            $vendor_id = $this->vendor->id;
            if($vendor_data){
                if(!empty($request->categories)){
                    foreach($request->categories as $cat_permitted){
                        CategoryPermitted::create([
                            'vendor_id' => $vendor_id,
                            'category_id' => $cat_permitted
                        ]);
                    }
                }
            }
        }
        if($data['roles'] == 'employee'){
            $employee_data['user_id'] = $user_id;
            $employee_data['DOB'] = $request->DOB;
            $employee_data['address'] = $request->address;
            $employee_data['salary'] = $request->salary;
            $employee_data['status'] = $request->status;
            $this->employee->fill($employee_data);
            $this->employee->save();
        }
        if($data['roles'] == 'customer'){
            $customer_data['user_id'] = $user_id;
            $customer_data['billing_address'] = $request->billing_address;
            $customer_data['shipping_address'] = $request->shipping_address;
            $customer_data['token'] = sha1(time());
            $customer_data['status'] = $request->status;
            $this->customer->fill($customer_data);
            $this->customer->save();
            Mail::to($data['email'])->send(new CustomerVerification($customer_data));
            return redirect('/customer/dashboard');
        }

        if($status){
            $request->session()->flash('success','User created successfully.');
        } else {
            $request->session()->flash('error','Problem while creating user.');
        }
        return redirect()->route('users.index');
    }

    public function customerSignUp(Request $request){
      $rules = $this->user->getRules();
      $request->validate($rules);
      $data = $request->all();
      $data['email'] = $request->email;
      $password = $request->password;
      $confirm = $request->confirm;
      if($password != $confirm){
        $errors = new MessageBag(['confirm' => ['Password confirmation did not matched!']]);
        return redirect()->back()->withErrors($errors)->withInput($request->all());
      }
      $data['password'] = Hash::make($request->password);
      $data['contact'] = $request->contact;
      $data['image'] = $request->image;
      $data['roles'] = 'customers';
      $this->user->fill($data);
      $customer_data = array();
      $this->user->save();
      $customer_data['token'] = sha1(time());
      $customer_data['email'] = $request->email;
      Mail::to($data['email'])->send(new CustomerVerification($customer_data));
      request()->session()->flash('success', 'Please open your email and click on the confirmation link to verify your email address.');
      return redirect()->route('signinform');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->user->find($id);
        if(!$data) {
            request()->session()->flash('error','User not found');
            return redirect()->back();
        }
        $allCategories = $this->category->get();
        $vendor_data = '';
        $employee_data = '';
        $permitted = '';
        if($data->roles == 'vendor'){
            $vendor_data = $this->vendor->where('user_id', $id)->first();
            $permitted = $this->category_permitted->where('vendor_id', $vendor_data->id)->get();
        } elseif($data->roles ==  'employee'){
            $employee_data = $this->employee->where('user_id', $id)->first();
        }
        $active_tab = 'create';
        $allUsers = $this->user->where('roles', '!=', 'customers')->get();
        return view('admin.pages.users', compact('allUsers', 'allCategories','data', 'permitted', 'employee_data', 'vendor_data', 'active_tab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['user_id'] = $id;
        $this->user = $this->user->find($id);
        if(!$this->user) {
            request()->session()->flash('error','User not found');
            return redirect()->back();
        }
        if($request->password == null){
            $request['password'] = $this->user->password;
        }
        $rules = $this->user->getRules('update');
        $request->validate($rules);
        $data = $request->all();
        $this->user->fill($data);
        $user_status = $this->user->save();
        if($user_status){
            if($data['roles'] == 'vendor'){
                $this->vendor = $this->vendor->where('user_id', $id)->first();
                $vendor_data['user_id'] = $id;
                $vendor_data['company'] = $request->company;
                $vendor_data['company_address'] = $request->company_address;
                $vendor_data['vendor_address'] = $request->vendor_address;
                $vendor_data['status'] = $request->status;
                $this->vendor->fill($vendor_data);
                $vendor_data = $this->vendor->save();
                $vendor_id = $this->vendor->id;
                if($vendor_data){
                    $users_to_delete = $this->category_permitted->where('vendor_id', $vendor_id)->get()->toArray();
                    $ids_to_delete = array_map(function($item){ return $item['id']; }, $users_to_delete);
                    DB::table('category_permitteds')->whereIn('id', $ids_to_delete)->delete();
                    if(!empty($request->categories)){
                        foreach($request->categories as $cat_permitted){
                            CategoryPermitted::create([
                                'vendor_id' => $vendor_id,
                                'category_id' => $cat_permitted
                            ]);
                        }
                    }
                }
            }
            if($data['roles'] == 'employee'){
                $this->employee = $this->employee->where('user_id', $id)->first();
                $employee_data['user_id'] = $id;
                $employee_data['DOB'] = $request->DOB;
                $employee_data['address'] = $request->address;
                $employee_data['salary'] = $request->salary;
                $employee_data['status'] = $request->status;
                $this->employee->fill($employee_data);
                $this->employee->save();
            }
        }
        $request->session()->flash('success','User updated successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user = $this->user->find($id);
        if(!$this->user){
            request()->session()->flash('error','User Not found');
            return redirect()->route('users.index');
        }

        $success = $this->user->delete();
        if($success){
            request()->session()->flash('success','User deleted successfully.');
        } else {
            request()->session()->flash('error','Sorry! User could not be deleted at this moment.');
        }
        return redirect()->route('users.index');
    }

    public function login(Request $request){
        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user === null) {
            $errors = new MessageBag(['email' => ['User not found in database.']]);
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
        $password = Hash::check($request->input('password'), $user->password);
         if(!$password){
             $errors = new MessageBag(['password' => ['password mismatched!']]);
             return redirect()->back()->withErrors($errors)->withInput($request->all());
        }

        if($user->roles == 'customers'){
          $errors = new MessageBag(['email' => ['You cannot login to '.$user->roles.' dashboard with this email.']]);
          return redirect()->back()->withErrors($errors)->withInput($request->all());
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if($user->roles == 'admin'){
                return redirect('/auth/dashboard');
            } elseif($user->roles == 'vendor'){
                return redirect('/auth/dashboard');
            } elseif($user->roles == 'employee'){
                return redirect('/auth/dashboard');
            }

        }
    }

    public function CustomerLogin(Request $request){
        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user === null) {
          request()->session()->flash('email','Email not found in our database.');
          return back();
        }
        $password = Hash::check($request->input('password'), $user->password);
         if(!$password){
           request()->session()->flash('password','Password mismatched!');
           return back();
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->roles == 'customers'){
                return redirect('/dashboard');
            }  else {
              request()->session()->flash('warning','You cannot login to '.Auth::user()->roles.' dashboard from this form!');
              return back();
            }

        }
    }

    // public function redirectToProvider()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    public function redirectToProvider($service) {
        return Socialite::driver ( $service )->redirect ();
    }

    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->user();
        $userExists = User::where('email', '=', $user->getEmail())->first();
        if ($userExists) {
            $usersRole = $userExists->roles;
            if($usersRole !== 'customers'){
                request()->session()->flash('warning','You cannot log in to customers dashboard with this Facebook account!');
              return back();
            }
          Auth::login($userExists);
          return redirect('dashboard');
        }
        $password = $user->getId().'password'.$user->getNickname();
        $data['name'] = $user->getName();
        $data['email'] = $user->getEmail();
        $data['password'] = Hash::make($password);
        $data['image'] = $user->getAvatar();
        $data['roles'] = 'customers';
        $this->user->fill($data);
        $status = $this->user->save();
        $userNew = User::where('email', '=', $user->getEmail())->first();
        Auth::login($userNew);
        return redirect('dashboard');
    }

    public function UpdateUser(Request $request, $id){
      $user_data = $this->user->find($id);

      if(!$user_data) {
          request()->session()->flash('error','User not found');
          return redirect()->back();
      }
      if($request->password == null){
          $request['password'] = $this->user->password;
      }
      if($request->change_password == 1){
        if (Hash::check($request->old_password, $user_data->password)) {
          $errors = new MessageBag(['old_password' => ['The old password you entered did not matched!']]);
          return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
        $request['password'] = Hash::make($request->confirm);
      }
      $rules = $this->user->getRules('update');
      $request->validate($rules);
      $data = $request->all();
      $this->user->fill($data);
      $user_status = $this->user->save();
    }
}
