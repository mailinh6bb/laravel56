@extends('layouts.app')

@section('content')
<style type="text/css">
    .actions-log a:hover {
    background: #3f3f3f;
    transition: .3s;
}
</style>
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">Trang Chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Đăng Nhập</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- account-details Area Start -->
<div class="customer-login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <div class="customer-login my-account">
                    <form action="" method="post" class="login">
                        @csrf
                        <div class="form-fields">
                            <h2>Đăng Nhập</h2>
                            <p class="form-row form-row-wide">
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="email" class="input-email" name="email" id="email" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Password <span class="required">*</span></label>
                                <input class="input-text" type="password" name="password" id="password">
                            </p>
                            <div>
                             <p class="lost_password"> <a href="{{ route('get.password') }}"> Lost your password?</a></p>
                         </div>
                     </div>
                     <div class="form-action">
                        <div class="actions-log">
                            <input type="submit" class="button" name="login" value="Đăng Nhập">
                            <a href="{{ route('login.social.redirect.fb', 'facebook') }}" title="" style="    border: 0;
                            background: #c2a376;
                            color: #fff;
                            text-transform: uppercase;
                            padding: 10px 20px;
                            transition: .3s;margin: 10px 20px">Đăng Nhập Bằng Facebook</a>
                        </div>
                        <label for="rememberme" class="inline"> 
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me
                        </label>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
<!-- account-details Area end -->
@endsection
