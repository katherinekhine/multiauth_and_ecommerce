<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1 mb-3">{{ $purchase->exists ? 'Edit Purchase' : 'Create New Purchase' }}</h1>
        <form action="{{ $purchase->exists ? route('purchases.update', $purchase) : route('purchases.store') }}"
            method="post">
            @csrf
            @if ($purchase->exists)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="supplier_name" class="font-medium block">Supplier Name:</label>
                <input type="text" id="supplier_name" name="supplier_name" class="border w-full mt-1"
                    placeholder="Enter supplier name..." value="{{ old('supplier_name', $purchase->supplier_name) }}">
            </div>
            <div class="mb-3" id="product_input">
                <label for="product_id" class="font-medium block">Product Id:</label>
                <select name="product_id" id="product_id" class="border w-full mt-1">
                    <option value="">-- Choose Product --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3" id="button_container">
                <a href="{{ route('purchases.index') }}" type="button" class="btn-back">Back</a>
                <input type="submit" value="{{ $purchase->exists ? 'Edit' : 'Create' }}"
                    class="{{ $purchase->exists ? 'btn-edit' : 'btn-create' }}">
            </div>
        </form>
        <!-- Hidden New Product Form -->
        <div id="new_product_form" class="mb-3 hidden">
            <form action="{{ route('storeFromPurchase') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="font-medium block">Name:</label>
                    <input type="text" id="name" name="name" required class="border w-full mt-1"
                        placeholder="Enter Name...">
                </div>
                <div class="mb-3">
                    <label for="photo" class="font-medium block">Photo:</label>
                    <input type="file" name="photo" id="photo" class="border w-full mt-1">

                </div>
                <div class="mb-3">
                    <label for="description" class="font-medium block">Description:</label>
                    <textarea name="description" id="description" required placeholder="Enter Description..." class="w-full"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="font-medium block">Price:</label>
                    <input type="text" id="price" name="price" required class="border w-full mt-1"
                        placeholder="Enter Price...">
                </div>
                <div class="mb-3">
                    <label for="brand_id" class="font-medium block">Brand:</label>
                    <select name="brand_id" id="brand_id" required class="mt-1 w-full">
                        <option value="">-- Choose Brand --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">
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
                            <option value="{{ $cat->id }}">
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn-create">
                </div>
            </form>
        </div>

        <!-- Checkbox to Show/Hide the New Product Form -->
        <div class="mb-3">
            <label class="flex items-center">
                <input type="checkbox" id="new_product_checkbox" class="mr-2">
                <span>Create New Product</span>
            </label>
        </div>
    </div>

    <!-- JavaScript to Toggle the Hidden Form -->
    <script>
        document.getElementById('new_product_checkbox').addEventListener('change', function() {
            const newProductForm = document.getElementById('new_product_form');
            const product_input = document.getElementById('product_input');
            const button_container = document.getElementById('button_container');
            const supplier_name = document.getElementById('supplier_name');
            if (this.checked) {
                product_input.classList.add('hidden');
                supplier_name.disabled = true;
                button_container.classList.add('hidden');
                newProductForm.classList.remove('hidden');
            } else {
                supplier_name.disabled = false;
                product_input.classList.remove('hidden');
                button_container.classList.remove('hidden');
                newProductForm.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
