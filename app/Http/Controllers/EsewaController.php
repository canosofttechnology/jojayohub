<?php

namespace App\Http\Controllers;

use App\Models\Esewa;
use App\Models\Order;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


/**
 * Class EsewaController
 * @package App\Http\Controllers
 */
class EsewaController extends Controller
{
    protected $order = null;
    
    public function __construct(Order $order){
        $this->order = $order;
    }

    public function checkout(Request $request)
    {
        $order = Order::findOrFail(mt_rand(1, 20));

        return view('frontend.esewa.checkout');
    }

    public function success(Request $request){
        return view('frontend.esewa.success');
    }

    /**
     * @param $order_id
     * @param Request $request
     */
    public function payment(Request $request)
    {
        $cart = Cart::content()->groupBy('id');
        $total_amount = str_replace(',','',Cart::total());
        $total_amount = str_replace('.00','',$total_amount);
        $total_amount = $total_amount + 20;
        $gateway = with(new Esewa);
        $url = 'JOJAYO-'.str_pad(time() + 1, 8, "0", STR_PAD_LEFT);
        $gateway = with(new Esewa);
        try {
            $response = $gateway->purchase([
                'amount' => $total_amount,
                'totalAmount' => $total_amount,
                'productCode' => $url,
                'failedUrl' => $gateway->getFailedUrl($url),
                'returnUrl' => $gateway->getReturnUrl($url),
                'merchantCode' => 'epay_payment',
            ], $request);

        } catch (Exception $e) {
            return redirect()
                ->route('checkout.payment.esewa.failed', [$url])
                ->with('message', sprintf("Your payment failed with error: %s", $e->getMessage()));
        }

        if ($response->isRedirect()) {
            $response->redirect();
        }

        return redirect()->back()->with([
            'message' => "We're unable to process your payment at the moment, please try again !",
        ]);
    }

    /**
     * @param $order_id
     * @param Request $request
     */
    public function completed($order_id, Request $request)
    {
        $gateway = with(new Esewa);
        $response = $gateway->verifyPayment([
            'amount' => $gateway->formatAmount($request->get('amt')),
            'referenceNumber' => $request->get('refId'),
            'productCode' => $request->get('oid'),
        ], $request);        
        if ($response->isSuccessful()) {
            foreach(Cart::content() as $row){
                $order_table = new Order();
                $data['product_id'] = $row->id;
                $data['price'] = $row->price;
                $data['quantity'] = $row->qty;
                $data['color_id'] = $row->options->color_id;
                $data['size_id'] = $row->options->size_id;
                $data['user_id'] = auth()->user()->id;
                $data['order_id'] = $order_id;
                $data['status'] = 'Processing';
                $order_table->fill($data);
                $order_table->save();
            }
            $message = "Thank you for your shopping, Your recent payment was successful.";
            Cart::destroy();
            $order_detail = $this->order->with('products')->where('order_id', $order_id)->get();
            return view('frontend.esewa.success', compact('message', 'order_detail'));
        }
        return redirect()->route('checkout.payment.esewa')->with([
            'message' => 'Thank you for your shopping, However, the payment has been declined.',
        ]);
    }

    /**
     * @param $order_id
     * @param Request $request
     */
    public function failed($order_id, Request $request)
    {
        $order = Order::findOrFail($order_id);

        return view('frontend.esewa.checkout', compact('order'));
    }
}
