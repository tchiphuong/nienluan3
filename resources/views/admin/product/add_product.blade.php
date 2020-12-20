@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Thêm sản phẩm</p>
            <div class="right__formWrapper">
                <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="right__inputWrapper">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="product_name" placeholder="Tiêu đề">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="product_cate">Danh mục</label>
                        <select name="product_cate">
                            <option disabled selected>Chọn danh mục</option>
                            @foreach($cate_product as $key => $cate)
                                <option value="{{$cate -> category_id}}">{{$cate -> category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="category">Nhãn hiệu</label>
                        <select name="product_brand">
                            <option disabled selected>Chọn nhãn hiệu</option>
                            @foreach($brand_product as $key => $brand)
                                <option value="{{$brand -> brand_id}}">{{$brand -> brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="image">Hình ảnh 1</label>
                        <input type="file" name="image_link_1">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="image">Hình ảnh 2</label>
                        <input type="file" name="image_link_2">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="image">Hình ảnh 3</label>
                        <input type="file" name="image_link_3">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Giá sản phẩm</label>
                        <input type="number" name="product_price" placeholder="Giá sản phẩm">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Giảm giá (%)</label>
                        <input type="number" name="product_discount" placeholder="Giảm giá" min="0" max="100" maxlength="3">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Size</label>
                        <input type="text" name="product_size" placeholder="Size">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Màu</label>
                        <input type="text" name="product_color" placeholder="Màu">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Số lượng</label>
                        <input type="text" name="product_quantity" placeholder="Số lượng">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Hiển thị / ẩn</label>
                        <select name="product_status">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="desc">Mô tả</label>
                        <textarea name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="desc">Nội dung</label>
                        <textarea name="product_content" id="" cols="30" rows="10" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="button">
                        <button class="btn insert" type="submit" name="add_product">Chèn</button>
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
