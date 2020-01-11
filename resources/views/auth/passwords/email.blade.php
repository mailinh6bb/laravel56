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
                        <li class="category3"><span>Lấy Lại Mật Khẩu</span></li>
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
                    <form action="" method="POST" class="login">
                        @csrf
                        <div class="form-fields">
                            <h2>Lấy Lại Mật Khẩu</h2>
                            <p class="form-row form-row-wide">
                                <label for="email">Vui lòng nhập Email của bạn.<span class="required">*</span></label>
                                <input type="email" class="input-text" required="" name="email" id="email" value="">
                            </p>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" value="Gởi Email">
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
