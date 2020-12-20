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
                        @foreach($all_category_product as $key => $cate_pro)
                            <tr>
                                <td data-label="STT">{{$a++}}</td>
                                <td data-label="Tiêu đề">{{$cate_pro->category_name}}</td>
                                <td data-label="Trạng thái">
                                    @if($cate_pro->category_status == 0)
                                        <a href="{{URL::to('/show-category-product/'.$cate_pro -> category_id)}}"><i class="fa fa-eye-slash" style="color: red"></i> Đang ẩn</a>
                                    @else
                                        <a href="{{URL::to('/hide-category-product/'.$cate_pro -> category_id)}}"><i class="fa fa-eye" style="color: black"></i> Đang hiển thị</a>
                                    @endif
                                </td>
                                <td data-label="Sửa" class="right__iconTable"><a href="{{URL::to('/edit-category-product/'.$cate_pro -> category_id)}}" name="edit_category_product"><i class="fa fa-edit"></i></a></td>
                                <td data-label="Xoá" class="right__iconTable"><a href="{{URL::to('/delete-category-product/'.$cate_pro -> category_id)}}" name="dalete_category_product" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
