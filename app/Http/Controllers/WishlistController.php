<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $productData = $request->only(['product_id', 'title', 'image', 'price', 'point']);

        if (!$productId) {
            return response()->json(['status' => false, 'message' => 'Product ID is required.'], 400);
        }

        $wishlist = Session::get('wishlist', []);

        // Check if product already in wishlist
        if (array_key_exists($productId, $wishlist)) {
            return response()->json(['status' => false, 'message' => 'Already in wishlist.'], 409);
        }

        // Add to wishlist
        $wishlist[$productId] = [
            'id' => $productId,
            'title' => $productData['title'],
            'image' => $productData['image'],
            'price' => $productData['price'],
            'point' => $productData['point'] ?? 0,
        ];

        Session::put('wishlist', $wishlist);

        return response()->json(['status' => true, 'message' => 'Added to wishlist']);
    }

    public function remove($id, Request $request)
    {
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Item removed from wishlist.'
                ]);
            }

            return back()->with('success', 'Item removed from wishlist.');
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found in wishlist.'
            ]);
        }

        return back()->with('error', 'Item not found in wishlist.');
    }
}
