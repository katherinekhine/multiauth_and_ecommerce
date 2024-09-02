<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        {{-- Brand --}}
        <section>
            <h2>Brand</h2>
            <div>
                @foreach ($brands as $brand)
                    <div>
                        <h3>{{ $brand->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Category --}}
        <section>
            <h2>Category</h2>
            <div>
                @foreach ($categories as $category)
                    <div>
                        <h3>{{ $category->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Product --}}
        <div>
            @foreach ($products as $product)
                <div>
                    <div>
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Image" height="20px">
                    </div>
                    <div>
                        <h1 class="h1 mb-3">{{ $product->name }}</h1>
                        <p class="text-sm">{{ $product->description }}</p>
                        <p class="text-sm">Price: ${{ $product->price }}</p>
                        <p class="text-sm">Quantity: {{ $product->availables->count() }}</p>
                        <p class="text-sm">Category: {{ $product->category->name }}</p>
                        <p class="text-sm">Brand: {{ $product->brand->name }}</p>
                    </div>
                    <button {{ $product->availables->count() > 0 ? '' : 'disabled' }}
                        class="add-to-cart-button bg-neutral-700 text-white p-2 rounded-lg disabled:bg-neutral-500 disabled:text-gray-100"
                        data-id="{{ $product->id }}" data-quantity="{{ $product->availables->count() }}"
                        data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                        data-photo="{{ $product->photo }}" data-category="{{ $product->category->name }}"
                        data-brand="{{ $product->brand->name }}">
                        Add To Cart
                    </button>
                </div>
            @endforeach
        </div>
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
                        price: button.getAttribute('data-price'),
                        photo: button.getAttribute('data-photo'),
                        category: button.getAttribute('data-category'),
                        brand: button.getAttribute('data-brand'),
                        quantity: button.getAttribute('data-quantity')
                    };

                    // Add the product to the cart array
                    cart.push(productData);

                    // Store the updated cart in localStorage
                    localStorage.setItem('cart', JSON.stringify(cart));

                    // Disable the button after adding to cart
                    button.disabled = true;
                });
            });
        });
    </script>
</x-app-layout>
