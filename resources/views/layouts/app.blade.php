<!DOCTYPE html>
<html lang="fa" >

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Digikala</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" />
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/now-ui-kit.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/plugins/owl.carousel.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/plugins/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/product.css')}}"/>

    @livewireStyles
</head>

<body class="index-page sidebar-collapse">

<!-- responsive-header -->
<nav class="navbar direction-ltr fixed-top header-responsive">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="#pablo">
                <img src="assets/img/logo.png" height="24px" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <div class="search-nav default">
                <form action="">
                    <input type="text" placeholder="?????????? ...">
                    <button type="submit"><img src="assets/img/search.png" alt=""></button>
                </form>
                <ul>
                    <li><a href="#"><i class="now-ui-icons users_single-02"></i></a></li>
                    <li><a href="#"><i class="now-ui-icons shopping_basket"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="logo-nav-res default text-center">
                <a href="#">
                    <img src="assets/img/logo.png" height="36px" alt="">
                </a>
            </div>
            <ul class="navbar-nav default">
                <li class="sub-menu">
                    <a href="#">?????????? ??????????????</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">?????????? ?????????? ????????</a>
                            <ul>
                                <li>
                                    <a href="#">?????? ?? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">??????????????????????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ?????????????????? ????????</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">???????? ????????????</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">?????????? ??????</a>
                                </li>
                                <li>
                                    <a href="#">??????????</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">???????? ????????????</a>
                        </li>
                        <li>
                            <a href="#">???????????? ???????????? ?? ???? ??????</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">????????????</a>
                            <ul>
                                <li>
                                    <a href="#">Apple</a>
                                </li>
                                <li>
                                    <a href="#">Asus</a>
                                </li>
                                <li>
                                    <a href="#">HTC</a>
                                </li>
                                <li>
                                    <a href="#">LG</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">??????????????????????????</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">?????????? ?????????? ????????</a>
                            <ul>
                                <li>
                                    <a href="#">?????? ?? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">??????????????????????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ?????????????????? ????????</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">???????? ????????????</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">?????????? ??????</a>
                                </li>
                                <li>
                                    <a href="#">??????????</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">???????? ????????????</a>
                        </li>
                        <li>
                            <a href="#">???????????? ???????????? ?? ???? ??????</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">????????????</a>
                            <ul>
                                <li>
                                    <a href="#">Apple</a>
                                </li>
                                <li>
                                    <a href="#">Asus</a>
                                </li>
                                <li>
                                    <a href="#">HTC</a>
                                </li>
                                <li>
                                    <a href="#">LG</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">?????????????????????? ?? ??????????</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">?????????? ?????????? ????????</a>
                            <ul>
                                <li>
                                    <a href="#">?????? ?? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">??????????????????????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ?????????????????? ????????</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">???????? ????????????</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">?????????? ??????</a>
                                </li>
                                <li>
                                    <a href="#">??????????</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">???????? ????????????</a>
                        </li>
                        <li>
                            <a href="#">???????????? ???????????? ?? ???? ??????</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">????????????</a>
                            <ul>
                                <li>
                                    <a href="#">Apple</a>
                                </li>
                                <li>
                                    <a href="#">Asus</a>
                                </li>
                                <li>
                                    <a href="#">HTC</a>
                                </li>
                                <li>
                                    <a href="#">LG</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">???? ?? ??????????</a>
                </li>
                <li>
                    <a href="#">???????? ?? ????????????????</a>
                </li>
                <li>
                    <a href="#">???????????????????? ??????????</a>
                </li>
                <li>
                    <a href="#">???????? ?? ??????</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- responsive-header -->

<div class="wrapper default">

    <!-- header -->
    <header class="main-header default">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                    <div class="logo-area default">
                        <a href="#">
                            <img src={{asset('assets/img/logo.png')}} alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-8 col-7">
                    <div class="search-area default">
                        <form action="" class="search">
                            <input type="text" placeholder="?????? ?????????? ???????? ?? ???? ???????? ???????? ?????? ?????? ???? ?????????? ???????????">
                            <button type="submit"><img src={{asset('assets/img/search.png')}} alt=""></button>
                        </form>
                    </div>
                </div>
                <div class="col">



                <div class="col">

                    <div class="user-login dropdown">
                        @guest
                        <a href="" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1">
                            ???????? / ?????? ??????
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            <div class="dropdown-item">
                                <a class="btn btn-info" href="{{ route('login') }}">???????? ???? ???????? ????????</a>
                            </div>
                            <div class="dropdown-item font-weight-bold">
                                <span>?????????? ???????? ????????????</span> <a class="register" href="{{route('register')}}">???????????????</a>
                            </div>
                        </ul>
                        @endguest

                        @auth
                                <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                                   id="navbarDropdownMenuLink1">

                                    {{ Auth::user()->name }}

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                    <div class="dropdown-item">
                                        <a class="btn btn-info" href="{{route('profile.index')}}">???????????? ???????? ????????????</a>
                                    </div>
                                    <div class="dropdown-item font-weight-bold">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            ????????
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </ul>
                         @endauth
                    </div>

