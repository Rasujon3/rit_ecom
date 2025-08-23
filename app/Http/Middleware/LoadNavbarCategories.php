<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoadNavbarCategories
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('home_categories')) {
            $response = Http::asForm()->post(config('api.url') . 'api/home_page_category.php');

            if ($response->successful() && isset($response['error']) && $response['error'] == 0) {
                Session::put('home_categories', $response['report']);
            } else {
                Session::put('home_categories', []); // fallback empty
            }
        }

        if (!Session::has('about_us')) {
            $response = Http::asForm()->post(config('api.url') . 'api/institute.php');

            if ($response->successful()) {
                Session::put('about_us', $response->json());
            } else {
                Session::put('about_us', []); // fallback empty
            }
        }

        return $next($request);
    }
}
