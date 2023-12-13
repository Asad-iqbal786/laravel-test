<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SellerController extends Controller
{
    public function index(){
        $auth= Auth::user();
        $getProduct = Product::where('user_id',  $auth->id)->get();
        return view('seller.index')->with('getProducts',$getProduct);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
