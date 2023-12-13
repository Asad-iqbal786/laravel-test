<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Bootstrap Product Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900">
                    <h2>All Order Invoice number: {{ $order['invoice_number'] }}</h2>
                    <!-- Include your Bootstrap product table here -->
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
                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Total:</td>
                                <td>${{ $order['grand_total'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>
