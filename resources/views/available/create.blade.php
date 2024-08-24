<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1 mb-3">{{ $available->exists ? 'Edit Available' : 'Create New Available' }}</h1>
        <form action="{{ $available->exists ? route('availables.update', $available) : route('availables.store') }}"
            method="post">
            @csrf
            @if ($available->exists)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="size" class="font-medium block">Size:</label>
                <input type="text" id="size" name="size" class="border w-full mt-1" placeholder="Enter Size..."
                    value="{{ old('size', $available->size) }}">
            </div>
            <div class="mb-3">
                <label for="color" class="font-medium block">Color:</label>
                <input type="text" id="color" name="color" class="border w-full mt-1"
                    placeholder="Enter Color..." value="{{ old('color', $available->color) }}">
            </div>
            <div class="mb-3">
                <label for="quantity" class="font-medium block">Quantity:</label>
                <input type="text" id="quantity" name="quantity" class="border w-full mt-1"
                    placeholder="Enter Quantity..." value="{{ old('quantity', $available->quantity) }}">
            </div>
            <div class="mb-3">
                <label for="product_id" class="font-medium block">Product Id:</label>
                <select name="product_id" id="product_id" class="border w-full mt-1">
                    <option value="">-- Choose Product --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>

                {{-- <input type="text" id="product_id" name="product_id" class="border w-full mt-1"
                    placeholder="Enter product_id..." value="{{ old('quantity', $available->quantity) }}"> --}}
            </div>
            <div class="mb-3">
                <a href="{{ route('availables.index') }}" type="button" class="btn-back">Back</a>
                <input type="submit" value="{{ $available->exists ? 'Edit' : 'Create' }}"
                    class="{{ $available->exists ? 'btn-edit' : 'btn-create' }}">
            </div>
        </form>
    </div>
</x-app-layout>
