@extends('layouts.app')

@section('content')




<main class="main default">
    <div class="container">



    <!-- banner -->
    <div class="row">
        <div class="col-12  order-1 order-lg-2">

            {{--      sliders section      --}}

            <section id="main-slider" class="carousel slide carousel-fade card " data-ride="carousel">
                <ol class="carousel-indicators">



                    @for($i=0;$i<count($sliders);$i++)

                        <li data-target="#main-slider" data-slide-to="{{$i}}" class="{{($i==0 ? 'active' : '')}}"></li>
                    @endfor

                </ol>
                <div class="carousel-inner">


                    @foreach($sliders as $slider)

                        <div class="carousel-item {{($loop->index ==0 ? 'active' : '')}}">
                            <a class="d-block" href="{{$slider->link}}">
                                <img src="{{asset("storage/sliders/$slider->image")}}"
                                     class="d-block w-100" alt="{{$slider->alt}}">
                            </a>
                        </div>


                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                </a>
                <a class="carousel-control-next" href="#main-slider" role="button" data-slide="next">
                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                </a>
            </section>


            {{--       amazing offers section     --}}

            <section id="amazing-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                <div class="row m-0">
                    <ol class="carousel-indicators pr-0 d-flex flex-column col-lg-3">

                        @forelse($amazingOffers as $amazingOffer)
                            <li class="{{($loop->index ==0 ? 'active' : '')}}" data-target="#amazing-slider" data-slide-to="{{$loop->index}}">



                                <span> {{$amazingOffer->product->fa_title}}  </span>
                            </li>
                        @empty

                            هیچ پیشنهاد شگفت انگیزی در حال حاضر وجود ندارد!

                        @endforelse


                        <li class="view-all">
                            <a href="#" class="btn btn-primary btn-block hvr-sweep-to-left">
                                <i class="fa fa-arrow-left"></i>مشاهده همه شگفت انگیزها
                            </a>
                        </li>
                    </ol>

                    <div class="carousel-inner p-0 col-12 col-lg-9">
                        <img class="amazing-title" src="assets/img/amazing-slider/amazing-title-01.png"
                             alt="">
                        @forelse($amazingOffers as $amazingOffer)

                        <div class="carousel-item {{($loop->index ==0 ? 'active' : '')}}">
                            <main class="row m-0">
                                <div class="right-col col-5 d-flex align-items-center">
                                    <a class="w-100 text-center" href="{{route('products.show',[$amazingOffer->product])}}">
                                        <img src="{{asset('storage/'.$amazingOffer->product->primary_img)}}"
                                             class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="left-col col-7">
                                    <div class="price">
                                        <del><span>{{$amazingOffer->product->price}}<span>تومان</span></span></del>
                                        <ins><span>{{($amazingOffer->product->price)-($amazingOffer->product->price * round($amazingOffer->discount/100,2))}}<span>تومان</span></span></ins>
                                        <span class="discount-percent">{{$amazingOffer->discount}} % تخفیف</span>
                                    </div>
                                    <h2 class="product-title">
                                        <a href="{{route('products.show',[$amazingOffer->product])}}">{{$amazingOffer->product->category->name}} {{$amazingOffer->product->fa_title}}</a>
                                    </h2>


                                    <ul>

                                        @foreach($amazingOffer->product->attributes as $attribute)

                                            <li class="d-flex justify-content-start">
                                                {{$attribute->attribute()->first()->key}}: {{$attribute->attribute()->first()->value}}
                                            </li>

                                            @if($loop->index==1)
                                                @break
                                            @endif

                                        @endforeach

                                    </ul>

                                <hr>
                                <div class="countdown-timer" countdown data-date="{{$amazingOffer->expire}}">
                                <span data-days>0</span>:
                                <span data-hours>0</span>:
                                <span data-minutes>0</span>:
                                <span data-seconds>0</span>
                                </div>
                                <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                                </div>
                                </main>


                                @empty

                                هیچ پیشنهاد شگفت انگیزی در حال حاضر وجود ندارد!

                                @endforelse

                        </div>
        </div>

    </div>

            </section>
        </div>
    </div>

    <div class="row">
            <div class="col-12">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h3 class="card-title">
                            <span>دسته بندی ها</span>
                        </h3>

                    </header>

                    <div class="product-carousel owl-carousel owl-theme row">

                        @forelse($mainCategoriesProducts as $product)

                        <div class="item col">
                            @if($product[0]->icon != null)
                            <a href="{{route('categories.show',['category' => $product[0]->id])}}">
                                <img src="{{'storage/'.$product[0]->icon}}"
                                     class="img-fluid" alt="" style="height: 200px">
                                <h2 class="post-title">
                                   {{$product[0]->name}}
                                </h2>
                                <span>
                                    {{count($product[1])}}کالا
                                </span>
                            </a>

                            @endif



                        </div>


                        @empty

                        @endforelse


                    </div>
                </div>
            </div>
        </div>


    </div>

