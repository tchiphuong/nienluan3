@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Chi tiết đơn hàng</p>
            <div class="right__table">
                <div class="right__tableWrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>STT<br><sup>1</sup></th>
                            <th>Tên sản phẩm<br><sup>2</sup></th>
                            <th>Số lượng<br><sup>3</sup></th>
                            <th>Thành tiền<br><sup>4 = 2 x 3</sup></th>
                            {{--                            <th>Ngày</th>--}}
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $a = 1;
                        $ids=0;
                        ?>
                        @foreach($all_order_details as $key => $value)
                            @foreach($all_order_details as $key => $id)
                                @if($ids)

                                @else
                                    <a href="{{URL::to('export-order/').$ids=$id->order_id}}"><button class="btn pdf" name="print_product"><i class="fa fa-file-pdf"></i> In hóa đơn</button></a>

                                        <h3>Ngày mua hàng: {{$id->order_date}}</h3>
                                        <h3>Tên khách hàng: {{$id->shipping_name}}</h3>
                                        <h3>Địa chỉ: {{$id->shipping_address}}</h3>
                                        <h3>Số điện thoại: {{$id->shipping_phone}}</h3>
                                @endif
                            @endforeach
                                <tr>
                                    <td data-label="STT">{{$a++}}</td>
                                    <td data-label="Tên sản phẩm" style="text-align: left">{{$value->product_name}}</td>
                                    <td data-label="Số lượng">{{$value->product_sales_quantity}}</td>
                                    <td data-label="Thành tiền">{{number_format(floatval($value->product_price)*$value->product_sales_quantity) .' '.'đ'}}</td>
                                </tr>
                        @endforeach
{{--                            <tr>--}}
{{--                                <td colspan="3" style="text-align: right !important; font-weight: bold">Tổng: </td>--}}
{{--                                <td style="font-weight: bold;">{{number_format(floatval(str_replace(",","",$value->order_total))) .' '.'đ'}}</td>--}}
{{--                                <td style="font-weight: bold;">{{$value->order_total}} đ</td>--}}
{{--                            </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
