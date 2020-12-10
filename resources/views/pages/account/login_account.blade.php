@extends('layout')
@section('content')
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact__content">
                        <div class="contact__form">
                            <h5>ĐĂNG NHẬP</h5>
                            <form action="{{URL::to('/login-customer')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Email <span>*</span></p>
                                                    <input type="text" name="email_account">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Mật khẩu <span>*</span></p>
                                                    <input type="text" name="password_account">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <button type="submit" class="site-btn" style="width: 100%;">Đăng nhập</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection
