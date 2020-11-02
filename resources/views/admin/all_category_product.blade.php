@extends('admin_layout')
@section('admin_content')
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">--}}
{{--    <legend>TẤT CẢ DANH MỤC</legend>--}}
{{--    <div class="container">--}}
{{--        <div class="table-responsive">--}}
{{--        <table class="table">--}}
{{--            <thead class="thead-dark">--}}
{{--            <a href="{{URL::to('/add-category-product')}}" class="btn btn-primary btn-xs pull-right"><b>+</b> Thêm mới</a>--}}
{{--            <tr>--}}
{{--                <th scope="col">Tên danh mục</th>--}}
{{--                <th scope="col">Hiển thị / Ẩn</th>--}}
{{--                <th scope="col" class="text-center">Hành động</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            @foreach($all_category_product as $key => $cate_pro)--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    {{$cate_pro->category_name}}--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <span class="text-ellipsis">--}}
{{--                        @if($cate_pro->category_status == 0)--}}
{{--                            <a href="{{URL::to('/show-category-product/'.$cate_pro -> category_id)}}">--}}
{{--                                <i class="fa fa-eye-slash" style="color: red"></i>--}}
{{--                                <span class="glyphicon glyphicon-edit"></span> Chỉnh sửa--}}
{{--                            </a>--}}
{{--                        @else--}}
{{--                            <a href="{{URL::to('/hide-category-product/'.$cate_pro -> category_id)}}">--}}
{{--                                <i class="fa fa-eye" style="color: black"></i>--}}
{{--                            </a>--}}
{{--                        @endif--}}
{{--                    </span>--}}
{{--                </td>--}}
{{--                <td class="text-center">--}}
{{--                    <a class='btn btn-info btn-xs' href="{{URL::to('/edit-category-product/'.$cate_pro -> category_id)}}" name="edit_category_product">--}}
{{--                        <span class="glyphicon glyphicon-edit"></span> Chỉnh sửa--}}
{{--                    </a>--}}
{{--                    <a class="btn btn-danger btn-xs" href="{{URL::to('/delete-category-product/'.$cate_pro -> category_id)}}" name="dalete_category_product">--}}
{{--                        <span class="glyphicon glyphicon-remove"></span> Xóa--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}
{{--    </div>--}}
{{--    </div>--}}

    <div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tất cả danh mục sản phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Tên danh mục</th>
                    <th>Hiển thị</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_category_product as $key => $cate_pro)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>
                        {{$cate_pro->category_name}}
                    </td>
                    <td>
                        <span class="text-ellipsis">
                            @if($cate_pro->category_status == 0)
                                <a href="{{URL::to('/show-category-product/'.$cate_pro -> category_id)}}"><i class="fa fa-eye-slash" style="color: red"></i></a>
                            @else
                                <a href="{{URL::to('/hide-category-product/'.$cate_pro -> category_id)}}"><i class="fa fa-eye" style="color: black"></i></a>
                            @endif
                        </span>
                    </td>

                    <td>
                        <a href="{{URL::to('/edit-category-product/'.$cate_pro -> category_id)}}" name="edit_category_product" class="active" ui-toggle-class=""><i class="fa fa-pencil text-success text-active"></i></a>
                        <a href="{{URL::to('/delete-category-product/'.$cate_pro -> category_id)}}" name="dalete_category_product" class="active" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash text-danger text"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection
