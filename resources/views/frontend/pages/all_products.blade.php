@extends('layouts.frontend_app')

@section('main-content')


<div class="small-container">
    <div class="row row-2">
        <h2>All Products</h2>
        <select>
            <option>Default Sort</option>
            <option>Sort By Price</option>
            <option>Sort By Popularity</option>
            <option>Sort By Rating</option>
            <option>Sort By Sale</option>
        </select>
    </div>
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
    <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
    </div>
</div>


@endsection





@push('scripts')

@endpush
