@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Thêm thương hiệu</p>
            <div class="right__formWrapper">
                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                    {{csrf_field()}}
                    <div class="right__inputWrapper">
                        <label for="title">Tên thương hiệu</label>
                        <input type="text" placeholder="Tiêu đề"  name="brand_product_name">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="desc">Mô tả</label>
                        <textarea id="" cols="30" rows="10" placeholder="Mô tả" name="brand_product_desc"></textarea>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Hiển thị / ẩn</label>
                        <select name="brand_product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="button">
                        <button class="btn insert" type="submit" name="add_brand_product">Thêm</button>
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
@endsection
