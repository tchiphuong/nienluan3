@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Cập nhật sản phẩm</div>
            <div class="right__formWrapper">
                <form action="{{URL::to('/update-product')}}" method="post" enctype="multipart/form-data">
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
                        <input type="file" name="product_image">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Giá sản phẩm</label>
                        <input type="text" name="product_price" placeholder="Giá sản phẩm">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Size</label>
                        <input type="text" name="product_size" placeholder="Giá sản phẩm">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Màu</label>
                        <input type="text" name="product_color" placeholder="Giá sản phẩm">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Hiển thị</label>
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
                    <button class="btn" name="" type="submit">Cập nhật</button>
                    <button class="btn" type="submit">Xem sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
