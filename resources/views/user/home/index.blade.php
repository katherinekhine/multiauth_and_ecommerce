<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        {{-- Brand --}}
        <section class="mb-10">
            <h2 class="mb-4 text-2xl">Brand</h2>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($brands as $brand)
                    <div class="py-4 px-8 bg-gray-400">
                        <h3 class="text-center">{{ $brand->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Category --}}
        <section class="mb-10">
            <h2 class="mb-4 text-2xl">Category</h2>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($categories as $category)
                    <div class="py-4 px-8 bg-gray-400">
                        <h3 class="text-center">{{ $category->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Product --}}
        <section class="mb-10">
            <h2 class="mb-4 text-2xl">Products</h2>
            <div class="grid grid-cols-3 gap-10">
                @foreach ($products as $product)
                    <div class="border">
                        <div>
                            <img src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('storage/product_img.png') }}"
                                alt="Product Image" class="w-full h-[300px] mb-2">
                        </div>
                        <div class="px-4 py-3 border-t border-gray-300">
                            <h1 class="h1 mb-3">{{ $product->name }}</h1>
                            <p class="text-sm mb-1">{{ $product->description }}</p>
                            <p class="text-sm mb-1">Price: ${{ $product->price }}</p>
                            <p class="text-sm mb-1">Quantity: {{ $product->availables->count() }}</p>
                            <p class="text-sm mb-1">Category: {{ $product->category->name }}</p>
                            <p class="text-sm mb-1">Brand: {{ $product->brand->name }}</p>
                            <p class="text-sm mb-1">Color: {{ $product->color }}</p>
                            <p class="text-sm mb-1">Size: {{ $product->size }}</p>
                            <p class="text-sm mb-1">Available: {{ $product->quantity }}</p>

                            @auth
                                <button {{ $product->quantity > 0 ? '' : 'disabled' }}
                                    class="mt-3 add-to-cart-button bg-neutral-700 text-white p-2 rounded-lg disabled:bg-neutral-500 disabled:text-gray-100"
                                    data-id="{{ $product->id }}" data-quantity="{{ $product->quantity }}"
                                    data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                    data-photo="{{ $product->photo }}" data-category="{{ $product->category->name }}"
                                    data-brand="{{ $product->brand->name }}" data-size="{{ $product->size }}"
                                    data-color="{{ $product->color }}">
                                    Add To Cart
                                </button>
                            @endauth

                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".add-to-cart-button");

            // Retrieve the cart from localStorage or initialize an empty array
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Disable buttons for products already in the cart
            cart.forEach(item => {
                const button = document.querySelector(`.add-to-cart-button[data-id='${item.id}']`);
                if (button) {
                    button.disabled = true;
                }
            });

            // Add event listeners to all add-to-cart buttons
            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    if (button.getAttribute('data-quantity') <= 0) {
                        return;
                    }
                    const productData = {
                        id: button.getAttribute('data-id'),
                        name: button.getAttribute('data-name'),
                        price: parseFloat(button.getAttribute('data-price')),
                        photo: button.getAttribute('data-photo'),
                        category: button.getAttribute('data-category'),
                        brand: button.getAttribute('data-brand'),
                        color: button.getAttribute('data-color'),
                        size: button.getAttribute('data-size'),
                        quantity: 1 // Start with quantity of 1
                    };

                    // Check if the product is already in the cart
                    const existingProductIndex = cart.findIndex(item => item.id === productData.id);
                    if (existingProductIndex > -1) {
                        // If it exists, increment the quantity
                        cart[existingProductIndex].quantity++;
                    } else {
                        // If it doesn't exist, add to cart
                        cart.push(productData);
                    }

                    // Store the updated cart in localStorage
                    localStorage.setItem('cart', JSON.stringify(cart));

                    // Disable the button after adding to cart
                    button.disabled = true;
                });
            });
        });
    </script>
</x-app-layout>
