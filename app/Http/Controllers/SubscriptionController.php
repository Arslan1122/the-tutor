<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription.create');
    }

    public function orderPost(Request $request)
    {
        $plan = $request->plane;
        $getPlan = "price_1KbOPWDdqAabSxrcGAJ3HDtz";
        if($plan == "30") {
            $getPlan = "price_1KbOPWDdqAabSxrcGAJ3HDtz";
        } else if($plan == "70" ) {
            $getPlan = "price_1KbOPWDdqAabSxrcCyXWwebZ";
        } else {
            $getPlan = "price_1KbOPWDdqAabSxrcNPOz6SJo";
        }
        $user = auth()->user();
        $input = $request->all();
        $token =  $request->stripeToken;
        $paymentMethod = $request->paymentMethod;
        try {

            Stripe::setApiKey(env('STRIPE_SECRET'));

            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            }

            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            $user->newSubscription('test',$getPlan)
                ->create($paymentMethod, [
                    'email' => $user->email,
                ]);

            $user->update(['is_subscribed' => 1, 'no_of_bids' => $request->plane]);

            return back()->with('success','Subscription is completed.');
        } catch (Exception $e) {
            return back()->with('success',$e->getMessage());
        }

    }

}
