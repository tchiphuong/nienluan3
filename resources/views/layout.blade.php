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

    <div class="flex">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded mr-2" alt="...">
                <strong class="mr-auto">Bootstrap</strong>
                <small class="text-muted">11 mins ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>

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
        <li>
            <a href="#"><i class="fa fa-envelope"></i>
                <div class="tip">2</div>
            </a>
        </li>
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
{{--<header class="header" style="position: fixed; top: 0; z-index: 100; width: 100%;">--}}
<header class="header fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2">
                <div class="header__logo">
                    <a href="{{ URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
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
            <div class="col-lg-3">
                <div class="header__right">
                    <ul class="header__right__widget">

                        <li><img class="search-switch" src="{{asset('public/frontend/assets/search.svg')}}" height="20px" alt=""></li>
{{--                        <li><a href="{{ URL::to('/show-cart')}}"><img src="{{asset('public/frontend/assets/cart.svg')}}" height="20px" alt="">--}}
                        <li><a onclick="cart()"><img src="{{asset('public/frontend/assets/cart.svg')}}" height="20px" alt="">
                                <div class="tip">{{Cart::content()->count()}}</div>
                            </a>
                        </li>
                        <ul class="shadow p-2 bg-white rounded dropdown" id="ca" style="position: absolute; display: none; right: 20px" >
                            <div class="text-left">
                                <?php
                                $content = Cart::content();
                                ?>
                                    <div class=" rounded">
                                        <li class="row">
                                            <span class="col-4">
                                                Danh sách mặt hàng
                                            </span>
                                        </li>
                                    </div>
                                @foreach($content as $v_content)
                                    <div class="drop__item rounded-pill">
                                        <li class=" row">
                                            <span class="col-1">
                                                <img width="50px" height="50px" style="object-fit: cover; border-radius: 50%;" src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="">
                                            </span>
                                            <span class="col-11">
{{--                                                <a href="san-pham/{{$v_content->id}}" style="color: #0b0b0b;">{{$v_content->name}} <b>x {{$v_content->qty}}</b></a>--}}
                                                <a href="san-pham/{{$v_content->id}}" style="color: #0b0b0b;">{{mb_strimwidth($v_content->name, 0, 29, "...")}} <b>x {{$v_content->qty}}</b></a>
                                            </span>
                                        </li>
                                    </div>
                                    @endforeach
                                    <div class="text-center m-4">
                                        <a class="btn btn-danger rounded-pill text-uppercase" href="{{ URL::to('/show-cart')}}">Xem chi tiết giỏ hàng</a>
                                    </div>
                            </div>
                        </ul>
                        <li>
                            <a onclick="noty()">
                                <img src="{{asset('public/frontend/assets/inbox.svg')}}" height="20px" alt="">
                                <div class="tip">0</div>
                            </a>
                        </li>
                        <ul class="shadow p-2 bg-white rounded dropdown" id="myDIV" style="position: absolute; display: none; right: 20px" >
                            <div class="text-left">
                                <div class="drop__item rounded">
                                    <li class="row" style="padding: 0 20px;">
                                        <span><b><a href="">Sản phẩm</a></b> đã được thay đổi giá</span>
                                        <p class="p-0">1 phút trước</p>
                                    </li>
                                </div>
                                <div class="drop__item rounded">
                                    <li class="row" style="padding: 0 20px;">
                                        <span><b><a href="">Sản phẩm</a></b> đã hết hàng</span>
                                        <p class="p-0">1 phút trước</p>
                                    </li>
                                </div>
                                <div class="drop__item rounded">
                                    <li class="row" style="padding: 0 20px;">
                                        <span><b><a href="">Sản phẩm</a></b> đã hết hạn khuyến mãi</span>
                                        <p class="p-0">1 phút trước</p>
                                    </li>
                                </div>
                            </div>
                        </ul>
                        <li>
                            <a onclick="login()">
                                <i class="fa fa-ac"></i>
{{--                                <img src="{{asset('public/frontend/assets/user.svg')}}" height="20px" alt="">--}}
                                <img style="width: 31px;height: 31px; border-radius: 100%; object-fit: cover;" src="https://ragus.vn/wp-content/uploads/2019/07/Yua-Mikami-3.jpg" alt="">
                                @if($customer_id)
                                <span>{{Session::get('customer_name')}}</span>
                                @endif
                            </a>
                        </li>
                        <ul class="shadow p-2 bg-white rounded dropdown" id="lg" style="position: absolute; display: none; right: 20px" >
                            <div class="text-left">
                            <?php
                            $customer_id = Session::get('customer_id');
                            $customer_name = Session::get('customer_name');
                            ?>

                            @if($customer_id)
                                    <div class="drop__item rounded">
                                        <li class=" row">
                                            <i class="fa fa-info col-1 text-center"></i>
                                            <a href="logout-checkout" class="col-11"> Thông tin tài khoản</a>
                                        </li>
                                    </div>
                                    <div class="drop__item rounded">
                                            <li class="row">
                                                <i class="fa fa-sign-out col-1 text-center"></i>
                                                <a href="logout-checkout" class="col-11"> Đăng xuất</a>
                                            </li>
                                        </div>
                                @else
                                    <div class="drop__item rounded">
                                        <li class="row">
                                            <i class="fa fa-sign-in col-1 text-center"></i>
                                            <a href="dang-nhap" class="col-11"> Đăng nhập</a>
                                        </li>
                                    </div>
                                @endif
                            </div>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<section>
{{--<section style="margin-top: 84px;">--}}
<!-- Header Section End -->
@yield('cart')
<!-- Product Section Begin -->
@yield('content')
<!-- Product Section End -->
</section>
<style>
    .social__hover:hover{
        background: #ca1515;
        color: #ffffff;
    }
    .drop__item{
        padding: 5px 8px;
    }
    .drop__item:hover{
        background: lightcoral;
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
                        <li><a href="{{ URL::to('/show-cart')}}">Giỏ hàng</a></li>
                        <li><a href="{{ URL::to('/san-pham')}}">Tất cả sản phẩm</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="footer__widget">
                    <h6>Liên kết nhanh</h6>
                    <ul>
                        <li><a href="#"><b>Địa chỉ:</b> Số 178, Võ Thị Sáu, P8, thành phố Bạc Liêu</a></li>
                        <li><a href="tel:+84944615969"><b>Số điện thoai:</b> 094 461 59 69</a></li>
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
        <form class="search-model-form" action="{{URL::to('/tim-kiem')}}" method="POST">
            {{csrf_field()}}
            <input type="text" id="search-input" placeholder="Tìm kiếm ..." name="keywords_submit" autofocus>
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
<script>
    function noty() {
        var x = document.getElementById("myDIV");
        var y = document.getElementById("lg");
        var z = document.getElementById("ca");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function login() {
        var x = document.getElementById("lg");
        var y = document.getElementById("myDIV");
        var z = document.getElementById("ca");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function cart() {
        var x = document.getElementById("lg");
        var y = document.getElementById("myDIV");
        var z = document.getElementById("ca");
        if (z.style.display === "none") {
            z.style.display = "block";
            y.style.display = "none";
            x.style.display = "none";
        } else {
            z.style.display = "none";
        }
    }
</script>
<script>
    var mouse_is_inside = false;

    $(document).ready(function()
    {
        $("body").mouseup(function(){
            if(! mouse_is_inside) $('#myDIV').hide();
            if(! mouse_is_inside) $('#lg').hide();
            if(! mouse_is_inside) $('#ca').hide();
        });
    });
</script>
</body>

</html>
