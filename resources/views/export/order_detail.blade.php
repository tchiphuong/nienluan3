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
            background-color: deeppink;
            color: #181818;
        }
        img{
            width: 50px;height: 50px;
            border-radius: 100%;
            object-fit: cover;
        }
    </style>

</head>
<body>
<h1 style="text-align: center">HÓA ĐƠN BÁN HÀNG</h1>
<table id="customers">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $a = 1;
    ?>
    @foreach($all_order as $key => $value)
        <tr>
            <td data-label="STT" style="text-align: center">{{$a++}}</td>
            <td data-label="Tên sản phẩm" style="text-align: left">{{$value->product_name}}</td>
            <td data-label="Số lượng" style="text-align: center">{{$value->product_sales_quantity}}</td>
            <td data-label="Thành tiền" style="text-align: right">{{number_format(floatval($value->product_price)*$value->product_sales_quantity) .' '.'đ'}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" data-label="Số lượng" style="text-align: right">Thanh toán</td>
        <td data-label="Thành tiền">{{number_format(floatval(str_replace(",","",$value->order_total))    ) .' '.'đ'}}</td>
{{--        <td data-label="Thành tiền">{{number_format(floatval($value->product_price)*$value->product_sales_quantity) .' '.'đ'}}</td>--}}
    </tr>
    </tbody>
</table>
<h3>Ngày mua hàng: {{$value->order_date}}</h3>
<h3>Tên khách hàng: {{$value->shipping_name}}</h3>
<h3>Địa chỉ nhận hàng: {{$value->shipping_address}}</h3>
<h3>Số điện thoại: {{$value->shipping_phone}}</h3>
</body>
</html>
