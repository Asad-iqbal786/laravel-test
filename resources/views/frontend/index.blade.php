@extends('layouts.frontend_app')

@section('main-content')


    <!-- Feadtued Categories -->

    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="{{asset('frontend/images/category-1.jpg')}}">
                </div>
                <div class="col-3">
                    <img src="{{asset('frontend/images/category-2.jpg')}}">
                </div>
                <div class="col-3">
                    <img src="{{asset('frontend/images/category-3.jpg')}}">
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->

    <div class="small-container">
        <h2 class="title">Featured Products</h2>
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
        <h2 class="title">Latest Products</h2>
        <div class="row">
            @forelse ($getProducts as $product)

            <div class="col-4">
                <a href="{{route('productDetails',$product['slug'])}}"><img src="{{ asset('storage/admin/images/admin_photos/products/' . $product['image']) }}"></a>                <h4>{{ $product['name'] }}</h4>
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

    <!-- Offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="{{asset('frontend/images/exclusive.png')}}" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on RedStore</p>
                    <h1>Smart Band 4</h1>
                    <small>The Mi Smart Band 4 fearures a 39.9%larger (than Mi Band 3) AMOLED color full-touch display
                        with adjustable brightness, so everything is clear as can be.<br></small>
                    <a href="products.html" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        industry's standard dummy text.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="{{asset('frontend/images/user-1.png')}}">
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        industry's standard dummy text.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="{{asset('frontend/images/user-2.png')}}">
                    <h3>Mike Smith</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        industry's standard dummy text.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="{{asset('frontend/images/user-3.png')}}">
                    <h3>Mabel Joe</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="{{asset('frontend/images/logo-godrej.png')}}">
                </div>
                <div class="col-5">
                    <img src="{{asset('frontend/images/logo-oppo.png')}}">
                </div>
                <div class="col-5">
                    <img src="{{asset('frontend/images/logo-coca-cola.png')}}">
                </div>
                <div class="col-5">
                    <img src="{{asset('frontend/images/logo-paypal.png')}}">
                </div>
                <div class="col-5">
                    <img src="{{asset('frontend/images/logo-philips.png')}}">
                </div>
            </div>
        </div>
    </div>

@endsection





@push('scripts')

@endpush
