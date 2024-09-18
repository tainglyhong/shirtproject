<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Stripe\WebhookSignature;

class StripeController extends Controller
{
    public function checkout()
    {
        // Return the checkout view
        return view('checkout');
    }

    public function charge(Request $request)
    {
        // Validate request
        $request->validate([
            'stripeToken' => 'required',
            'amount' => 'required|numeric',
        ]);

        // Set Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Create a charge
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount * 100, // Amount in cents
                'currency' => 'usd',
                'description' => 'E-commerce Charge',
                'source' => $request->stripeToken,
            ]);

            // Handle successful charge
            return redirect()->route('checkout')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            // Handle error
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
    }

    public function handleWebhook(Request $request)
    {
        $endpoint_secret = config('services.stripe.webhook_secret');

        // Retrieve the event from Stripe
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['status' => 'invalid payload'], 400);
        } catch (WebhookSignature $e) {
            // Invalid signature
            return response()->json(['status' => 'invalid signature'], 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                // Handle checkout session completion
                break;
            // Add more cases for other event types if needed
        }

        return response()->json(['status' => 'success']);
    }
}
