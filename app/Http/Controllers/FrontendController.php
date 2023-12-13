<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class FrontendController extends Controller
{
    public function index(){
        $getProducts = Product::where('status',1)->get()->toArray();

        return view('frontend.index')->with('getProducts',$getProducts);
    }

    public function cart(){
        $auth = Auth::user();
        $getCart = Cart::with('products','users')->where('user_id', $auth['id'])->get()->toArray();
        return view('frontend.pages.cart')->with('getCart',$getCart);
    }
    public function allProducts(){
        $getProducts = Product::where('status',1)->get()->toArray();

        return view('frontend.pages.all_products')->with('getProducts',$getProducts);
    }
    public function productDetails($slug){
        
        $getProducts = Product::where('status',1)->get()->toArray();
        $productDetails = Product::where('slug',$slug)->where('status',1)->first()->toArray();

        return view('frontend.pages.procuct_detail')
        ->with('productDetails',$productDetails)
        ->with('getProducts',$getProducts);
    }


    public function loginRegister(){

        return view('frontend.pages.login_register');
    }
}
