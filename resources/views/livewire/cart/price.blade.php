<div class="checkout-summary-main">
    <ul class="checkout-summary-summary">
        <li>
            <span>هزینه ارسال</span>
            <span class="mx-5">{{$postalPrice == 0 ? 'رایگان' : number_format($postalPrice)}}<span class="wiki wiki-holder"><span
                        class="wiki-sign"></span>
                <div class="wiki-container js-dk-wiki is-right">
                    <div class="wiki-arrow"></div>
                    <p class="wiki-text">
                        هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده
                        متفاوت باشد. در
                        صورتی که هر
                        یک از مرسولات حداقل ارزشی برابر با ۱۰۰هزار تومان داشته باشد،
                        آن مرسوله
                        بصورت رایگان
                        ارسال می‌شود.<br>
                        "حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر
                        باشد."
                    </p>
                </div>
            </span></span>
        </li>
    </ul>
    <div class="checkout-summary-devider">
        <div></div>
    </div>
    <div class="checkout-summary-content">
        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
        <div class="checkout-summary-price-value">
            <span class="checkout-summary-price-value-amount">{{number_format($price)}}</span>تومان
        </div>
        <a href="#" class="selenium-next-step-shipping">
            <div class="parent-btn">
                <form action="{{route('cart.factor')}}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="{{$price}}">
                    <input type="hidden" name="postal_price" value="{{$postalPrice}}">
                    <input type="hidden" name="cart_item_prices" value="{{json_encode($cartItemPrices)}}">

                    <button class="dk-btn dk-btn-info">
                        ادامه ثبت سفارش
                        <i class="now-ui-icons shopping_basket"></i>
                    </button>
                </form>
            </div>
        </a>
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
