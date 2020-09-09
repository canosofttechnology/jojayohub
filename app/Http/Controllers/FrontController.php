<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\SecondaryCategory;
use App\Models\PrimaryCategory;
use App\Models\Product;
use App\Models\Region;
use App\Models\City;
use App\Models\Area;
use App\Models\AddressBook;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Wholesale;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use URL;

class FrontController extends Controller
{

    protected $product_categories = null;
    protected $secondary_categories = null;
    protected $product = null;
    protected $regions = null;
    protected $city = null;
    protected $blog = null;
    protected $page = null;
    protected $slider = null;
    protected $address_book = null;
    protected $brand = null;

    public function __construct(ProductCategory $product_categories, Product $products, Region $regions, City $city, Area $area, AddressBook $address_book, Brand $brand, SecondaryCategory $secondary_categories, Page $page, Blog $blog, Slider $slider)
    {
        $this->product_categories = $product_categories;
        $this->secondary_categories = $secondary_categories;
        $this->products = $products;
        $this->regions = $regions;
        $this->city = $city;
        $this->page = $page;
        $this->blog = $blog;
        $this->slider = $slider;
        $this->area = $area;
        $this->brand = $brand;
        $this->address_book = $address_book;
    }

    public function index()
    {
        $all_blogs = $this->blog->take(10)->get();
        $hero_slider = $this->slider->take(3)->get();
        $latest_products = $this->products->with('images')->orderBy('created_at', 'desc')->take(12)->get();
        $brand_list = $this->brand->get();
        $men_name = "Women's Fashion";
        $pc = PrimaryCategory::with('secondaryCategories.productCategories.products')->where('name', $men_name)->first();
        $men_fashion = $pc->secondaryCategories->pluck('productCategories')->collapse()->pluck('products')->collapse();
        //dd($men_fashion);
        $name = "Women's Fashion";
        $women_fashion = Product::whereHas('productCategory', function ($query)
        use ($name) {
            $query->whereHas('secondaryCategory', function ($query)
            use ($name) {
                $query->whereHas('primaryCategory', function ($query)
                use ($name) {
                    $query->where('name', $name);
                });
            });
        })
            ->with([
                'productCategory' => function ($query) use ($name) {
                    $query->whereHas('secondaryCategory', function ($query) use ($name) {
                        $query->whereHas('primaryCategory', function ($query)
                        use ($name) {
                            $query->where('name', $name);
                        });
                    });
                },
                'productCategory.secondaryCategory' => function ($query) use ($name) {
                    $query->whereHas('primaryCategory', function ($query)
                    use ($name) {
                        $query->where('name', $name);
                    });
                },
                'productCategory.secondaryCategory.primaryCategory' =>
                function ($query) use ($name) {
                    $query->where('name', $name);
                }
            ])->take(10)->get();
        // Electronic device
        $electronic_device = "Electronic Device";
        $electronic_device_product = Product::whereHas('productCategory', function ($query)
        use ($electronic_device) {
            $query->whereHas('secondaryCategory', function ($query)
            use ($electronic_device) {
                $query->whereHas('primaryCategory', function ($query)
                use ($electronic_device) {
                    $query->where('name', $electronic_device);
                });
            });
        })
            ->with([
                'productCategory' => function ($query) use ($electronic_device) {
                    $query->whereHas('secondaryCategory', function ($query) use ($electronic_device) {
                        $query->whereHas('primaryCategory', function ($query)
                        use ($electronic_device) {
                            $query->where('name', $electronic_device);
                        });
                    });
                },
                'productCategory.secondaryCategory' => function ($query) use ($electronic_device) {
                    $query->whereHas('primaryCategory', function ($query)
                    use ($electronic_device) {
                        $query->where('name', $electronic_device);
                    });
                },
                'productCategory.secondaryCategory.primaryCategory' =>
                function ($query) use ($electronic_device) {
                    $query->where('name', $electronic_device);
                }
            ])->take(2)->get();

        // Electronic accessories
        $electronic_accessories = "Electronic Accessories";
        $electronic_accessories_product = Product::whereHas('productCategory', function ($query)
        use ($electronic_accessories) {
            $query->whereHas('secondaryCategory', function ($query)
            use ($electronic_accessories) {
                $query->whereHas('primaryCategory', function ($query)
                use ($electronic_accessories) {
                    $query->where('name', $electronic_accessories);
                });
            });
        })
            ->with([
                'productCategory' => function ($query) use ($electronic_accessories) {
                    $query->whereHas('secondaryCategory', function ($query) use ($electronic_accessories) {
                        $query->whereHas('primaryCategory', function ($query)
                        use ($electronic_accessories) {
                            $query->where('name', $electronic_accessories);
                        });
                    });
                },
                'productCategory.secondaryCategory' => function ($query) use ($electronic_accessories) {
                    $query->whereHas('primaryCategory', function ($query)
                    use ($electronic_accessories) {
                        $query->where('name', $electronic_accessories);
                    });
                },
                'productCategory.secondaryCategory.primaryCategory' =>
                function ($query) use ($electronic_accessories) {
                    $query->where('name', $electronic_accessories);
                }
            ])->take(2)->get();

        // Tv
        $tv_and_home = "TV & Home Appliances";
        $tv_and_home = Product::primary("TV & Home Appliances")->get();

        $available_brands = $this->brand->get();
        return view('frontend.pages.index', compact('latest_products', 'available_brands', 'women_fashion', 'men_fashion', 'all_blogs', 'hero_slider', 'brand_list', 'electronic_device_product', 'electronic_accessories_product', 'tv_and_home_product'));
    }

