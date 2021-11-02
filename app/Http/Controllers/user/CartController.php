<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CartController extends Controller
{


    public function add(Request $request)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItemPrices=[];

        foreach (auth()->user()->cart->cartItems as $key => $item){
            $cartItemPrices[$key]['price']=$item->getPriceAttribute();
            $cartItemPrices[$key]['product'] = $item->product_id;
            $cartItemPrices[$key]['count'] = $item->count;
        }
        return view('users.cart',compact('cartItemPrices'));
    }

    public function factor(Request $request)
    {
        $price=$request->price;
        $postalPrice=$request->postal_price;
        $cartItemPrices=json_decode($request->cart_item_prices);
        $cartItems=auth()->user()->cart->cartItems()->get();


        return view('users.factor')
            ->with('price',$price)
            ->with('postalPrice',$postalPrice)
            ->with('cartItems',$cartItems)
            ->with('cartItemPrices',$cartItemPrices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
