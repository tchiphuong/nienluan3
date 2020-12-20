<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phương Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><i class="fa fa-search search-switch"></i></li>
        <li><a href="{{ URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i>
                <div class="tip">2</div>
            </a></li>
        <li><a href="{{ URL::to('/show-cart')}}"><i class="fa fa-user-circle"></i></a>
    </ul>
    <div class="offcanvas__logo">
        <a href="{{ URL::to('/trang-chu')}}"><img src="public/frontend/img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <?php
        $customer_id = Session::get('customer_id');
        if($customer_id!=NULL){
        ?>
        <a href="{{URL::to('/logout-checkout')}}"> Đăng xuất</a>
        <?php
        }else{
        ?>
        <a href="{{URL::to('/dang-nhap')}}">Đăng nhập</a>
        <?php
        }
        ?>
    </div>
</div>

<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2">
                <div class="header__logo">
                    <a href="{{ URL::to('/trang-chu')}}"><img src="public/frontend/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li><a href="{{ URL::to('/trang-chu')}}">Trang chủ</a></li>
                        <li><a href="{{ URL::to('/san-pham')}}">Sản phẩm</a></li>
                        <li><a href="#">Danh mục</a>
                            <ul class="dropdown">
                                @foreach($category as $key => $cate)
                                <li><a href="{{ URL::to('/danh-muc/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#">Thương hiệu</a>
                            <ul class="dropdown">
                                @foreach($brand as $key => $brand)
                                    <li><a href="{{ URL::to('/thuong-hieu/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
{{--                        <li><a href="#">Giảm giá</a></li>--}}
{{--                        <li><a href="#">Mã giảm giá</a></li>--}}
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4">
                <div class="header__right">
                    <ul class="header__right__widget">
                        <div class="header__right__auth text-center">
                            <?php
                            $customer_id = Session::get('customer_id');
                            $customer_name = Session::get('customer_name');
                            if($customer_id!=NULL){
                            if($customer_name){
                            }
                                echo '<li><a href="'.'logout-checkout"'.'><b><i>('.$customer_name.')</i></b>&nbsp;'.'Đăng xuất'.'&nbsp;<i class="fa fa-sign-out"></i></a></li>';
                                Session::put('message_login',null);
                            }else{
                            ?>
                                <li><a href="{{URL::to('/dang-nhap')}}">Đăng nhập <i class="fa fa-sign-in"></i></a></li>
                            <?php
                            }
                            ?>
                        </div>
                        <li><i class="fa fa-search search-switch"></i></li>
                        <li><a href="{{ URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i>
                                <div class="tip">{{Cart::content()->count()}}</div>
                            </a></li>
                        {{--                        <li><a href="{{ URL::to('/show-cart')}}"><i class="fa fa-user-circle"></i></a>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
@yield('cart')
<!-- Product Section Begin -->
@yield('content')
<!-- Product Section End -->

<style>
    .social__hover:hover{
        background: #ca1515;
        color: #ffffff;
    }
</style>

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="footer__widget">
                    <h6>Tài khoản cá nhân</h6><div class="footer__logo">
                        <div class="footer__social">
                            <a href="https://www.facebook.com/tchiphuong" class="social__hover"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.facebook.com/tchiphuong" class="social__hover"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.facebook.com/tchiphuong" class="social__hover"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com/tchiphuong" class="social__hover"><i class="fa fa-weibo"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="footer__widget">
                    <h6>Tài khoản</h6>
                    <ul>
                        <li><a href="#">Thông tin tài khoản</a></li>
                        <li><a href="{{ URL::to('/gio-hang')}}">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="footer__widget">
                    <h6>Liên kết nhanh</h6>
                    <ul>
                        <li><a href="#"><b>Địa chỉ:</b> Số xxx, Võ Thị Sáu, P8, thành phố Bạc Liêu</a></li>
                        <li><a href="#"><b>Số điện thoai:</b> 094 461 59 69</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Tìm kiếm ...">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>

</body>

</html>
