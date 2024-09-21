<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Order History</h2>

        @if ($orders->isEmpty())
            <p class="text-lg text-gray-600">You have no order history.</p>
        @else
            <div class="space-y-8">
                @foreach ($orders as $order)
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Order #{{ $order->id }}
                                </h3>
                                <h3>
                                    Order by {{ $order->user->name }}
                                </h3>
                            </div>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Placed on: {{ $order->created_at->format('F j, Y') }}
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Product
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Quantity
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($order->orderDetails as $detail)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $detail->product->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $detail->quantity }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                ${{ number_format($detail->price, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="px-4 py-4 sm:px-6 bg-gray-50">
                            <p class="text-sm font-medium text-gray-900">
                                Total: <span class="font-bold">${{ number_format($order->total_amount, 2) }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