</main>

@endsection
{{--
</div>
</div>
</section>
<div class="row" id="amazing-slider-responsive">
<div class="col-12">
<div class="widget widget-product card">
<header class="card-header">
<img src="assets/img/amazing-slider/amazing-title-01.png" width="150px" alt="">
<a href="#" class="view-all">مشاهده همه</a>
</header>
<div class="product-carousel owl-carousel owl-theme">
<div class="item">
<a href="#">
<img src="assets/img/product-slider/60eb20-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
</h2>
<div class="price">
<ins><span>4,180,000<span>تومان</span></span></ins>
</div>
<hr>
<div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
<span data-days>0</span>:
<span data-hours>0</span>:
<span data-minutes>0</span>:
<span data-seconds>0</span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/4ff777-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
</h2>
<div class="price">
<ins><span>6,580,000<span>تومان</span></span></ins>
</div>
<hr>
<div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
<span data-days>0</span>:
<span data-hours>0</span>:
<span data-minutes>0</span>:
<span data-seconds>0</span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/35a2b8-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
</h2>
<div class="price">
<ins><span>4,699,000<span>تومان</span></span></ins>
</div>
<hr>
<div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
<span data-days>0</span>:
<span data-hours>0</span>:
<span data-minutes>0</span>:
<span data-seconds>0</span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/9b3da9-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
</h2>
<div class="price">
<ins><span>2,780,000<span>تومان</span></span></ins>
</div>
<hr>
<div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
<span data-days>0</span>:
<span data-hours>0</span>:
<span data-minutes>0</span>:
<span data-seconds>0</span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/c8297f-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
</h2>
<div class="price">
<ins><span>8,899,000<span>تومان</span></span></ins>
</div>
<hr>
<div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
<span data-days>0</span>:
<span data-hours>0</span>:
<span data-minutes>0</span>:
<span data-seconds>0</span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/a579bb-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
</h2>
<div class="price">
<ins><span>4,279,000<span>تومان</span></span></ins>
</div>
<hr>
<div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
<span data-days>0</span>:
<span data-hours>0</span>:
<span data-minutes>0</span>:
<span data-seconds>0</span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/19a2cc-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
</h2>
<div class="price">
<ins><span>18,450,000<span>تومان</span></span></ins>
</div>
<hr>
<div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
<span data-days>0</span>:
<span data-hours>0</span>:
<span data-minutes>0</span>:
<span data-seconds>0</span>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-12">
<div class="widget widget-product card">
<header class="card-header">
<h3 class="card-title">
<span>کامپیوتر و لوازم جانبی</span>
</h3>
<a href="#" class="view-all">مشاهده همه</a>
</header>
<div class="product-carousel owl-carousel owl-theme">
<div class="item">
<a href="#">
<img src="assets/img/product-slider/60eb20-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
</h2>
<div class="price">
<div class="text-center">
<del><span>4,299,000<span>تومان</span></span></del>
</div>
<div class="text-center">
<ins><span>4,180,000<span>تومان</span></span></ins>
</div>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/4ff777-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
</h2>
<div class="price">
<del><span>6,890,000<span>تومان</span></span></del>
<ins><span>6,580,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/35a2b8-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
</h2>
<div class="price">
<del><span>4,799,000<span>تومان</span></span></del>
<ins><span>4,699,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/9b3da9-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
</h2>
<div class="price">
<span>2,780,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/c8297f-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
</h2>
<div class="price">
<del><span>8,999,000<span>تومان</span></span></del>
<ins><span>8,899,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/a579bb-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
</h2>
<div class="price">
<span>4,279,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/19a2cc-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
</h2>
<div class="price">
<span>18,450,000<span>تومان</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="widget widget-product card">
<header class="card-header">
<h3 class="card-title">
<span>کامپیوتر و لوازم جانبی</span>
</h3>
<a href="#" class="view-all">مشاهده همه</a>
</header>
<div class="product-carousel owl-carousel owl-theme">
<div class="item">
<a href="#">
<img src="assets/img/product-slider/60eb20-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
</h2>
<div class="price">
<del><span>4,299,000<span>تومان</span></span></del>
<ins><span>4,180,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/4ff777-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
</h2>
<div class="price">
<del><span>6,890,000<span>تومان</span></span></del>
<ins><span>6,580,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/35a2b8-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
</h2>
<div class="price">
<del><span>4,799,000<span>تومان</span></span></del>
<ins><span>4,699,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/9b3da9-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
</h2>
<div class="price">
<span>2,780,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/c8297f-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
</h2>
<div class="price">
<del><span>8,999,000<span>تومان</span></span></del>
<ins><span>8,899,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/a579bb-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
</h2>
<div class="price">
<span>4,279,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/19a2cc-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
</h2>
<div class="price">
<span>18,450,000<span>تومان</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row banner-ads">
<div class="col-12">
<div class="row">
<div class="col-12 col-lg-6">
<div class="widget-banner card">
<a href="#" target="_blank">
<img class="img-fluid" src="assets/img/banner/banner-9.jpg" alt="">
</a>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="widget-banner card">
<a href="#" target="_top">
<img class="img-fluid" src="assets/img/banner/banner-10.jpg" alt="">
</a>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="widget widget-product card">
<header class="card-header">
<h3 class="card-title">
<span>کامپیوتر و لوازم جانبی</span>
</h3>
<a href="#" class="view-all">مشاهده همه</a>
</header>
<div class="product-carousel owl-carousel owl-theme">
<div class="item">
<a href="#">
<img src="assets/img/product-slider/60eb20-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
</h2>
<div class="price">
<del><span>4,299,000<span>تومان</span></span></del>
<ins><span>4,180,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/4ff777-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
</h2>
<div class="price">
<del><span>6,890,000<span>تومان</span></span></del>
<ins><span>6,580,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/35a2b8-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
</h2>
<div class="price">
<del><span>4,799,000<span>تومان</span></span></del>
<ins><span>4,699,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/9b3da9-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
</h2>
<div class="price">
<span>2,780,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/c8297f-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
</h2>
<div class="price">
<del><span>8,999,000<span>تومان</span></span></del>
<ins><span>8,899,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/a579bb-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
</h2>
<div class="price">
<span>4,279,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/19a2cc-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
</h2>
<div class="price">
<span>18,450,000<span>تومان</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="widget widget-product card">
<header class="card-header">
<h3 class="card-title">
<span>کامپیوتر و لوازم جانبی</span>
</h3>
<a href="#" class="view-all">مشاهده همه</a>
</header>
<div class="product-carousel owl-carousel owl-theme">
<div class="item">
<a href="#">
<img src="assets/img/product-slider/60eb20-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
</h2>
<div class="price">
<del><span>4,299,000<span>تومان</span></span></del>
<ins><span>4,180,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/4ff777-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
</h2>
<div class="price">
<del><span>6,890,000<span>تومان</span></span></del>
<ins><span>6,580,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/35a2b8-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
</h2>
<div class="price">
<del><span>4,799,000<span>تومان</span></span></del>
<ins><span>4,699,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/9b3da9-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
</h2>
<div class="price">
<span>2,780,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/c8297f-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
</h2>
<div class="price">
<del><span>8,999,000<span>تومان</span></span></del>
<ins><span>8,899,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/a579bb-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
</h2>
<div class="price">
<span>4,279,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/19a2cc-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
</h2>
<div class="price">
<span>18,450,000<span>تومان</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row banner-ads">
<div class="col-12">
<div class="row">
<div class="col-12">
<div class="widget widget-banner card">
<a href="#" target="_blank">
<img class="img-fluid" src="assets/img/banner/banner-11.jpg" alt="">
</a>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="widget widget-product card">
<header class="card-header">
<h3 class="card-title">
<span>کامپیوتر و لوازم جانبی</span>
</h3>
<a href="#" class="view-all">مشاهده همه</a>
</header>
<div class="product-carousel owl-carousel owl-theme">
<div class="item">
<a href="#">
<img src="assets/img/product-slider/60eb20-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
</h2>
<div class="price">
<del><span>4,299,000<span>تومان</span></span></del>
<ins><span>4,180,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/4ff777-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
</h2>
<div class="price">
<del><span>6,890,000<span>تومان</span></span></del>
<ins><span>6,580,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/35a2b8-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
</h2>
<div class="price">
<del><span>4,799,000<span>تومان</span></span></del>
<ins><span>4,699,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/9b3da9-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
</h2>
<div class="price">
<span>2,780,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/c8297f-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
</h2>
<div class="price">
<del><span>8,999,000<span>تومان</span></span></del>
<ins><span>8,899,000<span>تومان</span></span></ins>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/a579bb-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
</h2>
<div class="price">
<span>4,279,000<span>تومان</span></span>
</div>
</div>
<div class="item">
<a href="#">
<img src="assets/img/product-slider/19a2cc-200x200.jpg"
class="img-fluid" alt="">
</a>
<h2 class="post-title">
<a href="#">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
</h2>
<div class="price">
<span>18,450,000<span>تومان</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!--   JS & Bootstrap CDN   -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


@endsection
--}}