    public function singleProduct($slug)
    {
        $data = $this->products->with('images')->with('colors')->with('sizes')->with('set')->where('slug', $slug)->first();
        $ids = array();
        $productId = $data->id;
        $catid = $data->category_id;
        foreach (Cart::content() as $row) {
            if ($row->id == $data->id) {
                array_push($ids, $row->rowId);
            }
        }
        $related = Product::where('category_id', '=', $catid)->with('images')
            ->where('id', '!=', $productId)
            ->take(10)->get();
        return view('frontend.pages.single', compact('data', 'related', 'ids'));
    }

    public function warranty(Request $request)
    {
        $data = $this->product_categories->where('id', $request->mycat)->first();
        if ($data->warranty == 1) {
            $data = "Yes";
        } else {
            $data = "No";
        }
        return response()->json($data);
    }

    public function addressBookAdd()
    {
        $region_data = $this->regions->get();
        return view('frontend.pages.address-book', compact('region_data'));
    }

    public function addressBookData()
    {
        return view('frontend.pages.address-book-data');
    }

    public function getCity(Request $request)
    {
        $data = $this->city->where('region_id', $request->id)->get();
        return response()->json($data);
    }

    public function getArea(Request $request)
    {
        $data = $this->area->where('city_id', $request->id)->get();
        return response()->json($data);
    }

    public function shipping()
    {
        $user_id = \Auth::user()->id;
        $my_location = $this->address_book->where('user_id', $user_id)->get();
        return view('frontend.pages.shipping', compact('my_location'));
    }

    public function shop(Request $request)
    {
        $selected_sales_types = $request->sales_type;
        $ex = explode(',', $selected_sales_types);
        $selected_sales_types = Wholesale::whereIn('name', $ex)->get()->pluck('id')->toArray();

        $sort = $request->sort;
        $requested_sales_type = $request->sales_type;
        if (!isset($sort))
            $sort = 'asc';
        $requested_brands = $request->brands;
        $ex = explode(',', $requested_brands);
        $selected_brands = $this->brand->whereIn('slug', $ex)->get()->pluck('id')->toArray();
        $all_products = $this->products->with('images', 'set')
            ->when(count($selected_brands) > 0, function ($query) use ($selected_brands) {
                foreach ($selected_brands as $brand) {
                    $query->orWhere('brand_id', $brand);
                }
                return $query;
            })
            ->when(count($selected_sales_types) > 0, function ($q) use ($selected_sales_types) {
                $q->whereHas('set', function ($q) use ($selected_sales_types) {
                    $q->whereIn('wholesale_id', $selected_sales_types);
                });
            })

            ->when($sort, function ($query) use ($sort) {
                $query->orderBy('name', $sort);
            })
            // ->with('getColors')
            ->paginate(15);
        // dd($selected_sales_types);
        $sale_types = Wholesale::all();
        $brands = $this->brand->get();
        return view('frontend.pages.shop', compact('all_products', 'brands', 'selected_brands', 'sort', 'sale_types','selected_sales_types'));

        //   $all_products = $this->products->with('images')->paginate(15);
        //   return view('frontend.pages.shop', compact('all_products'));
    }

