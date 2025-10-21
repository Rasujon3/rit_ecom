<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $productData = $request->only(['product_id', 'title', 'image', 'price', 'point']);

        if (!$productId) {
            return response()->json(['status' => false, 'message' => 'Product ID is required.'], 400);
        }

        // 🔄 Get existing cart
        $cart = Session::get('cart', []);

        // 🔁 Check if product already in cart
        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['quantity'] = ($cart[$productId]['quantity'] ?? 1) + 1;

            // price update → total price হিসাব করে রাখবে
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];

            Session::put('cart', $cart);

            return response()->json([
                'status' => true,
                'message' => 'Quantity increased successfully',
                'cart' => $cart
            ]);
        }

        // ✅ Remove from wishlist if exists
        $wishlist = Session::get('wishlist', []);
        if (isset($wishlist[$productId])) {
            unset($wishlist[$productId]);
            Session::put('wishlist', $wishlist);
        }

        // 🛒 Add to cart
        $cart[$productId] = [
            'id' => $productId,
            'title' => $productData['title'],
            'image' => $productData['image'],
            'price' => $productData['price'],
            'point' => $productData['point'] ?? 0,
            'quantity' => 1,
            'total_price' => $productData['price'],
        ];

        Session::put('cart', $cart);

        return response()->json([
            'status' => true,
            'message' => 'Added to cart'
        ]);
    }

    public function remove($id, Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Item removed from cart.'
                ]);
            }

            return back()->with('success', 'Item removed from cart.');
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found in cart.'
            ]);
        }

        return back()->with('error', 'Item not found in cart.');
    }
    public function getCartHtml()
    {
        $cartItems = session('cart', []);
        $cartCount = count($cartItems);
        $cartSubtotal = array_sum(array_column($cartItems, 'price'));

        $view = view('partials.cart-dropdown', compact('cartItems', 'cartCount', 'cartSubtotal'))->render();

        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

}
