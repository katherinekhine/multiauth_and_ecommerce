<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Get cart data from localStorage
        $cart = $request->cart;

        $totalAmount = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Format totalAmount properly
        $totalAmount = round($totalAmount, 2);

        // Create a new order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $totalAmount,
        ]);

        // Process each cart item and create order details
        foreach ($cart as $item) {
            // Find the product in the products table
            $product = Product::find($item['id']);

            // Check if enough quantity is available
            if ($product && $product->quantity >= $item['quantity']) {
                // Reduce product quantity
                $product->quantity -= $item['quantity'];
                $product->save();

                // Create order details
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            } else {
                // Return an error if there's not enough stock
                return response()->json(['message' => 'Not enough stock available for ' . $item['name']], 400);
            }
        }

        // Return success response
        return response()->json(['message' => 'Order placed successfully!']);
    }
}
