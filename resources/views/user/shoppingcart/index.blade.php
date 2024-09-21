<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h1 class="text-3xl font-semibold mb-8">Your Shopping Cart</h1>
        <div id="shopping-cart-parent-container" class="space-y-6 mb-8">
            <!-- Products will be dynamically inserted here -->
        </div>
        <div id="cart-summary" class="bg-gray-100 p-6 rounded-lg mb-6">
            <p class="text-lg mb-2">Total Quantity: <span id="total-quantity" class="font-semibold">0</span></p>
            <p class="text-lg mb-2">Total Price: $<span id="total-price" class="font-semibold">0.00</span></p>
        </div>
        <button id="order-btn" disabled
            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300">Place
            Order</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const shoppingCartParentContainer = document.getElementById("shopping-cart-parent-container");
            const orderBtn = document.getElementById('order-btn');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            function updateCartUI() {
                shoppingCartParentContainer.innerHTML = '';
                let totalQuantity = 0;
                let totalPrice = 0;

                if (cart.length === 0) {
                    shoppingCartParentContainer.innerHTML =
                        '<p class="text-gray-500 text-center">Your cart is empty.</p>';
                    document.getElementById("total-quantity").innerText = 0;
                    document.getElementById("total-price").innerText = (0).toFixed(2);
                    orderBtn.disabled = true; // Disable order button if cart is empty
                    return;
                }

                cart.forEach((item, index) => {
                    totalQuantity += item.quantity;
                    totalPrice += item.price * item.quantity;

                    const shoppingCart = document.createElement("div");
                    const imageUrl = `{{ asset('storage/') }}/${item.photo}`;

                    shoppingCart.innerHTML = `
                        <div class="flex items-center border-b border-gray-200 pb-4">
                            <div class="w-24 h-24 flex-shrink-0">
                                <img src="${imageUrl}" alt="Product Image" class="w-full h-full object-cover rounded">
                            </div>
                            <div class="ml-6 flex-grow">
                                <h2 class="text-lg font-semibold mb-2">${item.name}</h2>
                                <p class="text-gray-600 mb-2">Price: $${item.price.toFixed(2)}</p>
                                <div class="flex items-center">
                                    <button class="decrement-btn bg-gray-200 px-3 py-1 rounded-l" data-index="${index}">-</button>
                                    <span class="quantity bg-gray-100 px-4 py-1">${item.quantity}</span>
                                    <button class="increment-btn bg-gray-200 px-3 py-1 rounded-r" data-index="${index}">+</button>
                                </div>
                            </div>
                            <button class="remove-btn text-red-600 hover:text-red-800 ml-4" data-index="${index}">Remove</button>
                        </div>
                    `;

                    shoppingCartParentContainer.appendChild(shoppingCart);
                });

                document.getElementById("total-quantity").innerText = totalQuantity;
                document.getElementById("total-price").innerText = totalPrice.toFixed(2);

                // Enable the order button if there are items in the cart
                orderBtn.disabled = cart.length === 0;
            }

            updateCartUI();

            shoppingCartParentContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains("increment-btn")) {
                    const index = event.target.getAttribute("data-index");
                    cart[index].quantity++;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartUI();
                }
                if (event.target.classList.contains("decrement-btn")) {
                    const index = event.target.getAttribute("data-index");
                    if (cart[index].quantity > 1) {
                        cart[index].quantity--;
                    }
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartUI();
                }
                if (event.target.classList.contains("remove-btn")) {
                    const index = event.target.getAttribute("data-index");
                    cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartUI();
                }
            });

            document.getElementById('order-btn').addEventListener('click', function() {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];

                fetch('/order', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            cart
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        localStorage.removeItem('cart');
                        cart = [];
                        updateCartUI();
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</x-app-layout>
