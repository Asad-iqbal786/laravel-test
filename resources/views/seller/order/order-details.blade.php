@extends('layouts.admin_app')

@section('main-content')


<div class="container-xxl flex-grow-1 container-p-y">
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header">Invoice number: {{ $order['invoice_number'] }}</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Invoice number </th>
                        <th scope="col"> Seller name </th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($getOrderProduct as $index => $order)
                    {{-- @dd($order); --}}

                    <tr>
                        <td>{{$index  + 1}}</td>
                        <td>{{$order['invoice_number']}}</td>
                        <td>{{$order['products']['name']}}</td>
                        <td>{{$order['products']['price']}}</td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
          </div>
          <div class="total-price">
            <table>
                <tr>
                    <td>Total:</td>
                    <td>${{ $order['grand_total'] }}</td>
                </tr>
            </table>
        </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>

   
</div>
@endsection





@push('scripts')

@endpush
