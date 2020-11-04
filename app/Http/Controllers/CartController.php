<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index',[
            'cart' => Cart::content()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=Cart::search(function ($cartItem, $rowId) use($request){
            return $cartItem->id === $request->id;
        });

        if ($item->isNotEmpty()) {
            return redirect()->route('cart.index')
                             ->with('success_message','item already added in your cart!');
        }
        Cart::add($request->id,$request->title,$request->qty,$request->price)
              ->associate('App\Models\Product');

        return redirect()->route('cart.index')
                         ->with('success_message','item was added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($item)
    {
        // dd($item);
        Cart::remove($item);
        return back()->with('success_message','Item was deleted ');
    }
    /**
     * Save Item For Later
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveForLater($item)
    {
        $cart=Cart::get($item);
        Cart::instance('default')->remove($item);


        $item=Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use($cart){
            return $cartItem->id === $cart->id;
        });


        if ($item->isNotEmpty()) {
            return redirect()->route('cart.index')
                             ->with('success_message','This item is already added in your cart!');
        }
        Cart::instance('saveForLater')->add($cart->id,$cart->name,$cart->qty,$cart->price)
                                      ->associate('App\Models\Product');

        return back()->with('success_message','Item has been saved for Later!');
    }

    /*
    **  Remove item saved later
    */
    public function destroySaveLater($item){

        Cart::instance('saveForLater')->remove($item);
        return back()->with('success_message','Item was removed !');
    }

    /*
    **  Move item saved later to Cart
    */
    public function MoveToCart($item){

        $cart=Cart::instance('saveForLater')->get($item);

        Cart::instance('saveForLater')->remove($item);


        $item=Cart::instance('default')->search(function ($cartItem, $rowId) use($cart){
            return $cartItem->id === $cart->id;
        });


        if ($item->isNotEmpty()) {
            return redirect()->route('cart.index')
                             ->with('success_message','This item is already added in your cart!');
        }
        Cart::instance('default')->add($cart->id,$cart->name,$cart->qty,$cart->price)
                                      ->associate('App\Models\Product');

        return back()->with('success_message','Item has been Moved to your Cart!');
    }

    public function deleteAll(){
        Cart::destroy();
        return redirect()->back()->with('success_message','All Item(s) are deleted!');
    }
}