{{--                    {{dd(auth()->user()->cart->cartItems()->get())}}--}}
                @auth
                    <div class="cart dropdown d-flex justify-content-start">
                        <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            ?????? ????????
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            @if(auth()->user()->cart()->exists() && auth()->user()->cart()->first()->cartItems()->exists() )
                            <div class="basket-header">
                                <div class="basket-total">
                                    <span>???????? ???? ????????:</span>

                                    <span> {{number_format(auth()->user()->cart->getPriceAttribute()) }}</span>
                                    <span> ??????????</span>
                                </div>
                            </div>
                            <ul class="basket-list">
                                <li>
                                    <a href="{{route('cart.index')}}" class="basket-item">
                                        <button class="basket-item-remove"></button>
                                        <div class="basket-item-content">
                                            <div class="basket-item-image">
                                                <img alt="" src="{{url('storage/'.auth()->user()->cart->cartItems()->first()->product->primary_img)}}">
                                            </div>
                                            <div class="basket-item-details">
                                                <div class="basket-item-title">{{auth()->user()->cart->cartItems()->first()->product->fa_title}}
                                                </div>
                                                <div class="basket-item-params">
                                                    <div class="basket-item-props">
                                                        <span> {{auth()->user()->cart->cartItems()->first()->count}} ??????</span>
                                                        @if(auth()->user()->cart->cartItems()->first()->color != null)
                                                        <span>?????? {{auth()->user()->cart->cartItems()->first()->color}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @if(auth()->user()->cart->cartItems()->count()>1)
                                       <div class="basket-item-title text-center">
                                            ?? {{auth()->user()->cart->cartItems()->count()-1}} ?????????? ????????
                                       </div>
                                        @endif
                                    </a>
                                </li>
                            </ul>

                            <a href="#" class="basket-submit">?????????? ??????</a>
                            @else
                                <div class="basket-header text-center" >?????? ???????? ???????? ??????!</div>
                            @endif

                        </ul>
                    </div>
                @endauth
                </div>

            </div>
        </div>
        <nav class="main-menu">
            <div class="container">
                <ul class="list d-flex justify-content-start">

                    @foreach($categories as $category)
                        @if($category->parent_id == null)
                        <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                        <a class="nav-link" href="{{route('categories.show',['category' => $category->id])}}">{{$category->name}} </a>
                        <ul class="sub-menu nav">

                            @forelse($category->subCategories as $subCategory)

                                <li class="list-item list-item-has-children">
                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                    <a class="main-list-item nav-link" href="{{route('categories.show',['category' => $subCategory->id])}}">{{$subCategory->name}}</a>
                                    <ul class="sub-menu nav">

                                        @forelse($subCategory->subCategories as $grandSubCategory)
                                            <li class="list-item">
                                                <a class="nav-link" href="{{route('categories.show',['category' => $grandSubCategory->id])}}">{{$grandSubCategory->name}}</a>
                                            </li>
                                        @empty

                                        @endforelse


                                    </ul>
                                </li>

                            @empty

                            @endforelse


                            <img src="assets/img/1636.png" alt="">
                        </ul>
                    </li>

                    @endif
                    @endforeach

                    <li class="list-item amazing-item">
                        <a class="nav-link" href="#" target="_blank">?????????????????????????</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- header -->

{{--    {{dd(auth()->user()->cart())}}--}}
            @yield('content')



    <footer class="main-footer default">
        <div class="back-to-top">
            <a href="#"><span class="icon"><i class="now-ui-icons arrows-1_minimal-up"></i></span> <span>???????????? ????
                        ????????</span></a>
        </div>
        <div class="container">
            <div class="footer-services">
                <div class="row">
                    <div class="service-item col">
                        <a href="#" target="_blank">
                            <img src={{asset('assets/img/svg/delivery.svg')}}>
                        </a>
                        <p>?????????? ????????????</p>
                    </div>
                    <div class="service-item col">
                        <a href="#" target="_blank">
                            <img src={{asset('assets/img/svg/contact-us.svg')}}>
                        </a>
                        <p>???????????????? 24 ??????????</p>
                    </div>
                    <div class="service-item col">
                        <a href="#" target="_blank">
                            <img src={{asset('assets/img/svg/payment-terms.svg')}}>
                        </a>
                        <p>???????????? ??????????</p>
                    </div>
                    <div class="service-item col">
                        <a href="#" target="_blank">
                            <img src={{asset('assets/img/svg/return-policy.svg')}}>
                        </a>
                        <p>?? ?????? ?????????? ????????????</p>
                    </div>
                    <div class="service-item col">
                        <a href="#" target="_blank">
                            <img src={{asset('assets/img/svg/origin-guarantee.svg')}}>
                        </a>
                        <p>?????????? ?????? ???????? ????????</p>
                    </div>
                </div>
            </div>
            <div class="footer-widgets">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">?????????????? ???????? ???? ???????? ????????</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">???????? ?????? ??????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ?????????? ??????????</a>
                                </li>
                                <li>
                                    <a href="#">????????????????? ????????????</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">?????????? ??????????????</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">???????? ???? ????????????????? ????????????</a>
                                </li>
                                <li>
                                    <a href="#">????????????????? ???????????????????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">?????????? ??????????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ??????????</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">???? ???????? ????????</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">???????? ???? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????????? ???? ???????????????????</a>
                                </li>
                                <li>
                                    <a href="#">????????????????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ???? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????????? ???????? ????????</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="newsletter">
                            <p>???? ????????????????? ?? ????????????????????????? ?????????????? ?????????? ????????:</p>
                            <form action="">
                                <input type="email" class="form-control"
                                       placeholder="???????? ?????????? ?????? ???? ???????? ????????...">
                                <input type="submit" class="btn btn-primary" value="??????????">
                            </form>
                        </div>
                        <div class="socials">
                            <p>???? ???? ???? ???????? ?????? ?????????????? ?????????? ????????.</p>
                            <div class="footer-social">
                                <a href="#" target="_blank"><i class="fa fa-instagram"></i>???????????????????? ???????? ????????</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <span>?????? ?????? ???????? ?? 24 ???????? ??????????????????? ?????????????? ?????? ??????????.</span>
                    </div>
                    <div class="col-12 col-lg-2">?????????? ????????: 021-123456789</div>
                    <div class="col-12 col-lg-2">???????? ??????????:<a href="#">info@digikala.com</a></div>
                    <div class="col-12 col-lg-4 text-center">
                        <a href="#" target="_blank"><img src={{asset('assets/img/bazzar.png')}} width="159" height="48"
                                                         alt=""></a>
                        <a href="#" target="_blank"><img src={{asset('assets/img/sibapp.png')}} width="159" height="48"
                                                         alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="description">
            <div class="container">
                <div class="row">
                    <div class="site-description col-12 col-lg-7">
                        <h1 class="site-title">?????????????? ???????????????? ???????? ?????????? ???????????? ???????????? ?? ???????? ????????????</h1>
                        <p>
                            ???????? ???????? ???? ?????????? ?????? ???? ????????????????????? ?????????????? ?????? ???????????????? ???? ?????? ???? ???? ?????? ???????????? ????
                            ?????????????? ???? ???? ?????? ???????????? ???????????? ????
                            ???????? 7 ?????? ?????????? ???????????? ???????? ?? ?????????? ????????????????? ?????????? ???????? ?????? ???? ?????????? ???? ???????????????????????
                            ?????????? ?????????? ???? ??????????????????? ??????????????
                            ???????????????? ?????????? ?????????? ??????. ???? ?????? ???????? ???? ???????? ???????? ???? ???? ???????? ???? ???? ???????? ???? ???? ????
                            ???????????????! ???? ???????? ???? ???????? ?????????? ?? ????
                            ?????? ?????? ???????? ????????????? ???? ?????????? ???????? ???????????? ??????.
                        </p>
                    </div>
                    <div class="symbol col-12 col-lg-5">
                        <a href="#" target="_blank"><img src="assets/img/symbol-01.png" alt=""></a>
                        <a href="#" target="_blank"><img src="assets/img/symbol-02.png" alt=""></a>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <ul class="footer-partners default">
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src={{asset('assets/img/footer/1.svg')}} alt=""></a>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src={{asset('assets/img/footer/2.svg')}} alt=""></a>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src={{asset('assets/img/footer/3.svg')}} alt=""></a>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <a href=""><img src={{asset('assets/img/footer/4.svg')}} alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>
                    ?????????????? ???? ?????????? ?????????????? ???????????????? ???????? ???????? ?????? ???????? ?????????? ???????????????? ?? ???? ?????? ???????? ?????????????? ??????.
                    ???????? ???????? ?????? ???????? ??????????
                    ???? ???????? ?????????????? ???? ?????????? (?????????????? ???????????? ???????? ????????) ???????????????.
                </p>
            </div>
        </div>
    </footer>
</div>

<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



@livewireScripts


<!-- Add sweetalert CDN -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

</body>


</html>
