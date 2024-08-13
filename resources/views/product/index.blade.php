<x-app-layout>
    <div class="container py-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1">Product</h1>
        <a href="{{route('products.create')}}">+ Create New Product</a>
        <div class="mt-5">
            <table class="w-full">
                <thead class=" bg-slate-500 border border-gray-500">
                    <tr>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">ID</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Image</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Name</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Description</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Price</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="border border-gray-500">
                   @foreach ($products as $product)
                       <tr>
                        <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{$product->id}}</td>
                        <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500 w-24">
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Image" height="20px">
                        </td>
                        <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{$product->name}}</td>
                        <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{$product->description}}</td>
                        <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{$product->price}}</td>
                        <td class="p-3 text-sm font-semibold tracking-wide flex items-center justify-center gap-2 border-t border-gray-500">
                            <a href="{{ route('products.show', ['product'=> $product])}}" class=" text-green-600">Show</a> |
                            <a href="{{ route('products.edit', ['product' => $product]) }}" class=" text-blue-600">Edit</a> |
                            <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Product?')" class=" text-red-600">
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