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
                            <li>
                                <a href="factor.blade.php">
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
                <div class="row">
                    <div class="cart-page-content col-xl-9 col-lg-8 col-md-12 order-1">
                        <div class="cart-page-title">
                            <h1>انتخاب آدرس تحویل سفارش</h1>
                        </div>
                        <section class="page-content default">
                            <div class="address-section">
                                <div class="checkout-contact">
                                    <div class="checkout-contact-content">
                                        <ul class="checkout-contact-items">
                                            <li class="checkout-contact-item">
                                                گیرنده:
                                                <span class="full-name">{{auth()->user()->name}}</span>
                                                <a class="checkout-contact-btn-edit" href="{{route('profile.address.edit')}}">اصلاح این آدرس</a>
                                            </li>
                                            <li class="checkout-contact-item">
                                                <div class="checkout-contact-item checkout-contact-item-mobile">
                                                    شماره تماس:
                                                    <span class="mobile-phone">{{auth()->user()->phone}}</span>
                                                </div>
                                                <div class="checkout-contact-item-message">


                                                    @forelse($errors->all() as $error)
                                                        <x-alert name="danger" message="{{$error}}" />

                                                    @empty
                                                    @endforelse

                                                    @if(strlen(auth()->user()->postal_code)==0 || session('editAddress') || $errors->any())

                                                        <form action="{{route('profile.postalcode.update')}}" method="post">
                                                            @csrf
                                                            <div class="form-group row cart-form">
                                                                <input type="text" name="postal_code" placeholder="کد پستی" class="cartinput">
                                                                <button type="submit" class="cartbutton btn-form-primary">ثبت</button>
                                                            </div>

                                                        </form>

                                                    @else

                                                           کد پستی:
                                                           <span class="post-code">{{auth()->user()->postal_code}}</span>
                                                    @endif
                                                </div>
                                                <br>



                                                @if(strlen(auth()->user()->address) == 0 || session('editAddress')  || $errors->any())
                                                    <form action="{{route('profile.address.update')}}" method="post">
                                                        @csrf
                                                        <div class="form-group row">

                                                        <select name="province" id="province" class="form-check col-3" required>
                                                            <option disabled selected>استان را انتخاب کنید</option>
                                                            <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                                                            <option value="آذربایجان غربی">آذربایجان غربی</option>
                                                            <option value="اردبیل">اردبیل</option>
                                                            <option value="اصفهان">اصفهان</option>
                                                            <option value="البرز">البرز</option>
                                                            <option value="ایلام">ایلام</option>
                                                            <option value="بوشهر">بوشهر</option>
                                                            <option value="تهران">تهران</option>
                                                            <option value="چهارمحال بختیاری">چهارمحال بختیاری</option>
                                                            <option value="خراسان جنوبی">خراسان جنوبی</option>
                                                            <option value="خراسان رضوی">خراسان رضوی</option>
                                                            <option value="خراسان شمالی">خراسان شمالی</option>
                                                            <option value="خوزستان">خوزستان</option>
                                                            <option value="زنجان">زنجان</option>
                                                            <option value="سمنان">سمنان</option>
                                                            <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                                                            <option value="فارس">فارس</option>
                                                            <option value="قزوین">قزوین</option>
                                                            <option value="قم">قم</option>
                                                            <option value="کردستان">کردستان</option>
                                                            <option value="کرمان">کرمان</option>
                                                            <option value="کرمانشاه">کرمانشاه</option>
                                                            <option value="کهکیلویه و بویراحمد">کهکیلویه و بویراحمد</option>
                                                            <option value="گلستان">گلستان</option>
                                                            <option value="گیلان">گیلان</option>
                                                            <option value="لرستان">لرستان</option>
                                                            <option value="مازندران">مازندران</option>
                                                            <option value="مرکزی">مرکزی</option>
                                                            <option value="هرمزگان">هرمزگان</option>
                                                            <option value="همدان">همدان</option>
                                                            <option value="یزد">یزد</option>
                                                        </select>
                                                        <input type="text" name="address" placeholder="آدرس" class="form-control col-6">
                                                        <button type="submit" class="btn btn-primary col-3">ثبت</button>
                                                        </div>
                                                    </form>

                                                @else
                                                    آدرس:  {{auth()->user()->address}}
                                                @endif
                                            </li>
                                        </ul>
                                        <div class="checkout-contact-badge">
                                            <i class="now-ui-icons ui-1_check"></i>
                                        </div>
                                    </div>
{{--                                    <a class="checkout-contact-location">تغییر آدرس ارسال</a>--}}
                                </div>
                            </div>
                            <div id="shipping-data-form">
                                <div class="headline">
                                    <span>محصولات</span>
                                </div>
                                <div class="checkout-pack">
                                    <section class="products-compact">
                                        <div class="box">
                                            <div class="row">

{{--                                                {{dd()}}--}}
                                                @forelse(auth()->user()->cart->cartItems as $key => $cartItem)
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 m-3 border">
                                                        <div class="product-box-container">
                                                            <div class="product-box product-box-compact">
                                                                <a class="product-box-img">
                                                                    <img src="{{url('storage/'.$cartItem->product->primary_img)}}">
                                                                </a>
                                                                <div class="product-box-title">
                                                                    {{$cartItem->product->fa_title}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <livewire:cart.counter :cartItem="$cartItem" :count="$cartItem->count" :product="$cartItem->product" :cartItemPrices="$cartItemPrices" :index="$key"/>
                                                    </div>

                                                @empty
                                                @endforelse

                                            </div>
                                        </div>
{{--                                        {{var_dump(strtotime(auth()->user()->discountCodes()->first()->expire_time))}}--}}
                                    <livewire:cart.discount-code />
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                    <aside class="cart-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-2">
                        <div class="checkout-aside">
                            <div class="checkout-summary">
                              <livewire:cart.price :price="auth()->user()->cart->getPriceAttribute()" :cartItemPrices="$cartItemPrices" />
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
            </div>
        </main>
        <!-- main-shopping -->

    </div>

    <script>
        @if(session('capacity'))
        document.addEventListener("DOMContentLoaded",function ($event){
            swal.fire({
                title: 'عدم موجودی!',
                icon: 'error',
                text: '{{session('capacity')}}',
                confirmButtonText: 'OK'
            })
        });
    @endif
    </script>

@endsection

