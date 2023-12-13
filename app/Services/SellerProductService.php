<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SellerProductService
{
    public static function validateProductRequestForSeller(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'image',
        ];

        $customMessages = [
            'name.required' => 'Product name is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'description.required' => 'Description is required',
            'quantity.required' => 'Quantity is required',
            'quantity.numeric' => 'Quantity must be a number',
            'image.image' => 'Valid image is required',
        ];

        $request->validate($rules, $customMessages);
    }

    public static function makeUniqueSlugForSeller($baseSlug)
    {
        $newSlug = $baseSlug;
        $counter = 1;

        while (Product::where('slug', $newSlug)->exists()) {
            $newSlug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $newSlug;
    }

    public static function handleProductImageForSeller($request, $productData)
    {
        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $imageName = Str::slug($request->input('name'), '-') . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('admin/images/admin_photos/products/')) {
                Storage::disk('public')->makeDirectory('admin/images/admin_photos/products/');
            }

            $mediumImage = Image::make($image)->resize(256, 256, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();

            Storage::disk('public')->put('admin/images/admin_photos/products/' . $imageName, $mediumImage);
        } else {
            $imageName = !empty($productData['image']) ? $productData['image'] : 'default.jpg';
        }

        return $imageName;
    }

}
