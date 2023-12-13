<?php

namespace App\Http\Controllers\Admin;

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
        $getOrder = Order::get()->toArray();
        
        return view('admin.order.index')
        ->with('getOrder', $getOrder);
        }
    
    public function adminOrderDetails($id){
        $order = Order::where('id', $id)->first()->toArray();

        $getOrderProduct = OrderProduct::with('products','users')->where('order_id', $id)->get()->toArray();

        return view('admin.order.order-details')
        ->with('order', $order)
        ->with('getOrderProduct', $getOrderProduct);
    }
}
