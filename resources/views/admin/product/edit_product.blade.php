@extends('admin_layout')
@section('admin_content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Bảng điều khiển</div>
            <p class="right__desc">Cập nhật sản phẩm</p>
            <div class="right__formWrapper">
                @foreach($edit_product as $key => $pro)
                <form action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="right__inputWrapper">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="product_name" value="{{$pro->product_name}}">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="product_cate">Danh mục</label>
                        <select name="product_cate">
                            <option disabled selected>Chọn danh mục</option>
                            @foreach($cate_product as $key => $cate)
                                @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="category">Nhãn hiệu</label>
                        <select name="product_brand">
                            <option disabled selected>Chọn nhãn hiệu</option>
                            @foreach($brand_product as $key => $brand)
                                @if($brand->brand_id==$pro->brand_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="image">Hình ảnh 1</label>
                        <input type="file" name="image_link_1">
                    </div>
                    <div class="right__inputWrapper">
                        <img class="product__image" src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="image">Hình ảnh 2</label>
                        <input type="file" name="image_link_2">
                    </div>
                    <div class="right__inputWrapper">
                        <img class="product__image" src="{{URL::to('public/uploads/product/'.$pro->product_image2)}}" alt="">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="image">Hình ảnh 3</label>
                        <input type="file" name="image_link_3">
                    </div>
                    <div class="right__inputWrapper">
                        <img class="product__image" src="{{URL::to('public/uploads/product/'.$pro->product_image3)}}" alt="">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Giá sản phẩm</label>
                        <input type="text" name="product_price" value="{{$pro->product_price}}">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Giảm giá (%)</label>
                        <input type="number" name="product_discount" value="{{$pro->product_discount}}" min="0" max="100" maxlength="3">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Size</label>
                        <input type="text" name="product_size" value="{{$pro->product_size}}">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Màu</label>
                        <input type="text" name="product_color" value="{{$pro->product_color}}">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Số lượng</label>
                        <input type="text" name="product_quantity"  value="{{$pro->product_quantity}}">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="desc">Mô tả</label>
                        <textarea name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả">{{$pro->product_desc}}</textarea>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="desc">Nội dung</label>
                        <textarea name="product_content" id="" cols="30" rows="10" placeholder="Nội dung">{{$pro->product_content}}</textarea>
                    </div>
                    <div class="button">
                        <button class="btn insert" type="submit" name="add_product">Cập nhật</button>
                    </div>
                </form>
                @endforeach
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
