@extends('layout')
@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ URL::to('/trang-chu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        @foreach($category_name as $key => $name)
                            <span>{{$name->category_name}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <a href="#"><h4>Danh mục</h4></a>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    @foreach($category as $key => $cate)
                                    <div class="card">
                                        <div class="card-text">
                                            <a class="text-dark" href="{{ URL::to('/danh-muc/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @foreach($category_by_id as $key => $pro)
                            <div class="col-md-4 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg img-fluid" data-setbg="{{asset('public/uploads/product/'.$pro->product_image)}}">
                                        <div class="label new">Mới</div>
                                        <ul class="product__hover">
                                            <li><a href="{{asset('public/uploads/product/'.$pro->product_image)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="{{ URL::to('/save-cart/'.$pro->product_id)}}"><span class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{ URL::to('/san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a></h6>
                                        <div class="rating">
                                            <?php
                                            $star = rand(1,5);
                                            switch ($star){
                                                case "1":
                                                    echo '<i class="fa fa-star"></i>';
                                                    break;
                                                case "2":
                                                    echo '<i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>';
                                                    break;
                                                case "3":
                                                    echo '<i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>';
                                                    break;
                                                case "4":
                                                    echo '<i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>';
                                                    break;
                                                default:
                                                    echo '<i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>';
                                            }
                                            ?>
                                        </div>
                                        <div class="product__price">{{number_format($pro->product_price).' '.'đ'}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection
