@extends('layouts.app')

@section('content')
    <div class="wrapper default shopping-page">
        <!-- header-shopping -->
        <header class="header-shopping default">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center pt-2">
                        <div class="header-shopping-logo default">
                            <a href="#">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <ul class="checkout-steps">
                            <li>
                                <a href="cart.blade.php" class="active">
                                    <span>اطلاعات ارسال</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="factor.blade.php" class="active">
                                    <span>پرداخت</span>
                                </a>
                            </li>
                            <li>
                                <a href="shopping-complete-buy.html">
                                    <span>اتمام خرید و ارسال</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-shopping -->

        <!-- main-shopping -->
        <main class="cart-page default">
            <div class="container">
                <form action="{{route('orders.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="cart-page-content col-xl-9 col-lg-8 col-md-12 order-1">
                        <div class="cart-page-title">
                            <h1>انتخاب شیوه پرداخت</h1>
                        </div>
                        <section class="page-content default">
                                <ul class="checkout-paymethod">
                                    <li>
                                        <div class="checkout-paymethod-item checkout-paymethod-item-cc has-options">
                                            <div class="radio">
                                                <input type="radio" name="payment_type" id="radio1" value="online" checked>
                                                <label for="radio1">
                                                    <div>
                                                        <h4 class="checkout-paymethod-title">
                                                            <div>
                                                                <p class="checkout-paymethod-title-label">
                                                                    پرداخت اینترنتی ( آنلاین با تمامی کارت‌های بانکی )
                                                                </p>
                                                            </div>
                                                            <span>سرعت بیشتر در ارسال و پردازش سفارش </span>
                                                        </h4>
                                                    </div>

                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkout-paymethod-item checkout-paymethod-item-cc has-options">
                                            <div class="radio">
                                                <input type="radio" name="payment_type" id="radio2" value="cash">
                                                <label for="radio2">
                                                    <div>
                                                        <h4 class="checkout-paymethod-title">
                                                            <div>
                                                                <p class="checkout-paymethod-title-label">
                                                                    پرداخت نقدی
                                                                </p>
                                                            </div>
                                                            <span>سرعت بیشتر در ارسال و پردازش سفارش </span>
                                                        </h4>

                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <div class="headline">
                                <span>خلاصه سفارش</span>
                            </div>
                            <div class="checkout-order-summary">
                                <div class="accordion checkout-order-summary-item" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header checkout-order-summary-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                    <div class="checkout-order-summary-row">
                                                        <div
                                                            class="checkout-order-summary-col checkout-order-summary-col-post-time">
                                                            <span class="fs-sm">{{$cartItems->count()}} کالا</span>

                                                        </div>
                                                        <div
                                                            class="checkout-order-summary-col checkout-order-summary-col-how-to-send">
                                                            <span class="dl-none-sm">نحوه ارسال</span>
                                                            <span class="dl-none-sm">
                                                                پست پیشتاز
                                                            </span>
                                                        </div>

                                                        <div
                                                            class="checkout-order-summary-col checkout-order-summary-col-shipping-cost">
                                                            <span>هزینه ارسال</span>
                                                            <span class="fs-sm">
                                                                رایگان
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <i class="now-ui-icons arrows-1_minimal-down icon-down"></i>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="box">
                                                    <div class="row">
                                                            @foreach($cartItems as $key => $item)
                                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                                <div class="product-box-container">
                                                                    <div class="product-box product-box-compact">
                                                                        <a class="product-box-img">
                                                                            <img src="{{url('storage/'.$item->product->primary_img)}}">
                                                                        </a>
                                                                        <div class="product-box-title">
                                                                            {{$item->product->fa_title}}
                                                                        </div>
                                                                        <div class="text-center text-muted">
                                                                            {{$item->count}} عدد
                                                                        </div>
                                                                        @if( $item->price == $cartItemPrices[$key]->price)
                                                                        <div class="text-center text-danger">

                                                                            {{ $item->price}} تومان
                                                                        </div>
                                                                        @else
                                                                        <div class="text-center">
                                                                            <del>
                                                                                {{ $item->price}} تومان
                                                                            </del>
                                                                            <div class="text-danger">
                                                                                {{$cartItemPrices[$key]->price}} تومان
                                                                            </div>
                                                                        </div>
                                                                       @endif

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                    <aside class="cart-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-2">
                        <div class="checkout-aside">
                            <div class="checkout-summary">
                                <div class="checkout-summary-main">
                                    <ul class="checkout-summary-summary">
                                            <span>هزینه ارسال</span>
                                            <span>{{$postalPrice == 0 ? 'رایگان': $postalPrice ."تومان"}}<span class="wiki wiki-holder"><span
                                                        class="wiki-sign"></span>
                                                    <div class="wiki-container js-dk-wiki is-right">
                                                        <div class="wiki-arrow"></div>
                                                    </div>
                                        </li>
                                    </ul>
                                    <div class="checkout-summary-devider">
                                        <div></div>
                                    </div>
                                    <div class="checkout-summary-content">
                                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                        <div class="checkout-summary-price-value">
                                            <span class="checkout-summary-price-value-amount">{{number_format($price)}} </span>تومان
                                        </div>

                                            <div class="parent-btn">
                                                <button class="dk-btn dk-btn-info" type="submit">
                                                    ادامه ثبت سفارش
                                                    <i class="now-ui-icons shopping_basket"></i>
                                                </button>
                                            </div>

                                        <div>
                                            <span>
                                                کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی
                                                را تکمیل
                                                کنید.
                                            </span>
                                            <span class="wiki wiki-holder"><span class="wiki-sign"></span>
                                                <div class="wiki-container is-right">
                                                    <div class="wiki-arrow"></div>
                                                    <p class="wiki-text">
                                                        محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش
                                                        برای شما رزرو
                                                        می‌شوند. در
                                                        صورت عدم ثبت سفارش، دیجی کالا هیچگونه مسئولیتی در قبال تغییر
                                                        قیمت یا موجودی
                                                        این کالاها
                                                        ندارد.
                                                    </p>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-feature-aside">
                                <ul>
                                    <li class="checkout-feature-aside-item checkout-feature-aside-item-guarantee">
                                        هفت روز
                                        ضمانت تعویض
                                    </li>
                                    <li class="checkout-feature-aside-item checkout-feature-aside-item-cash">
                                        پرداخت در محل با
                                        کارت بانکی
                                    </li>
                                    <li class="checkout-feature-aside-item checkout-feature-aside-item-express">
                                        تحویل اکسپرس
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                    <input type="hidden" name="price" value="{{$price}}">
                    <input type="hidden" name="postal_price" value="{{$postalPrice}}">
                    <input type="hidden" name="cart_item_prices" value="{{json_encode($cartItemPrices)}}">
                </form>
            </div>
        </main>
        <!-- main-shopping -->

    </div>

@endsection
