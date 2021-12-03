@extends('layouts.app')

@section('content')
    <!-- main -->
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-12">
                                <h1 class="title-tab-content">اطلاعات شخصی</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <span class="title">نام و نام خانوادگی :</span>
                                            <span>{{auth()->user()->name}}</span>
                                        </p>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            <span class="title">پست الکترونیک :</span>
                                            <span>{{auth()->user()->email}}</span>
                                        </p>
                                    </div>

                                    <div class="col-12 text-center">
                                        <a href="profile-additional-info.html" class="btn-link-border form-account-link">
                                            ویرایش اطلاعات شخصی
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1 class="title-tab-content">آخرین سفارش ها</h1>
                        </div>
                        <div class="col-12 text-center">
                            <div class="content-section pt-5 pb-5">
                                <div class="icon-empty">
                                    <i class="now-ui-icons travel_info"></i>
                                </div>
                                <h1 class="text-empty">موردی برای نمایش وجود ندارد!</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
                    <div class="profile-box">
                        <div class="profile-box-header">
                            <div class="profile-box-avatar">
                                <img src="{{asset('storage/'.auth()->user()->avatar)}}" alt="">
                            </div>



                            <form action="{{route('profile.avatar.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <label class="profile-box-btn-edit" for="file-upload">
                                    <i class="fa fa-pencil">
                                    </i>
                                </label>

                                <input type="file" name="avatar" id="file-upload" onchange="this.form.submit()" style="display: none">

                            </form>


                        </div>
                        <div class="profile-box-username">{{auth()->user()->name}}</div>
                        <div class="profile-box-tabs">

                            <a href="{{route('profile.changepassword')}}" class="profile-box-tab profile-box-tab-access btn btn-link">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                تغییر رمز
                            </a>
                            <a class="profile-box-tab profile-box-tab--sign-out">
                                <form action="{{route('logout')}}" method="post" >
                                    @csrf
                                    <button type="submit" class="btn btn-link">
                                        <i class="now-ui-icons media-1_button-power"></i>
                                        خروج از حساب
                                    </button>

                                </form>
                            </a>


                        </div>
                    </div>
                    <div class="responsive-profile-menu show-md">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-navicon"></i>
                                حساب کاربری شما
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-right">
                                <a href="profile.blade.php" class="dropdown-item active-menu">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                                <a href="{{route('orders.index')}}" class="dropdown-item">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>

                                <a href="profile-personal-info.html" class="dropdown-item">
                                    <i class="now-ui-icons business_badge"></i>
                                    اطلاعات شخصی
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu hidden-md">
                        <div class="profile-menu-header">حساب کاربری شما</div>
                        <ul class="profile-menu-items">
                            <li>
                                <a href="profile.blade.php" class="active">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="{{route('orders.index')}}">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>
                            </li>
                            <li>
                                <a href="profile-orders-return.html">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    درخواست مرجوعی
                                </a>
                            </li>
                            <li>
                                <a href="profile-favorites.html">
                                    <i class="now-ui-icons ui-2_favourite-28"></i>
                                    لیست علاقمندی ها
                                </a>
                            </li>
                            <li>
                                <a href="profile-personal-info.html">
                                    <i class="now-ui-icons business_badge"></i>
                                    اطلاعات شخصی
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->


        <script>
            @forelse($errors->all() as $error)

                document.addEventListener("DOMContentLoaded",function ($event){
                    swal.fire({
                        title: 'خطا!',
                        icon: 'error',
                        text: '{{$error}}',
                        showConfirmButton: false,
                        width: 300,
                        height: 50
                    })
                });

            @empty

            @endforelse

            @if(session('success'))
            document.addEventListener("DOMContentLoaded",function ($event){
                swal.fire({
                    title: 'موفقیت!',
                    icon: 'success',
                    text: '{{session('success')}}',
                    confirmButtonText: 'OK'
                })
            });
            @endif
        </script>


@endsection
