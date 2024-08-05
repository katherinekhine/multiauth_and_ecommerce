<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1 mb-3">{{ $category->exists ? 'Edit Category' : 'Create New Category' }}</h1>
        <form action="{{ $category->exists ? route('categories.update', $category) : route('categories.store') }}" method="post">
            @csrf
            @if($category->exists)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="name" class="font-medium block">Name:</label>
                <input type="text" id="name" name="name" class="border w-full mt-1" placeholder="Enter Name..." value="{{ old('name', $category->name) }}">
            </div>
            <div class="mb-3">
                <label for="brand_id" class="font-medium block">Brand:</label>
                <select name="brand_id" id="brand_id" class="mt-1 w-full">
                    <option value="">-- Choose Brand --</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(($category->exists && old ('brand_id', $category->brand->id) == $brand->id) || old('brand_id') == $brand->id)>
                            {{ $brand->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <a href="{{ route('categories.index') }}" type="button" class="btn-back">Back</a>
                <input type="submit" value="{{ $category->exists ? 'Edit' : 'Create' }}" class="{{ $category->exists ? 'btn-edit' : 'btn-create' }}">
            </div>
        </form>
    </div>
</x-app-layout>