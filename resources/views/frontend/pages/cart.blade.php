@extends('layouts.frontend_app')

@section('main-content')
@php
    use Illuminate\Support\Facades\Auth;
    $auth = Auth::user();
@endphp

 <!-- Cart items details -->
 <div class="small-container cart-page">
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
    <table style="margin-top:14px;">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Seller</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php $total_pricess = 0;  ?>

        @forelse ($getCart as $index => $pro)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <div class="cart-info">
                        <img src="{{ asset('storage/admin/images/admin_photos/products/' . $pro['products']['image']) }}">
                        <div>
                            <p>{{ $pro['products']['name'] }}</p>
                            <small>Price: ${{ $pro['products']['price'] }}</small>
                            <br>
                            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('removeCartProduct', $pro['id']) }}">Remove</a>
                        </div>
                    </div>
                </td>
                <td>{{ $pro['users']['name'] }}</td>
                <td>{{ $pro['qty'] }}</td>
                <td>${{ $pro['products']['price'] * $pro['qty'] }}</td> <!-- Individual product total -->
            </tr>
            @php 
                $total_pricess = $total_pricess + $pro['products']['price'] * $pro['qty'];
            @endphp
        @empty
            <p class="text-center">No products found</p>
        @endforelse
        
     
    
       
      
    </table>
    <form action="{{route('createOrder')}}" method="post">@csrf
        <input type="hidden" name="user_id"  @if (Auth::check()) value="{{$auth->id}}" @else  value="0" @endif id="">
        <input type="hidden" name="grand_total" value="{{$total_pricess}}">
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>${{$total_pricess}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$35.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$230.00</td>
                </tr>
            </table>
        </div>
        <div class="checkout">
            <button  type="submit" class="btn"> Checkout</button>
        </div>
    </form>

</div>

@endsection

@push('styles')
    <style>
        .checkout {
            text-align: end;
        }
    </style>
@endpush



@push('scripts')

@endpush
