<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
        }
        #customers {
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #126d74;
            color: white;
        }
        img{
            width: 50px;
            height: 50px;
            border-radius: 25px;
            object-fit: cover;
        }
    </style>

</head>
<body>
                    <table id="customers">
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
                                {{--                            <td data-label="Hình ảnh"><img class="product__image" src="public/uploads/product/{{$pro->product_image}}" alt=""></td>--}}
                                <td data-label="Hình ảnh" style="text-align: center;"><img src="<?php echo asset('public/uploads/product/'.$pro->product_image.'') ?>" alt=""></td>
                                <td data-label="Giá SP">{{number_format($pro->product_price) .' '.'đ'}}</td>
                                <td data-label="Giảm giá">{{$pro->product_discount}}%</td>
                                <td data-label="Số lượng">{{$pro->product_quantity}}</td>
                                {{--                            <td data-label="Thương hiệu">{{$pro->brand_name}}</td>--}}
                                {{--                            <td data-label="Danh mục">{{$pro->category_name}}</td>--}}
                                <td data-label="Thời gian cập nhật">{{date_format(date_create($pro->updated_at),"d/m/Y")}}</td>
                                <td data-label="Trạng thái">
                                    @if($pro->product_status == 0)
                                        Đang ẩn
                                    @else
                                        Đang hiển thị
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
</body>
</html>
