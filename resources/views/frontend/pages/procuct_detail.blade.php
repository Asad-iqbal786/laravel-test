@extends('layouts.frontend_app')

@section('main-content')


  <!-- Single Products -->
  <div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="{{ asset('storage/admin/images/admin_photos/products/' . $productDetails['image']) }}" width="100%" id="ProductImg">

            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="{{asset('frontend/images/gallery-1.jpg')}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{asset('frontend/images/gallery-2.jpg')}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{asset('frontend/images/gallery-3.jpg')}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{asset('frontend/images/gallery-4.jpg')}}" width="100%" class="small-img">
                </div>
            </div>

        </div>
        <div class="col-2">
            <p>Home / T-Shirt</p>
            <h1>{{$productDetails['name']}}</h1>
            <h4>${{$productDetails['price']}}</h4>
            <select>
                <option>Select Size</option>
                <option>XXL</option>
                <option>XL</option>
                <option>L</option>
                <option>M</option>
                <option>S</option>
            </select>
            @if(Session::has('success_message'))
                <div class="alert alert-success" style="    background: green;
                margin-top: 7px;
                padding: 10px;">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-warning" style="    background: red;
                margin-top: 7px;
                padding: 10px;">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <form action="{{route('addToCart',$productDetails['id'])}}" method="post">@csrf
                <input type="number" name="qty" value="1" min="1">
                <input type="hidden" name="productId" value="{{$productDetails['id']}}">
                <button type="submit" class="btn">Add To Cart</button>
            </form>
            <p>Quantity: {{ $productDetails['quantity']}}</p>

            <h3>Product Details <i class="fa fa-indent"></i></h3>
            <br>
            <p>{{$productDetails['description']}}</p>
        </div>
    </div>
</div>
<!-- title -->
<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View More</p>
    </div>
</div>
<!-- Products -->
<div class="small-container">
    <div class="row">
        @forelse ($getProducts as $product)
        <div class="col-4">
            <a href="{{route('productDetails',$product['slug'])}}"><img src="{{ asset('storage/admin/images/admin_photos/products/' . $product['image']) }}"></a>
            <h4>{{ $product['name'] }}</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>${{$product['price']}}</p>
        </div>
       
        @empty
            <p class="text-center">No product found</p>
        @endforelse
    </div>
</div>



@endsection





@push('scripts')

@endpush
