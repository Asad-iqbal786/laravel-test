@extends('layouts.admin_app')

@section('main-content')


<div class="container-xxl flex-grow-1 container-p-y">
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header">All orders</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice number</th>
                    <th scope="col">Grand Total</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($getOrders as $index => $order)
                <tr>
                    <td>{{$index  + 1}}</td>
                    <td>{{$order['invoice_number']}}</td>
                    <td>{{$order['grand_total']}}</td>
                    <td>{{$order['grand_total']}}</td>
                    <td>
                        <a href="{{route('sellerOrderDetails',$order['id'])}}" target="_blank">View Details</a>
                    </td>
                </tr>
                @empty
                    
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
