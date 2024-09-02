<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        {{-- Product --}}
        <div id="shopping-cart-parent-container">
            <!-- Products will be dynamically inserted here -->
        </div>
        <button id="order-btn">Order</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const shoppingCartParentContainer = document.getElementById("shopping-cart-parent-container");
            // Retrieve the cart from localStorage or initialize an empty array
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Display products already in the cart
            cart.forEach(item => {
                const shoppingCart = document.createElement("div");

                // Assuming the photo attribute contains the relative path to the image
                const imageUrl = `{{ asset('storage/') }}/${item.photo}`;

                // Create the HTML structure for each product
                shoppingCart.innerHTML = `
                    <div>
                        <div>
                            <img src="${imageUrl}" alt="Product Image" height="100px">
                        </div>
                        <div>
                            <h1 class="h1 mb-3">${item.name}</h1>
                            <p class="text-sm">${item.description}</p>
                            <p class="text-sm">Price: $${item.price}</p>
                            <p class="text-sm">Category: ${item.category}</p>
                            <p class="text-sm">Brand: ${item.brand}</p>
                        </div>
                    </div>
                `;

                // Append the product to the shopping cart container
                shoppingCartParentContainer.appendChild(shoppingCart);
            });

            // Button
            document.getElementById('order-btn').addEventListener('click', function() {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];

                fetch('/order', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute(
                                    'content')
                        },
                        body: JSON.stringify({
                            cart
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        // Clear the cart
                        localStorage.removeItem('cart');
                    })
                    .catch(error => console.error('Error:', error));
            });

        });
    </script>
</x-app-layout>
