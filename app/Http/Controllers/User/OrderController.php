<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $cartQuery = Cart::query();

        $existingCartItem = $cartQuery->where('user_id', $request->id)->count();


        if ($existingCartItem) {
            Session::flash('error_message', 'Please add product in your cart first!');
            return redirect()->back();
        }

        $getCart = Cart::with('products','users')->where('user_id',$request->user_id)->get()->toArray();

        $getProductIds = Cart::where('user_id', $request->user_id)->pluck('product_id');
        $getSellerIds = Product::whereIn('id', $getProductIds)->get()->pluck('user_id')->toArray();
        // dd($getSellerIds);

        // $sellerIds = json_decode($getSellerIds);
        // dd($sellerIds);

        $invoice = Order::max('invoice_number') + 1;
        DB::beginTransaction();
        $auth = Auth::user();

        $order = new Order();
        $order->invoice_number =  $invoice; 
        $order->user_id =  $request->user_id; 
        $order->grand_total = $request->grand_total; 
        $order->save();
        // Attach sellers to the order in the order_seller table
        $order->sellers()->attach($getSellerIds);

        $order_id = DB::getpdo()->lastInsertId();
        $this->addOrderProducts($order,$getCart,$order_id, $invoice);
        Cart::where('user_id', $auth->id)->delete();

        Session::flash('success_message', 'Order created successfully!');
        DB::commit();

        return redirect()->back();
    }

    // Function to add order products
    private function addOrderProducts(Order $order,$getCart,$order_id,$invoice)
    {
        foreach ($getCart as $key => $cartItem) {

            $product = $cartItem['product_id'];    
            $product = Product::where('id', $cartItem['product_id'])->first();
            // dd($product);
            if ($product) {
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $order_id;
                $orderProduct->invoice_number = $invoice;
                $orderProduct->seller_id = $product->user_id;
                $orderProduct->user_id = $cartItem['user_id'];
                $orderProduct->product_id = $cartItem['product_id'];
                $orderProduct->price = $product->price;
                $orderProduct->grand_total = $product->price;
                $orderProduct->qty = 1;
                // dd($orderProduct);
                $orderProduct->save();
            }
            // dd($product,12);
        }
    }


}
