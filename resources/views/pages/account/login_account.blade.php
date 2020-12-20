@extends('layout')
@section('content')
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact__content">
                        <div class="contact__form">
                            <h5>ĐĂNG NHẬP</h5>
                            <form action="{{URL::to('/login-customer')}}" method="POST" class="checkout__form" name="myForm">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Email <span>*</span></p>
                                                    <input type="email" name="email_account">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__input">
                                                    <p>Mật khẩu <span>*</span></p>
                                                    <input type="password" name="password_account">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__checkbox">
                                                    <label for="note">
                                                        Nhớ mật khẩu
                                                        <input type="checkbox" id="note">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="checkout__form__checkbox">
                                                    <?php
                                                    $message_login = Session::get('message_login');
                                                    if($message_login){
                                                        echo '<p class="message"><i class="fa fa-times"></i><span> '.$message_login.'</span></p>';
                                                        Session::put('message_login',null);
                                                    }
                                                    ?>
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
                <div class="col-lg-4">
                    <div class="contact__content">
                        <div class="contact__form">
                            <div class="cart__total__procced">
                                <h5>BẠN CHƯA CÓ TÀI KHOẢN</h5>
                                <p>Đăng ký tài khoản ngay để có thể mua hàng nhanh chóng và dễ dàng hơn ! Ngoài ra còn có rất nhiều chính sách và ưu đãi cho các thành viên</p>
                            <a class="primary-btn" href="dang-ky">Đăng ký ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
