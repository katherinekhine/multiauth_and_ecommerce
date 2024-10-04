<x-app-layout>
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('storage/shoe_imags/shoes_banner_1.jpg') }}" alt="Product Image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/shoe_imags/shoes_banner_2.jpg') }}" alt="Product Image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/shoe_imags/shoes_banner_3.png') }}" alt="Product Image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/shoe_imags/Puma_Men_shoe.jpg') }}" alt="Product Image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/shoe_imags/running_shoes_images.jpg') }}" alt="Product Image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/shoe_imags/shoe_1.jpg') }}" alt="Product Image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/shoe_imags/shoe_2.jpg') }}" alt="Product Image">
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>

    </div>

    <div class="container mx-auto pt-3 lg:px-40 md:px-6 px-5">
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
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
                            {{-- <p class="text-sm mb-1">Quantity: {{ $product->availables->count() }}</p> --}}
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
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <p class="text-gray-400 text-sm">We are passionate about delivering high-quality products and
                        exceptional customer service. Our mission is to make your shopping experience enjoyable and
                        satisfying.</p>
                </div>
                <div class="mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="text-gray-400 text-sm">
                        <li class="mb-2"><a href="#" class="hover:text-white transition duration-300">Home</a>
                        </li>
                        <li class="mb-2"><a href="#"
                                class="hover:text-white transition duration-300">Products</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-white transition duration-300">About</a>
                        </li>
                        <li class="mb-2"><a href="#"
                                class="hover:text-white transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div class="mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="text-gray-400 text-sm">
                        <li class="mb-2">123 Main Street, City, Country</li>
                        <li class="mb-2">Phone: +1 234 567 890</li>
                        <li class="mb-2">Email: info@example.com</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 text-sm mb-4">Stay updated with our latest offers and products.</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email"
                            class="bg-gray-700 text-white px-4 py-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-r-md transition duration-300">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} ShoeShack </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.swiper', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,
                autoplay: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            });

        });
    </script>

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
