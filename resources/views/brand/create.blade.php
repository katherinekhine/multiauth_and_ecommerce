<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1 mb-3">{{ $brand->exists ? 'Edit Brand' : 'Create New Brand' }}</h1>
        <form action="{{ $brand->exists ? route('brands.update', $brand) : route('brands.store') }}" method="post">
            @csrf
            @if($brand->exists)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="name" class="font-medium block">Name:</label>
                <input type="text" id="name" name="name" class="border w-full mt-1" placeholder="Enter Name..." value="{{ old('name', $brand->name) }}">
            </div>
            <div class="mb-3">
                <a href="{{ route('brands.index') }}" type="button" class="btn-back">Back</a>
                <input type="submit" value="{{ $brand->exists ? 'Edit' : 'Create' }}" class="{{ $brand->exists ? 'btn-edit' : 'btn-create' }}">
            </div>
        </form>
    </div>
</x-app-layout>