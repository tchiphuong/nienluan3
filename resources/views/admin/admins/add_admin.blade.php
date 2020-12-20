@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Thêm Admin</p>
            <div class="right__formWrapper">
                <form role="form" action="{{URL::to('/save-admin')}}" method="post">
                    {{csrf_field()}}
                    <div class="right__inputWrapper">
                        <label for="title">Tên tài khoản</label>
                        <input type="text" placeholder="Trần Chí Phương"  name="admin_name" autofocus>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Email</label>
                        <input type="email" placeholder="cphuong219219@gmail.com"  name="admin_email">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Số điện thoại</label>
                        <input type="text" placeholder="0944615969"  name="admin_phone" maxlength="10" minlength="10">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="image">Hình ảnh</label>
                        <input type="file" name="image_link_1">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Mật khẩu</label>
                        <input type="password" placeholder="Mật khẩu"  name="admin_password">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Xác nhận mật khẩu</label>
                        <input type="password" placeholder="Mật khẩu"  name="admin_password2">
                    </div>
                    <div class="button">
                        <button class="btn insert" type="submit" name="add_admin">Thêm</button>
                    </div>
                </form>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<div class="message"><i class="fa fa-check"></i><span> '.$message.'</span></div>';
                    Session::put('message',null);
                }
                ?>
            </div>
        </div>
    </div>
@endsection
