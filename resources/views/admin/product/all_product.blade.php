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
                            <th>Giá sản phẩm</th>
                            <th>Giảm giá</th>
                            <th>Số lượng</th>
{{--                            <th>Thương hiệu</th>--}}
{{--                            <th>Danh mục</th>--}}
                            <th>Thời gian cập nhật</th>
                            <th>Trạng thái</th>
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
                            <td data-label="Hình ảnh"><img class="product__image" src="public/uploads/product/{{$pro->product_image}}" alt=""></td>
                            <td data-label="Giá SP">{{number_format($pro->product_price) .' '.'đ'}}</td>
                            <td data-label="Giảm giá">{{$pro->product_discount}}%</td>
                            <td data-label="Số lượng">{{$pro->product_quantity}}</td>
{{--                            <td data-label="Thương hiệu">{{$pro->brand_name}}</td>--}}
{{--                            <td data-label="Danh mục">{{$pro->category_name}}</td>--}}
                            <td data-label="Thời gian cập nhật">{{date_format(date_create($pro->updated_at),"d/m/Y")}}</td>
                            <td data-label="Trạng thái">
                                @if($pro->product_status == 0)
                                    <a href="{{URL::to('/show-product/'.$pro -> product_id)}}"><i class="fa fa-eye-slash" style="color: red"></i> Đang ẩn</a>
                                @else
                                    <a href="{{URL::to('/hide-product/'.$pro -> product_id)}}"><i class="fa fa-eye" style="color: black"></i> Đang hiển thị</a>
                                @endif
                            </td>
                            <td data-label="Sửa" class="right__iconTable"><a href="{{URL::to('/edit-product/'.$pro -> product_id)}}"><i class="fa fa-edit"></i></a></td>
                            <td data-label="Xoá" class="right__iconTable"><a href="{{URL::to('/delete-product/'.$pro -> product_id)}}"><i class="fa fa-trash"></i></a></td>
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
