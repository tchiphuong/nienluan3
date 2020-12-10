@extends('layout')
@section('content')
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact__content">
                        <div class="contact__form">
                            <h5>ĐĂNG KÝ</h5>
                            <form action="{{URL::to('/add-customer')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Họ tên<span>*</span></p>
                                                    <input type="text" name="customer_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Số điện thoại <span>*</span></p>
                                                    <input type="text" name="customer_phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Email <span>*</span></p>
                                                    <input type="text" name="customer_email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Mật khẩu <span>*</span></p>
                                                    <input type="text" name="customer_password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Xác nhận mật khẩu <span>*</span></p>
                                                    <input type="text" name="customer_password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <button type="submit" class="site-btn" style="width: 100%;">Đăng ký</button>
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
