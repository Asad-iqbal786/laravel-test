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
use Illuminate\Support\Str;

use App\Services\SellerProductService;
class ProductController extends Controller
{
    public function index(){
        $auth =  Auth::user();
        $getProducts = Product::where('user_id',  $auth ->id)->get()->toArray();
        return view('seller.product.index')->with('getProducts',$getProducts);
    }
 

    public function addEditSellerProduct(Request $request, $id = null)
    {
        $auth =  Auth::user();
        if ($id == "") {
            $title = "Add Product";
            $product = new Product;
            $productData = array();
            $user_id = $auth['id'];
            $message = "Product add successfully ";
        } else {
            $title = "Edit Product";
            $productData = Product::where('id', $id)->first();
            $productData = json_decode(json_encode($productData), true);
            $product =  Product::find($id);
            $user_id = $product['user_id'];
            $message = "Product update successfully ";
        }
        if ($request->isMethod('post')) {

            SellerProductService::validateProductRequestForSeller($request);
            $imageName = SellerProductService::handleProductImageForSeller($request, $productData);
            $baseSlug = Str::slug($request->input('name'));
            $uniqueSlug = SellerProductService::makeUniqueSlugForSeller($baseSlug);

            $data = $request->all();
            $product->slug = $uniqueSlug;
            $product->image = $imageName;
            $product->name = $data['name'];
            $product->quantity = $data['quantity'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            $product->user_id = $user_id;
            $product->status = 1;
            // dd($product);
            $product->save();
            Session::flash('success_message', $message);
            return redirect()->route('sellerProduct');
        }

        return view('seller.product.add-edit-product')
            ->with('title', $title)
            ->with('productData', $productData);
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // Storage::disk('public')->delete('admin/images/admin_photos/products/' . $product->image);
        $product->delete();
        Session::flash('success_message', 'Product Delete successfully ! ');
        return redirect()->back();
    }
}
