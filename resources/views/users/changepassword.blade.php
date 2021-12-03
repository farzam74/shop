@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                @forelse($errors->all() as $error)
                    <x-alert name="danger" message="{{$error}}"/>
                @empty

                @endforelse

                @if(session('message'))
                    <x-alert name="success" message="{{session('message')}}" />
                @endif
                <div class="account-box">
                    <a href="#" class="logo">
                        <img src="assets/img/logo.png" alt="">
                    </a>
                    <div class="account-box-title">تغییر رمز عبور</div>
                    <div class="account-box-content">
                        <form class="form-account" action="{{route('profile.changepassword.store')}}" method='post'>
                            @csrf
                            @method('PATCH')
                            <div class="form-account-title">رمز عبور قبلی</div>
                            <div class="form-account-row">
                                <label class="input-label"><i
                                        class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field" type="password"
                                       placeholder="رمز عبور قبلی خود را وارد نمایید" name="oldpassword">
                            </div>
                            <div class="form-account-title">رمز عبور جدید</div>
                            <div class="form-account-row">
                                <label class="input-label"><i
                                        class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field" type="password"
                                       placeholder="رمز عبور جدید خود را وارد نمایید" name="newpassword">
                            </div>
                            <div class="form-account-title">تکرار رمز عبور جدید</div>
                            <div class="form-account-row">
                                <label class="input-label"><i
                                        class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field" type="password"
                                       placeholder="رمز عبور جدید خود را مجددا وارد نمایید" name="renewpassword">
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info" type="submit">
                                        تغییر رمز عبور
                                        <i class="now-ui-icons arrows-1_refresh-69"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
