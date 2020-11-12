@extends('admin_layout')
@section('admin_content')
    <?php
                        $message = Session::get('message');
                            if($message){
                                echo '<span style="width: 100%; color: red;">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
    @foreach($edit_brand_product as $key => $edit_value)
    <form class="form-horizontal" action="{{URL::to('/update-brand-product/'.$edit_value -> brand_id)}}" method="post">
        {{csrf_field()}}
        <fieldset>

            <!-- Form Name -->
            <legend>CẬP NHẬT thương hiệu</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="product_id">Tên thương hiệu</label>
                <div class="col-md-5">
                    <input id="product_id" value="{{$edit_value -> brand_name}}" name="brand_product_name" class="form-control input-md" required="" type="text">

                </div>
            </div>
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="product_description">Mô tả thương hiệu</label>
                <div class="col-md-5">
                    <textarea style="resize: none" rows="6" class="form-control" id="product_description" name="brand_product_desc">{{$edit_value -> brand_desc}}</textarea>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="singlebutton"></label>
                <div class="col-md-5">
                    <button id="singlebutton" name="update_brand_product" class="form-control btn btn-primary">Cập nhật</button>
                </div>
            </div>

        </fieldset>
    </form>
    @endforeach
@endsection
