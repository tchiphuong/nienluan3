@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Xem thương hiệu</p>
            <div class="right__table">
                <div class="right__tableWrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Trạng thái</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 1;
                        ?>
                        @foreach($all_brand_product as $key => $cate_pro)
                            <tr>
                                <td data-label="STT">{{$a++}}</td>
                                <td data-label="Tiêu đề">{{$cate_pro->brand_name}}</td>
                                <td data-label="Trạng thái">
                                    @if($cate_pro->brand_status == 0)
                                        <a href="{{URL::to('/show-brand-product/'.$cate_pro -> brand_id)}}"><i class="fa fa-eye-slash" style="color: red"></i> Đang ẩn</a>
                                    @else
                                        <a href="{{URL::to('/hide-brand-product/'.$cate_pro -> brand_id)}}"><i class="fa fa-eye" style="color: black"></i> Đang hiển thị</a>
                                    @endif
                                </td>
                                <td data-label="Sửa" class="right__iconTable"><a href="{{URL::to('/edit-brand-product/'.$cate_pro -> brand_id)}}" name="edit_category_product"><i class="fa fa-edit"></i></a></td>
                                <td data-label="Xoá" class="right__iconTable"><a href="{{URL::to('/delete-brand-product/'.$cate_pro -> brand_id)}}" name="dalete_category_product" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a></td>
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
