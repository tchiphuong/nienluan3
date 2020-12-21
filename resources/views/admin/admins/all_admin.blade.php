@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Xem sản phẩm</p>
            <div class="right__table">
                <div class="right__tableWrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 1;
                        ?>
                        @foreach($all_admin as $key => $admin)
                            <tr>
                                <td data-label="STT">{{$a++}}</td>
                                <td data-label="Tên sản phẩm">{{$admin->admin_name}}</td>
                                <td data-label="Email">{{$admin->admin_email}}</td>
                                <td data-label="Số điện thoại">{{$admin->admin_phone}}</td>
                                <td data-label="Hình ảnh" style="text-align: center;"><img style="width: 50px;height: 50px; border-radius: 100%; object-fit: cover;" src="public/uploads/product/{{$admin->admin_image}}" alt=""></td>
                                <td data-label="Sửa" class="right__iconTable"><a href="{{URL::to('/edit-admin/'.$admin -> admin_id)}}"><i class="fa fa-edit"></i></a></td>
                                <td data-label="Xoá" class="right__iconTable"><a href="{{URL::to('/delete-admin/'.$admin -> admin_id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    </div>
@endsection
