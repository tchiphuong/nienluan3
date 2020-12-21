@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Xem đơn hàng</p>
            <div class="right__table">
                <div class="right__tableWrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Thành tiền</th>
                            <th>Ngày</th>
                            <th>Trạng thái</th>
                            <th>Xem chi tiết</th>
                            <th>Cập nhật</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $a = 1;
                        ?>
                        @foreach($all_order as $key => $value)
                            @if($value->order_status=="Đang giao hàng")
                            <tr>
                                <td data-label="STT">{{$a++}}</td>
                                <td data-label="Tên khách hàng">{{$value->shipping_name}}</td>
                                <td data-label="Số điện thoại">{{$value->shipping_phone}}</td>
                                <td data-label="Thành tiền">{{number_format(floatval(str_replace(",","",$value->order_total))) .' '.'đ'}}</td>
                                <td data-label="Ngày"><?php
                                    $date=date_create($value->order_date);
                                    echo date_format($date,"d/m/Y H:i:s");
                                    ?></td>
                                <td data-label="Trạng thái">{{$value->order_status}}</td>
                                <td data-label="Xem chi tiết" class="right__iconTable"><a href="view-order-details/{{$value->order_id}}"><i class="fa fa-info"></i> Chi tiết</a></td>
                                <td data-label="Cập nhật" class="right__iconTable"><a href="{{URL::to('/shipping-order/'.$value -> order_id)}}"><i style="color: #449d44" class="fa fa-shipping-fast"></i> Đã giao hàng</a></td>
{{--                                <td data-label="Phê duyệt" class="right__confirm">--}}
{{--                                    <a href="" class="right__iconTable"><i style="color: #449d44" class="fa fa-check"></i></a>--}}
{{--                                    <a href="" class="right__iconTable"><i style="color: red" class="fa fa-times"></i></a>--}}
{{--                                </td>--}}
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <p class="right__desc">Xem đơn hàng đã giao</p>
            <div class="right__table">
                <div class="right__tableWrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Thành tiền</th>
                            <th>Ngày</th>
                            <th>Trạng thái</th>
                            <th>Xem chi tiết</th>
{{--                            <th>Cập nhật</th>--}}
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $a = 1;
                        ?>
                        @foreach($all_order as $key => $value)
                            @if($value->order_status=="Đã giao hàng")
                            <tr>
                                <td data-label="STT">{{$a++}}</td>
                                <td data-label="Tên khách hàng">{{$value->shipping_name}}</td>
                                <td data-label="Số điện thoại">{{$value->shipping_phone}}</td>
                                <td data-label="Thành tiền">{{number_format(floatval(str_replace(",","",$value->order_total))) .' '.'đ'}}</td>
                            <td data-label="Ngày"><?php
                                        $date=date_create($value->order_date);
                                        echo date_format($date,"d/m/Y H:i:s");
                                        ?></td>
                                <td data-label="Trạng thái">{{$value->order_status}}</td>
                                <td data-label="Xem chi tiết" class="right__iconTable"><a href="view-order-details/{{$value->order_id}}"><i class="fa fa-info"></i> Chi tiết</a></td>
{{--                                <td data-label="Xoá" class="right__iconTable"><a href=""><i style="color: #449d44" class="fa fa-shipping-fast"></i> Đã giao hàng</a></td>--}}
{{--                                <td data-label="Phê duyệt" class="right__confirm">--}}
{{--                                    <a href="" class="right__iconTable"><i style="color: #449d44" class="fa fa-check"></i></a>--}}
{{--                                    <a href="" class="right__iconTable"><i style="color: red" class="fa fa-times"></i></a>--}}
{{--                                </td>--}}
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
