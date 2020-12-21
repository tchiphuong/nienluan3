<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('public/backend/css/main.css')}}">
    <link href="{{asset('public/backend/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/brands.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/solid.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/reponsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/css/elegant-icons.css')}}" type="text/css">


</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="dashboard">
            <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                <div class="left__content">
                    <div class="left__logo">ADMIN</div>
                    <div class="left__profile">
                        <div class="left__image">
                            <?php
                            $admin_image = Session::get('admin_image');
                            if($admin_image){
                                echo '<img src="public/uploads/admin/'.$admin_image.'" alt="">';
                            }else{
                                echo '<img src="';
                                echo asset('public/uploads/admin/no-image.jpg');
                                echo 'alt="admin_image">';
                            }
                            ?>
                        </div>
                        <p class="left__name">
                            <?php
                            $admin_name = Session::get('admin_name');
                            if($admin_name){
                                echo $admin_name;
                            }
                            ?>
                        </p>
                    </div>
                    <ul class="left__menu">
                        <li class="left__menuItem">
                            <a href="{{URL::to('/dashboard')}}" class="left__title"><img src="{{asset('public/backend/assets/icon-dashboard.svg')}}" alt="">Dashboard</a>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="{{asset('public/backend/assets/icon-tag.svg')}}" alt="">Sản Phẩm<img class="left__iconDown" src="{{asset('public/backend/assets/arrow-down.svg')}}" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="{{URL::to('/add-product')}}">Thêm Sản Phẩm</a>
                                <a class="left__link" href="{{URL::to('/all-product')}}">Xem Sản Phẩm</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="{{asset('public/backend/assets/icon-edit.svg')}}" alt="">Danh Mục SP<img class="left__iconDown" src="{{asset('public/backend/assets/arrow-down.svg')}}" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="{{URL::to('/add-category-product')}}">Thêm Danh Mục</a>
                                <a class="left__link" href="{{URL::to('/all-category-product')}}">Xem Danh Mục</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="{{asset('public/backend/assets/icon-book.svg')}}" alt="">Nhãn hiệu<img class="left__iconDown" src="{{asset('public/backend/assets/arrow-down.svg')}}" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="{{URL::to('/add-brand-product')}}">Thêm Thương hiệu</a>
                                <a class="left__link" href="{{URL::to('/all-brand-product')}}">Xem Thương hiệu</a>
                            </div>
{{--                        </li>--}}
{{--                        <li class="left__menuItem">--}}
{{--                            <div class="left__title"><img src="{{asset('public/backend/assets/icon-settings.svg')}}" alt="">Slide<img class="left__iconDown" src="{{asset('public/backend/assets/arrow-down.svg')}}" alt=""></div>--}}
{{--                            <div class="left__text">--}}
{{--                                <a class="left__link" href="{{URL::to('/insert_slide')}}">Thêm Slide</a>--}}
{{--                                <a class="left__link" href="{{URL::to('/view_slides')}}">Xem Slide</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="left__menuItem">--}}
{{--                            <div class="left__title"><img src="{{asset('public/backend/assets/icon-book.svg')}}" alt="">Coupons<img class="left__iconDown" src="{{asset('public/backend/assets/arrow-down.svg')}}" alt=""></div>--}}
{{--                            <div class="left__text">--}}
{{--                                <a class="left__link" href="{{URL::to('/insert_coupon')}}">Thêm Mã Giảm Giá</a>--}}
{{--                                <a class="left__link" href="{{URL::to('/view_coupons')}}">Xem Mã Giảm Giá</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li class="left__menuItem">
                            <a href="{{URL::to('/view-customer')}}" class="left__title"><img src="{{asset('public/backend/assets/icon-users.svg')}}" alt="">Khách Hàng</a>
                        </li>
{{--                        <li class="left__menuItem">--}}
{{--                            <a href="{{URL::to('/view-order')}}" class="left__title"><img src="{{asset('public/backend/assets/icon-book.svg')}}" alt="">Đơn Đặt Hàng</a>--}}
{{--                        </li>--}}
                        <li class="left__menuItem">
                            <div class="left__title"><img src="{{asset('public/backend/assets/icon-book.svg')}}" alt="">Đơn Đặt Hàng<img class="left__iconDown" src="{{asset('public/backend/assets/arrow-down.svg')}}" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="{{URL::to('/view-order-checked')}}">Đã xử lý</a>
                                <a class="left__link" href="{{URL::to('/view-order')}}">Chưa xử lý</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="{{asset('public/backend/assets/icon-user.svg')}}" alt="">Admin<img class="left__iconDown" src="{{asset('public/backend/assets/arrow-down.svg')}}" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="{{URL::to('/insert-admin')}}">Thêm Admin</a>
                                <a class="left__link" href="{{URL::to('/view-admin')}}">Xem Admins</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <a href="{{URL::to('/logout')}}" class="left__title"><img src="{{asset('public/backend/assets/icon-logout.svg')}}" alt="">Đăng Xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
                @yield('admin_content')
        </div>
    </div>
</div>

<script src="{{asset('public/backend/js/main.js')}}"></script>
</body>
</html>
