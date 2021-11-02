<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use nusoap_client;

class OrderController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment=$request->payment_type;
        $price=$request->price;
        $info=json_decode($request->cart_item_prices);
        $info['post_price']=$request->postal_price??0;

        require base_path().'/app/Services/nusoap.php';

        $soapclient = new nusoap_client('https://banktest.ir/gateway/Parsian/NewIPGServices/Sale/SaleService.asmx?wsdl','wsdl');

        $err = $soapclient->getError();

        if (!$err)
            $soapProxy = $soapclient->getProxy() ;
        else
            die('خطا در اتصال به بانک !');

        // پین بانک
        $pin = 'a9hmKeBaTKxgj4Kigs4L';
        $now = time();
        $rand = mt_rand(12345678,98765432);
        $callback = env('APP_URL')."/verify.php?rand={$rand}&time={$now}";
        $price = 20000;// RIAL

        $params = array(
            'pin' => $pin ,
            'amount' => $price ,
            'orderId' => $now,
            'callbackUrl' => $callback,
            'authority' => 0,
            'status' => 1 ,
        );
        $sendParams = array($params) ;
        //فرستادن مقادیر
        $res = $soapclient->call('PinPaymentRequest', $sendParams);

        //print_r($res);

        if(empty($res) or ! isset($res['authority']))
            die('خطا در اتصال به بانک !!');

        // کلید خطاهای بانک
        $error_num = array();
        $error_num[20] = 'پین فروشنده درست نیست';
        $error_num[22] = 'آی پی فروشنده مطابقت ندارد';
        $error_num[23] = 'عملیات قبلاً با موفقیت انجام شده';
        $error_num[34] = 'شماره تراکنش درست نیست !';

        // چک کردن وضعیت
        if($res['status'] !=0) // error
        {
            if(array_key_exists($res['status'],$error_num))
                die($error_num[$res['status']]);
            else
                die('خطا در اتصال به بانک !!!');
        }
        else // connect true
        {
            $db->query("insert into `parsian` (`au`,`rand`,`time_stamp`,`status`,`price`) values ('{$res['authority']}' , {$rand} ,{$now},'ordered' ,{$price}) ");
            header("location: https://www.pecco24.com/pecpaymentgateway/?au={$res['authority']}");
            die;
        }

        if($payment == 'online') {

            Order::query()->create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'price' => $price,
                'payment_type' => 'online',
                'info' => json_encode($info)
            ]);

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
}
