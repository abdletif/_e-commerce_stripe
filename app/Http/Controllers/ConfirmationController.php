<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('products.confirmation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount"      => 123,
                "currency"    => "usd",
                "source"      => $request->stripeToken,
                "description" => "Shop Store"
        ]);
        Cart::instance('default')->destroy();
        return redirect()->route('confirmation.thankYou')->with('success_message','Great Job! Your payement passed successfuly');
    }
    /**
     * Thank You Page
     */
    public function thankYou(){
        if(!session()->has("success_message")){
            return redirect()->route('shop.index');
        }
        return view('confirmation.thankYou');
    }
}
