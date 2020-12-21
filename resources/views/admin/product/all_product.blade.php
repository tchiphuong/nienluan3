@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Xem sản phẩm</p>
            <a href="export-product"><button class="btn excel" name="print_product"><i class="fa fa-file-excel"></i> In DS Excel</button></a>
            <a href="export-pdf"><button class="btn pdf" name="print_product"><i class="fa fa-file-pdf"></i> In DS PDF</button></a>
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
                        if (substr(strstr(url()->full(), '='),1)>1){
                            $a = substr(strstr(url()->full(), '='),1)*20-(20-1);
                        }
                        elseif(substr(strstr(url()->full(), '='),1)<1){
                            $a = 1;
                        }
                        else{
                            $a = 1;
                        }
                        ?>
                        {{substr(strstr(url()->full(), '='),1)}}
                        @foreach($all_product as $key => $pro)
                        <tr>
                            <td data-label="STT">{{$a++}}</td>
                            <td data-label="Tên sản phẩm"><a href="{{ URL::to('/san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a></td>
{{--                            <td data-label="Hình ảnh"><img class="product__image" src="public/uploads/product/{{$pro->product_image}}" alt=""></td>--}}
                            <td data-label="Hình ảnh" style="text-align: center;"><img style="width: 50px;height: 50px; border-radius: 100%; object-fit: cover;" src="public/uploads/product/{{$pro->product_image}}" alt=""></td>
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
                            <td data-label="Xoá" class="right__iconTable"><a href="{{URL::to('/delete-product/'.$pro -> product_id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination__wrapper">
                        <div class="pagination pagination-style-three m-t-20">
                            <?php
                            $next = $all_product->currentPage() + 1;
                            $prev = $all_product->currentPage() - 1;
                            if ($all_product->currentPage()>1)
                            {
                                echo '<a href="all-product?page=1"><i class="fa fa-angle-double-left"></i></a>'."\n";
                                echo "<a ".'href="'."all-product?page=";
                                echo $prev.'"><i class="fa fa-angle-left"></i></a>'."\n";
                            }
                            for ($i = 1; $i <= $all_product->lastPage(); $i++) {

                                if ($i==$all_product->currentPage()){
                                    echo '<a class="selected">'.$i.'</a>'."\n";
                                }
                                else{
                                    echo "<a ".'href="'."all-product?page=".$i.'">';
                                    echo '<span>'.$i.'</span>';
                                    echo "</a>"."\n";
                                }
                            }
                            if ($all_product->currentPage()!=$all_product->lastPage()){
                                echo "<a ".'href="'."all-product?page=";
                                echo $next.'"><i class="fa fa-angle-right"></i></a>'."\n";;
                                echo "<a ".'href="'."all-product?page=";
                                echo $all_product->lastPage().'"><i class="fa fa-angle-double-right"></i></a>'."\n";;
                            }
                            ?>
                        </div>
                    </div>
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
