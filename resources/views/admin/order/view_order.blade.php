@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Xem đơn hàng</p>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<div class="message"><i class="fa fa-check"></i><span> '.$message.'</span></div>';
                    Session::put('message',null);
                }
                ?>
            <div class="right__table">
                <p class="right__tableTitle">Đơn hàng mới</p>
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
                            <th>Chấp nhận đơn hàng</th>
                            <th>Hủy đơn hàng</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $a = 1;
                        ?>
                        @foreach($all_order as $key => $value)
                            @if($value->order_status=="Đang chờ xử lý")
                                <tr>
                                    <td data-label="STT">{{$a++}}</td>
                                    <td data-label="Tên khách hàng">{{$value->shipping_name}}</td>
                                    <td data-label="Số điện thoại">{{$value->shipping_phone}}</td>
                                    <td data-label="Thành tiền" style="text-align: right">{{number_format(floatval(str_replace(",","",$value->order_total))) .' '.'đ'}}</td>
                                    <td data-label="Ngày"><?php
                                        $date=date_create($value->order_date);
                                        echo date_format($date,"d/m/Y H:i:s");
                                        ?></td>
                                    <td data-label="Trạng thái">{{$value->order_status}}</td>
                                    <td data-label="Xem chi tiết" class="right__iconTable">
                                        <a href="view-order-details/{{$value->order_id}}"><i class="fa fa-info"></i> Chi tiết</a>
                                    </td>
                                    <td data-label="Chấp nhận đơn hàng" class="right__confirm">
                                        <a href="{{URL::to('/edit-order/'.$value -> order_id)}}" class="right__iconTable"><i style="color: #449d44" class="fa fa-check"></i> Chấp nhận</a>
                                    </td>
                                    <td data-label="Hủy đơn hàng">
                                        <a href="{{URL::to('/delete-order/'.$value -> order_id)}}" class="right__iconTable"><i style="color: red" class="fa fa-times"></i> Hủy</a>
                                    </td>
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
