<!DOCTYPE html>
<html lang="en">
<head>
    <title>Phuong Shop Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link rel="icon" type="image/png" href="{{asset('public/backend/images/icons/favicon.ico')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/main.css')}}">
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form class="login100-form validate-form" action="{{URL::to('/admin-dashboard')}}" method="post">
                {{ csrf_field() }}
					<span class="login100-form-title p-b-33 font-weight-bold">
						Đăng nhập
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="admin_email" placeholder="Email">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input m-t-20" data-validate="Password is required">
                    <input class="input100" type="password" name="admin_password" placeholder="Mật khẩu">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn bg-gradient-primary" name="login" type="submit">
                        Đăng nhập ngay
                    </button>
                </div>

                <div class="text-center p-t-45 p-b-4">
                    <?php
                    $message = Session::get('messages');
                    if($message){
                        echo '<i class="fa fa-times" style="color: red" ></i><span class="txt1" style="color: red">'.$message.'</span>';
                        Session::put('messages',null);
                    }
                    ?>
                </div>

{{--                <div class="text-center">--}}
{{--						<span class="txt1">--}}
{{--							Tạo tài khoản mới?--}}
{{--						</span>--}}

{{--                    <a href="#" class="txt2 hov1">--}}
{{--                        Đăng ký--}}
{{--                    </a>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>
</div>

<script src="{{asset('public/backend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/backend/vendor/animsition/js/animsition.min.j')}}s"></script>
<script src="{{asset('public/backend/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('public/backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('public/backend/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('public/backend/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('public/backend/vendor/countdowntime/countdowntime.js')}}"></script>
<script src="{{asset('public/backend/js/main.js')}}"></script>

</body>
</html>
