<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(){
        $auth = Auth::user();
        $sellerId = $auth->id;
        
        $getOrders = Order::whereHas('sellers', function ($query) use ($sellerId) {
            $query->where('seller_id', $sellerId);
        })->get()->toArray();

        return view('seller.order.index')
            ->with('getOrders', $getOrders);
        }
    
    public function sellerOrderDetails($id){
        $order = Order::where('id', $id)->first()->toArray();

        $getOrderProduct = OrderProduct::with('products','users')->where('order_id', $id)->get()->toArray();

        return view('seller.order.order-details')
        ->with('order', $order)
        ->with('getOrderProduct', $getOrderProduct);
    }
}
