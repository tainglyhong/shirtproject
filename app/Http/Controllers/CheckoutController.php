<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function success()
    {
        // Clear the cart session
        Session::forget('cart');

        return view('checkout-success');
    }
}
