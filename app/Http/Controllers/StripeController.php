<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function createSession(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $cart = $request->input('cart', []);

        $lineItems = [];

        foreach ($cart as $id => $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => $item['price'] * 100, // Amount in cents
                ],
                'quantity' => $item['quantity'],
            ];
        }

        try {
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success'),
                'cancel_url' => route('checkout.cancel'),
            ]);

            return response()->json($session->id);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
    