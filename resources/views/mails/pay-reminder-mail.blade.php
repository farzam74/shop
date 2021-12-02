@component('mail::message')
# یادآوری

کاربر گرامی یک ساعت از ثبت سفارش شما به شماره {{$order->id}} گذشته و پرداخت شما هنوز کامل نشده لطفا برای نهایی شدن سفارش از لینک زیر اقدام کنید.

@component('mail::button', ['url' => route('orders.pay',$order)])
Button Text
@endcomponent

متشکریم,<br>
{{ config('app.name') }}
@endcomponent
