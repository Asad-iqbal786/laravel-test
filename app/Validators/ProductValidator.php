<?php

namespace App\Validators;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ProductValidator
{
    public static function validateProductRequest(Request $request)
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
}
