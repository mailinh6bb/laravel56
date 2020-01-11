@extends('layouts.app')

@section('content')
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
                        <li class="category3"><span>Đăng Ký</span></li>
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
               @if ($errors->has('email'))
               <div class="alert alert-danger" >
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    <br>
                    <strong>{{ $errors->first('password') }}</strong>
                    <br>
                     <strong>{{ $errors->first('rePassword') }}</strong>
                </span>
            </div>
            @endif
            <div class="customer-register my-account">
                <form action="" method="post" class="register">
                    @csrf
                    <div class="form-fields">
                        <h2>Đăng Ký</h2>
                        <p class="form-row form-row-wide">
                            <label for="reg_name">Họ Tên <span class="required">*</span></label>
                            <input type="text" class="input-text" required="" name="name" id="reg_name" value="">
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="reg_email">Email <span class="required">*</span></label>
                            <input type="email" class="input-email" required="" name="email" id="reg_email" value="">
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="reg_phone">Số Điện Thoại <span class="required">*</span></label>
                            <input type="number" class="input-text" name="phone" id="reg_phone">
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="reg_password">Mật Khẩu<span class="required">*</span></label>
                            <input type="password" class="input-text" name="password" id="reg_password">
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="reg_repassword">Nhập Lại Mật Khẩu<span class="required">*</span></label>
                            <input type="password" class="input-text" name="rePassword" id="reg_repassword">
                        </p>
                    </div>
                    <div class="form-action">
                        <div class="actions-log">
                            <input type="submit" class="button" name="register" value="Đăng Ký">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- account-details Area end -->
@endsection
