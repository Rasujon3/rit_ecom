<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index()
    {
        // Slider data
        $sliderResponse = Http::get(config('api.url') . 'api/slide.php');
        $slides = ($sliderResponse->successful() && $sliderResponse['error'] == 0) ? $sliderResponse['report'] : [];

        // Arrival Products data
        $arrivalProductResponse = Http::asForm()->post(config('api.url') . 'api/home_page.php');
        $arrivalProducts = ($arrivalProductResponse->successful() && $arrivalProductResponse['error'] == 0) ? $arrivalProductResponse['report'] : [];

        // Featured Products data
        $featuredProductResponse = Http::asForm()->post(config('api.url') . 'api/home_page_special.php');
        $featuredProducts = ($featuredProductResponse->successful() && $featuredProductResponse['error'] == 0) ? $featuredProductResponse['report'] : [];

        return view('index', compact('slides', 'arrivalProducts', 'featuredProducts'));
    }

    public function wishlist()
    {
        $wishlist = session()->get('wishlist', []);
        return view('wishlist', compact('wishlist'));
    }
    public function shopFullwidthBanner(Request $request)
    {
        $category = $request->query('category'); // get from URL

        $products = [];
        if ($category) {
            $response = Http::asForm()->post(config('api.url') . 'api/category_wise_prodict.php', [
                'category' => $category,
                'limit' => 100,
                'type' => 0,
            ]);

            if ($response->successful() && $response['error'] == 0) {
                $products = $response['report'];
            }
        }

        return view('shop-fullwidth-banner', compact('products', 'category'));
    }

    public function shopBannerSidebar(Request $request)
    {
        // Fetch category list from session (set earlier in middleware)
        $categories = Session::get('home_categories', []);
        $firstCat = count($categories) > 0 ? $categories[0]['Category'] : 'Mobile';
        $selectedCategory = $request->input('category', $firstCat); // default category

        // Fetch products from API
        $productResponse = Http::asForm()->post(config('api.url') . 'api/category_wise_prodict.php', [
            'category' => $selectedCategory,
            'limit' => 100,
            'type' => 0
        ]);

        $products = ($productResponse->successful() && $productResponse['error'] == 0)
            ? $productResponse['report']
            : [];

        return view('shop-banner-sidebar', compact('categories', 'products', 'selectedCategory'));
    }

    public function productDetails(Request $request)
    {
        $productId = $request->query('product_id');

        $product = null;
        if ($productId) {
            $response = Http::asForm()->post(config('api.url') . 'api/product_details.php', [
                'product_id' => $productId
            ]);

            if ($response->successful() && $response['error'] == 0) {
                $product = $response->json();
            }
        }

        return view('product-details', compact('product','productId'));
    }

    public function order()
    {
        return view('order');
    }

    public function myAccount()
    {
        return view('my-account');
    }

    public function login()
    {
        return view('login');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
        $cartSubtotal = array_sum(array_column($cart, 'price'));
        return view('checkout', compact('cart', 'cartCount', 'cartSubtotal'));
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
        $cartSubtotal = 0;

        if ($cartCount > 0) {
            $cartSubtotal = array_sum(array_column($cart, 'price'));
        }

        return view('cart', compact('cart', 'cartCount', 'cartSubtotal'));
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('search');

        if (!$searchTerm) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }

        $response = Http::asForm()->post(config('api.url') . 'api/product_search.php', [
            'search' => $searchTerm,
        ]);

        $searchResults = [];
        $totalFound = 0;
        if ($response->successful() && $response['error'] == 0) {
            $searchResults = $response['search_result'];
            $totalFound = $response['search_found'];
        }
        return view('search-product', compact('searchResults', 'searchTerm', 'totalFound'));
    }

    public function submit(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        foreach ($cart as $item) {
            $response = Http::asForm()->post(config('api.url') . 'api/cart_insert.php', [
                'unique_id' => $request->unique_id ?? '',
                'product_id' => $item['id'] ?? '',
                'quantity' => 1,
                'point' => $item['point'] ?? 0,
                'size' => '',
                'color' => '',
                'special_price' => 0,
                'money' => $item['price'] ?? '',
                'device_id' => $request->device_id ?? '',
                'user_id' => $request->user_id ?? '',
                'ship_cost' => $request->ship_cost ?? 0,
                'payment_method' => $request->payment_method ?? '',
                'trans_id' => $request->trans_id ?? '',
                'name' => $request->name ?? '',
                'mobile' => $request->mobile ?? '',
                'address' => $request->address ?? '',
                'type' => $request->type ?? '',
            ]);

            $res = $response->json();
            if (!$response->ok() || ($res['error'] ?? 1) != 0) {
                return redirect()->back()->with('error', 'Order failed for product ID: ' . $item['id']);
            }
        }

        // Order placed, clear cart
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully.');
    }
}
