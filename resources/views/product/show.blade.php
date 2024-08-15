<x-app-layout>
    <div class="container py-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1">Detail of Product</h1>
        <div class="mt-3">
            <div class="mb-3 font-bold">
                <h2 class="text-xl"> <span>Name:</span>  {{ $product->name }}</h2>
                <p class="text-sm mt-3"> <span>Description:</span> {{ $product->description }}</p>
                <p class="text-sm mt-3">Price: ${{ $product->price }}</p>
                <p class="text-sm mt-3">Category: {{ $product->category->name }}</p>
                <p class="text-sm mt-3">Brand: {{ $product->brand->name}} </p>
            </div>
            <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Image" class="w-48 h-48 object-cover rounded-lg">
        </div>
    </div>
</x-app-layout>
