<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{

    public function index(){
        $auth = Auth::user();
        $getCart = Cart::where('user_id', $auth->id)->get()->toArray();
        $getOrder = Order::where('user_id', $auth->id)->get()->toArray();
        return view('dashboard')
        ->with('getOrder', $getOrder)
        ->with('getCart',$getCart);
    }
    
    public function orderDetails($id){
        $order = Order::where('id', $id)->first()->toArray();

        $getOrderProduct = OrderProduct::with('products','users')->where('order_id', $id)->get()->toArray();

        return view('user.pages.order-details')
        ->with('order', $order)
        ->with('getOrderProduct', $getOrderProduct);
    }
    public function userCart(){
        $auth =Auth::user();
        $getCart = Cart::where('user_id', $auth->id)->get()->toArray();
        return view('frontend.pages.cart')->with('getCart',$getCart);
    }


    public function addToCart(Request $request, $productId)
    {

         if (!Auth::check()) {
            Session::flash('error_message', 'Please login first.');
            return redirect()->back();
        }

        $user = auth()->user();

        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            Session::flash('error_message', 'Product is already in the cart');
            return redirect()->back();
        }

        Cart::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'qty' => $request->qty,
        ]);
        Session::flash('success_message', 'Product added to cart.');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        Session::flash('success_message', 'Product Delete successfully form your cart! ');
        return redirect()->back();
    }
}
