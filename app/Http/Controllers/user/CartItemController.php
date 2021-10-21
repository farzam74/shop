<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $requestCount=(int)($request->count??1);

        if($request->color == 'notfilled' ){
            return back()->with('warning-color','لطفا رنگ مورد نظر را انتخاب کنید.');
        }

        if ($requestCount<1){
            return back()->with('warning-number','لطفا عددی معتبر وارد کنید.');
        }


        $product=Product::find($request->product_id);

        if($requestCount > $product->capacity){
            return back()->with('error','موجودی این محصول به اتمام رسیده است.');
        }
        if(!auth()->user()->cart()->exists()) {

                $cart = [
                    'user_id' => auth()->id()
                ];

                $cart=Cart::create($cart);
        }
        else{
            $cart=auth()->user()->cart;
        }

        //check if product exists in one of cart items:

        $productOfCart=CartItem::query()->where('cart_id','=',$cart->id)->where('product_id','=',$product->id)->get();

//            $productOfCart=$cart->cartItems()->where('product_id','=',$product->id);
//        dd($productOfCart);

        if($productOfCart->isNotEmpty()) {

            //check capacity of product:
            $count=$requestCount+$cart->cartItems()->first()->count;

            if($count>$product->capacity){
                return back()->with('error','تعداد انتخابی بیشتر از موجودی است.');
            }

            $cartItem=$productOfCart->first();
            $cartItem->count=$count;
            $cartItem->save();
        }

        else {
            $cartItem =
                ['count' => $request->count??1,
                    'product_id' => $product->id,
                    'cart_id' => auth()->user()->cart->id];

            if($request->filled('color')){
                $cartItem=array_merge($cartItem,['color' => $request->color]);
            }

            CartItem::create($cartItem);
        }

            return back()->with('success','محصول با موفقیت به سبد خرید اضافه شد. ');
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cartItem)
    {
        //
    }
}
