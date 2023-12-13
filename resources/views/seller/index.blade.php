@extends('layouts.admin_app')

@section('main-content')


<div class="container-xxl flex-grow-1 container-p-y">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="demo-inline-spacing mb-4">
        <a href="{{url('seller-add-edit-product')}}" target="_blank" class="btn btn-primary">Upload Product</a>
    </div>
    <div class="card">
      <h5 class="card-header">Products</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Product name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @forelse ($getProducts as $index => $product)
          <tr>
            <td>{{ $index + 1}}</td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  class="avatar avatar-xs pull-up">
                  <img src="{{ asset('storage/admin/images/admin_photos/products/' . $product['image']) }}" alt="Avatar" class="rounded-circle" />
                </li>
              </ul>
            </td>
            <td>{{$product['name']}}</td>
            <td>
              {{$product['price']}}
            </td>
            <td>{{$product['quantity']}}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="{{ url('/seller-add-edit-product', $product['id']) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item"  onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('productSellerDestroy', $product['id']) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @empty
              <p class="text-center">No product found</p>
          @endforelse
          
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
   
</div>
@endsection





@push('scripts')

@endpush
