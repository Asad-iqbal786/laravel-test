@extends('layouts.admin_app')

@section('main-content')


<div class="container-xxl flex-grow-1 container-p-y">
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header">Users</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>img</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>email</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($getUsers as $index => $user)
                <tr>
                    <td>{{$index + 1 }}</td>
                    <td>
                      <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                        
                        <li
                          data-bs-toggle="tooltip"
                          data-popup="tooltip-custom"
                          data-bs-placement="top"
                          class="avatar avatar-xs pull-up"
                          title="Christina Parker">
                          <img src="{{asset('admin/assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle" />
                        </li>
                      </ul>
                    </td>
                    <td> {{ $user['name']}} </td>
                    <td>
                        @if ($user['role'] == 'admin')
                        <span class="badge bg-label-info me-1">{{ $user['role']}}</span>

                        @elseif($user['role'] == 'seller')
                        <span class="badge bg-label-success me-1">{{ $user['role']}}</span>
                        @else
                        <span class="badge bg-label-primary me-1">{{ $user['role']}}</span>

                        @endif

                        
                    </td>
                    <td>
                        {{ $user['email']}}
                    </td>
                  </tr>
                @empty
                    <p>User not found</p>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header">Products</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Product name</th>
                  <th>slug</th>
                  <th>Seller</th>
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
                  <td>{{$product['slug']}}</td>
                  <td>{{$product['users']['name']}}</td>
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
                        <a class="dropdown-item" href="{{ url('/add-edit-product', $product['id']) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item"  onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('productDestroy', $product['id']) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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
