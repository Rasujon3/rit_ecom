<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function userRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_password' => 'required|min:7',
            're_password' => 'required|same:first_password',
            'name' => 'required',
            'mobile' => 'required',
        ]);

        $response = Http::asForm()->post(config('api.url') . 'api/join.php', [
            'user_name' => $request->mobile,
            'password' => '0',
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'gender' => $request->gender ?? '',
            'agent' => '0',
            'nid' => $request->nid ?? '',
            'referral_id' => $request->referral_id ?? '0',
            'first_password' => $request->first_password,
            're_password' => $request->re_password,
            'country' => 'BD',
            'type' => '0',
            'category' => '0',
            'division' => '0',
            'distict' => '0',
            'thana' => '0',
            'user' => $request->mobile,
            'product' => '0',
            'placement_id' => '0',
            'placement_hand' => '0',
            'euser' => '0'
        ]);

        $data = $response->json();

        if ($data['error'] == 0) {
            // Save session
//            Session::put('user_id', $data['user_id']);
//            Session::put('voucher', $data['voucher']);
//            Session::put('name', $request->name);
//            Session::put('mobile', $request->mobile);

            return redirect()->route('login')->with('success', 'Registration successful!');
        }

        return redirect()->back()->with('error', $data['error_report'] ?? 'Something went wrong.');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => config('api.url') . 'api/login.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'user_name' => $request->user_name,
                'password' => $request->password,
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $decode = json_decode($response, true);

        if (!isset($decode['error'])) {
            return redirect()->back()->with('error', 'Unexpected response from login server.');
        }

        if ($decode['error'] == 1) {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }

        // Login success, store session
        Session::put('user_id', $decode['id']);
        Session::put('user_name', $decode['user_name']);
        Session::put('mobile', $decode['mobile']);
        Session::put('name', $decode['name']);
        Session::put('image_url', $decode['image_url'] ?? '');
        Session::put('catagory_type', $decode['catagory_type'] ?? '0');

        return redirect()->route('home')->with('success', 'Successfully logged in.');
    }
    public function logout()
    {
        session()->forget(['user_id', 'user_name', 'mobile', 'name', 'image_url', 'catagory_type']);
        return redirect('/')->with('success', 'Logged out successfully');
    }
}
