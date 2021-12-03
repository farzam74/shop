@extends('layouts.app')

@section('content')

<div class="m-5">
    <ul class="listed">
        <li><a href={{route('customers.index')}}> <h6>  مدیریت کاربران </h6> </a></li>
        <li><a href=""> <h6> مدیریت سفارشات </h6> </a></li>
        <li><a href=""> <h6>مدیریت مالی</h6> </a></li>
        <li><a href=""> <h6> مدیریت کدهای تخفیف </h6> </a></li>
        <li><a href=""> <h6> مدیریت فروشگاه </h6> </a></li>
        <li><a href=""> <h6> مدیریت سایت </h6> </a></li>
    </ul>
</div>

@endsection
