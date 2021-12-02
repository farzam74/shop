<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Evryn\LaravelToman\Facades\Toman;
use Evryn\LaravelToman\CallbackRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=auth()->user()->orders;

        return view('users.orders',compact('orders'));
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
        $payment=$request->payment_type;
        $price=$request->price;
        $postalPrice=$request->postal_price??0;
        $totalPrice=$price+$postalPrice;
        $info['items']=json_decode($request->cart_item_prices,true);
        $info['post_price']=$postalPrice;


        if($payment == 'online') {

            $order = Order::query()->create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'price' => $totalPrice,
                'payment_type' => 'online',
                'info' => json_encode($info),
                'transaction_id' => ''
            ]);

            return redirect()->route('orders.pay',$order);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function pay(Order $order)
    {
        $request = Toman::amount($order->price)
            ->description('خرید از فروشگاه shop.test')
            ->callback(route('orders.verify'))
            ->mobile($order->user->phone)
            ->email($order->user->email)
            ->request();

        if ($request->successful()) {

            $transactionId = $request->transactionId();

            // Store created transaction details for verification
            $order->transaction_id=$transactionId;
            $order->save();

            return $request->pay(); // Redirect to payment URL
        }

        if ($request->failed()) {

            // Handle transaction request failure; Probably showing proper error to user.
            return back()->with('error','مشکل دراتصال به درگاه پرداخت');

        }
    }


    public function verify(CallbackRequest $request)
    {
        $order=Order::where('transaction_id',$request->transactionId())->firstOrFail();
        $payment=$request->amount($order->price)->verify();

        if ($payment->successful())
        {
//            dd($payment->referenceId());
//            dd($order->info);

            foreach (json_decode($order->info,true)['items'] as $item)
            {
                $product=Product::findOrFail($item['product']);

                    $product->capacity=$product->capacity-$item['count'];
                    $product->save();

            }

            $order->status='paid';
            $order->save();
            return redirect()->route('orders.factor',$order);
        }

        if ($payment->failed()) {

            $order->status='pending';
            $order->save();
            return view('users.order-unpaid',compact('order'));
        }

    }

    public function factor(Order $order)
    {
        return view('users.order-factor',compact('order'));
    }


}
