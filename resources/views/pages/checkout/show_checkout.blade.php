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

        <form action="{{url('/save-checkout-customer')}}" class="checkout__form" method="POST" name="myForm" onsubmit="return validateForm()" required>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6 col-sm-12">
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
                                <input type="number" maxlength="10" name="shipping_phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="email" name="shipping_email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Ghi chú <span>*</span></p>
                                <input type="text" placeholder="Ghi chú ..." name="shipping_notes">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Hình thức thanh toán <span>*</span></p>
                                <div  style="line-height: 30px; margin-left: 10px;">
{{--                                    <div class="row text-left">--}}
{{--                                        <input style="height: 20px;" type="radio" id="male" name="payment_method" value="1" class="col-1">--}}
{{--                                        <span class="col-11" style="margin: -5px">Chuyển khoản</span>--}}
{{--                                    </div>--}}
                                    <div class="row text-left">
                                        <input style="height: 20px;" type="radio" id="female" name="payment_method" value="2" class="col-1">
                                        <span class="col-11" style="margin: -5px">Thanh toán khi nhận hàng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<div class="message"><i class="fa fa-check"></i><span> '.$message.'</span></div>';
                            Session::put('message',null);
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="checkout__order">
                        <h5>Chi tiết hóa đơn</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Sản phẩm</span>
                                    <span class="top__text__right">Thành tiền</span>
                                </li>
                                <?php
                                $num=1;
                                $content = Cart::content();
                                ?>
                                @foreach($content as $v_content)
                                        <li>
                                            <a href="san-pham/{{$v_content->id}}" style="color: #0b0b0b;" toll>
                                            @if($num<10)
                                                0{{$num++}}
                                            @else
                                                {{$num++}}
                                            @endif. {{$v_content->name}}
                                            </a><span><?php
                                                    $subtotal = $v_content->price * $v_content->qty;
                                                    echo number_format($subtotal).' '.'đ';
                                                    ?>
                                                </span>
                                        </li>
{{--                                <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>--}}
{{--                                <li>03. Black jean <span>$ 170.0</span></li>--}}
{{--                                <li>04. Cotton shirt <span>$ 110.0</span></li>--}}
                                @endforeach
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Tổng tiền hàng <span>{{substr(Cart::priceTotal(), 0, -3)}} đ</span></li>
                                <li>Phí vận chuyển <span>0 đ</span></li>
{{--                                <li>Đã giảm giá<span>- {{substr(Cart::discount(), 0, -3)}} đ</span></li>--}}
{{--                                <li>Thuế <span>{{substr(Cart::tax(), 0, -3)}} đ</span></li>--}}
                                <li>Tổng thanh toán <span>{{substr(Cart::total(), 0, -3)}} đ</span></li>
                            </ul>
                        </div>

                        <button type="submit" class="site-btn" name="send_order">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
{{--        <div class="container dialog">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="false">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <h2 class="text-center">THANK YOU</h2>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <a type="button" class="site-btn" href="index.html">Về trang chủ</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</section>
<!-- Checkout Section End -->
@endsection