    public function categories($prime_slug, $slug = null, Request $request)
    {
        $primary_category=SecondaryCategory::where('slug',$prime_slug)->first();
        $product_category=ProductCategory::where('secondary_category_id',$primary_category->id)->get()->pluck('id')->toArray();
        $related_brand_ids=Product::whereIn('category_id',$product_category)->get()->pluck('brand_id')->filter()->unique()->toArray();

        // dd($products);

        $selected_sales_types = $request->sales_type;
        $ex = explode(',', $selected_sales_types);
        $selected_sales_types = Wholesale::whereIn('name', $ex)->get()->pluck('id')->toArray();

        $sort = $request->sort;
        if (!isset($sort))
            $sort = 'asc';
        $selected_brands = $request->brands;
        $ex = explode(',', $selected_brands);
        $selected_brands = $this->brand->whereIn('slug', $ex)->get()->pluck('id')->toArray();
        // $category_slug = isset($slug) ? 'yes':'on';
        $category_slug = isset($slug) ? $this->product_categories->where('slug', $slug)->first() : $this->secondary_categories->where('slug', $prime_slug)->first();

        $category_product = $this->products->with('images')
            ->when(!isset($slug), function ($query) use ($category_slug) {
                $ids = $category_slug->FinalCategory()->pluck('id');
                return $query->whereIn('category_id', $ids);
            })
            ->when(count($selected_brands) > 0, function ($query) use ($selected_brands) {
                return $query->whereIn('brand_id', $selected_brands);
            })
            ->when(isset($slug), function ($query) use ($category_slug) {
                return $query->where('category_id', $category_slug->id);
            })
            ->when(count($selected_sales_types) > 0, function ($q) use ($selected_sales_types) {
                $q->whereHas('set', function ($q) use ($selected_sales_types) {
                    $q->whereIn('wholesale_id', $selected_sales_types);
                });
            })
            ->when($sort, function ($query) use ($sort) {
                $query->orderBy('name', $sort);
            })

            ->paginate(12);

        $brands = $this->brand->whereIn('id',$related_brand_ids)->get();
        $sale_types = Wholesale::all();


        return view('frontend.pages.categories', compact('category_product', 'category_slug', 'brands', 'selected_brands', 'sort','sale_types','selected_sales_types'));

        // eliesha's code
        //   $category_slug = $this->product_categories->where('slug', $slug)->first(); //dd($category_slug);
        //   $category_product = $this->products->with('images')->where('category_id', $category_slug->id)->paginate(12);//dd($category_product);
        //   return view('frontend.pages.categories', compact('category_product','category_slug'));
    }

    public function page($slug)
    {
        $page_detail = $this->page->where('slug', $slug)->first();
        if (!$page_detail) {
            return abort(404);
        }
        return view('frontend.pages.page', compact('page_detail'));
    }

    public function blog()
    {
        $all_blogs = $this->blog->paginate(10);
        $blog_detail = $this->blog->where('slug', $slug)->first();
        return view('frontend.pages.blogs', compact('all_blogs', 'blog_detail'));
    }

    public function BlogDetail($slug)
    {
        $all_blogs = $this->blog->paginate(10);
        $blog_detail = $this->blog->where('slug', $slug)->first();
        return view('frontend.pages.blog', compact('blog_detail', 'all_blogs'));
    }

    public function eSewa()
    {
        $gateway = "esewa";
        $tAmt = "100";
        $ClientId = 'ee2c3ca1-696b-4cc5-a6be-2c40d929d453';
        date_default_timezone_set('Asia/Kathmandu');
        $date = date('y/m/d H:i:s');
        $a = str_replace("/", "", $date);
        $b = str_replace(":", "", $a);
        $c = str_replace(" ", "", $b);
        $pid = $c . "-" . $ClientId;
        $url = "";
        $base_url = URL::to('/');

        if ($gateway == "esewa") {
            $url = 'https://uat.esewa.com.np/epay/main?amt=' . $tAmt . '&pdc=0&pdc=0&psc=0&txAmt=0&tAmt=' . $tAmt . '&pid=' . $pid . '&scd=epay_payment' . '&su=' . $base_url . '/payment/esewa_success?q=su' . '&fu=' . $base_url . '/payment/esewa_failed?q=fu';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    // Set Here Your Requested Headers
                    'Content-Type: application/json',
                ),
            ));

            $response = curl_exec($curl);
            var_dump($response);
            $response = trim(strip_tags($response));
            var_dump($response);
        }
    }

    public function cartContent()
    {
        $item = Cart::content();
        return response()->json($item);
    }

    public function review()
    {
        if (cart::count() > 0) {
            return view('frontend.pages.review');
        }
        return redirect()->route('shopPage');
    }
}
