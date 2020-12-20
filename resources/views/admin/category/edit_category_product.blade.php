@extends('admin_layout')
@section('admin_content')

    @foreach($edit_category_product as $key => $edit_value)
        <div class="right">
            <div class="right__content">
                <div class="right__title">Bảng điều khiển</div>
                <p class="right__desc">Cập nhật danh mục</p>
                <div class="right__formWrapper">
                    <form role="form" action="{{URL::to('/update-category-product/'.$edit_value -> category_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="right__inputWrapper">
                            <label for="title">Tên danh mục</label>
                            <input type="text" value="{{$edit_value -> category_name}}"  name="category_product_name">
                        </div>
                        <div class="right__inputWrapper">
                            <label for="desc">Mô tả</label>
                            <textarea id="" cols="30" rows="10" name="category_product_desc">{{$edit_value -> category_desc}}</textarea>
                        </div>
                        <div class="button">
                            <button class="btn insert" type="submit" name="update_category_product">Cập nhật</button>
                        </div>
                    </form>
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
    @endforeach
@endsection
