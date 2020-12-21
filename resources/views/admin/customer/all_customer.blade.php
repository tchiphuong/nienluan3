@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Xem danh mục</p>
            <div class="right__table">
                <div class="right__tableWrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 1;
                        ?>
                        @foreach($all_customer as $key => $value)
                            <tr>
                                <td data-label="STT">{{$a++}}</td>
                                <td data-label="Hình ảnh" style="text-align: center;"><img style="width: 50px;height: 50px; border-radius: 100%; object-fit: cover;" src="assets/profile1.jpg" alt=""></td>
                                <td data-label="Tên">{{$value->customer_name}}</td>
                                <td data-label="Email">{{$value->customer_email}}</td>
                                <td data-label="Số điện thoại">{{$value->customer_phone}}</td>
                                <td data-label="Xoá" class="right__iconTable"><a href="{{URL::to('/delete-category-product/'.$value -> customer_id)}}" name="dalete_category_product" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
