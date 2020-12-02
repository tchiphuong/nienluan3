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
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá SP</th>
                            <th>Thời gian</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 1;
                        ?>
                        @foreach($all_product as $key => $pro)

                        <tr>
                            <td data-label="STT">{{$a++}}</td>
                            <td data-label="Tên sản phẩm">{{$pro->product_name}}</td>
                            <td data-label="Hình ảnh"><img src="public/uploads/product/{{$pro->product_image}}" alt=""></td>
                            <td data-label="Giá SP">{{$pro->product_price}} ₫</td>
                            <td data-label="Thời gian">dd/mm/yyyy</td>
                            <td data-label="Sửa" class="right__iconTable"><a href="{{URL::to('/edit-product/'.$pro -> product_id)}}"><i class="fa fa-edit"></i></a></td>
                            <td data-label="Xoá" class="right__iconTable"><a href="{{URL::to('/delete-product/'.$pro -> product_id)}}"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
