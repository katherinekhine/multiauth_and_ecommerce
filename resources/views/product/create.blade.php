<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1 mb-3">{{ $product->exists ? 'Edit Product' : 'Create New Product' }}</h1>
        <form action="{{ $product->exists ? route('products.update', $product) : route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($product->exists)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="name" class="font-medium block">Name:</label>
                <input type="text" id="name" name="name" required class="border w-full mt-1" placeholder="Enter Name..." value="{{ old('name', $product->name) }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="font-medium block">Photo:</label>
                <input type="file" name="photo" id="photo" class="border w-full mt-1" {{ $product->exists ? '' : 'required' }}>
                @if($product->exists && $product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="" height="100px">
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="font-medium block">Description:</label>
                <textarea name="description" id="description" required placeholder="Enter Description..." class="w-full">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="font-medium block">Price:</label>
                <input type="text" id="price" name="price" required class="border w-full mt-1" placeholder="Enter Price..." value="{{ old('price', $product->price) }}">
            </div>
            <div class="mb-3">
                <label for="brand_id" class="font-medium block">Brand:</label>
                <select name="brand_id" id="brand_id" required class="mt-1 w-full">
                    <option value="">-- Choose Brand --</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(($product->exists && old('brand_id', $product->brand->id) == $brand->id) || old('brand_id') == $brand->id)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="font-medium block">Category:</label>
                <select name="category_id" id="category_id" required class="mt-1 w-full">
                    <option value="">-- Choose Category --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(($product->exists && old('category_id', $product->category->id) == $cat->id) || old('category_id') == $cat->id)>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <a href="{{ route('products.index') }}" type="button" class="btn-back">Back</a>
                <input type="submit" value="{{ $product->exists ? 'Edit' : 'Create' }}" class="{{ $product->exists ? 'btn-edit' : 'btn-create' }}">
            </div>
        </form>
    </div>
</x-app-layout>
