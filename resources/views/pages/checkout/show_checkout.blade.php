@extends('layout')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ URL::to('/trang-chu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Thông tin hóa đơn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click--}}
{{--                    here to enter your code.</h6>--}}
{{--            </div>--}}
{{--        </div>--}}
        <form action="{{url('/save-checkout-customer')}}" class="checkout__form" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-8">
                    <h5>Thông tin hóa đơn</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Tên người nhận <span>*</span></p>
                                <input type="text" name="shipping_name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Địa chỉ nhận hàng <span>*</span></p>
                                <input type="text" placeholder="Số nhà, tên đường, ..." name="shipping_address">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="checkout__form__input">
                                <p>Phone <span>*</span></p>
                                <input type="text" name="shipping_phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="text" name="shipping_email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Ghi chú <span>*</span></p>
                                <input type="text" placeholder="Ghi chú ..." name="shipping_notes">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Chi tiết hóa đơn</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Sản phẩm</span>
                                    <span class="top__text__right">Thành tiền</span>
                                </li>
                                <li>01. Chain buck bag <span>$ 300.0</span></li>
                                <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                <li>03. Black jean <span>$ 170.0</span></li>
                                <li>04. Cotton shirt <span>$ 110.0</span></li>
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Tổng tiền hàng <span>$ 750.0</span></li>
                                <li>Tổng thanh toán <span>$ 750.0</span></li>
                            </ul>
                        </div>
                        <button type="submit" class="site-btn" name="send_order">Xác nhận đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
