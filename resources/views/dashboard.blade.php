<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
    
            <!-- Bootstrap Product Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900">
                    <h2>All Order</h2>
                    <!-- Include your Bootstrap product table here -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice number</th>
                                <th scope="col">Grand Total</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($getOrder as $index => $order)
                            <tr>
                                <td>{{$index  + 1}}</td>
                                <td>{{$order['invoice_number']}}</td>
                                <td>{{$order['grand_total']}}</td>
                                <td>{{$order['grand_total']}}</td>
                                <td>
                                    <a href="{{route('orderDetails',$order['id'])}}" target="_blank">View Details</a>
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>
