<x-app-layout>
    <div class="container py-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1">Purchase</h1>
        <a href="{{ route('purchases.create') }}">+ Create New Purchase</a>
        <div class="mt-5">
            <table class="w-full">
                <thead class=" bg-slate-500 border border-gray-500">
                    <tr>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">ID</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Supplier Name</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Product Name</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Product Price</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Total Quantity</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Total Price</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="border border-gray-500">
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $purchase->id }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $purchase->supplier_name }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $purchase->product->name }}</td>

                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $purchase->product->price }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $purchase->product->availables->sum('quantity') }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $purchase->product->price * $purchase->product->availables->sum('quantity') }}</td>
                            <td
                                class="p-3 text-sm font-semibold tracking-wide flex items-center justify-center gap-2 border-t border-gray-500">
                                <a href="{{ route('purchases.show', ['purchase' => $purchase]) }}"
                                    class=" text-green-600">Show</a> |
                                <a href="{{ route('purchases.edit', ['purchase' => $purchase]) }}"
                                    class=" text-blue-600">Edit</a> |
                                <form action="{{ route('purchases.destroy', ['purchase' => $purchase]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this Purchase?')"
                                    class=" text-red-600">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
