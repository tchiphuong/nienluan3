@extends('layout')
@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="third-slide" src="public/frontend/img/banner/banner-1.jpg">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem chi tiết</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="public/frontend/img/banner/banner-2.jpg">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem ngay</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="public/frontend/img/banner/banner-3.jpg">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Sản phẩm mới</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Tất cả</li>
                    <li data-filter=".women">Nữ</li>
                    <li data-filter=".men">Nam</li>
                    <li data-filter=".kid">Trẻ em</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($product as $key => $pro)

            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg img-fluid" data-setbg="public/uploads/product/{{$pro->product_image}}">
                        @if($pro->product_discount>0)
                            <div class="label sale">
                                Giảm giá
                            </div>
                        @elseif($pro->product_quantity==0)
                            <div class="label stockout">
                                Hết hàng
                            </div>
                        @elseif(floor(abs(strtotime(date_format(date_create($pro->updated_at),"d/m/Y")) - strtotime(date_format(date_create($now),"d/m/Y"))) / (60*60*24))<10)
                            <div class="label new">
                                Mới
                            </div>
                        @endif
                        <ul class="product__hover">
                            <li><a href="public/uploads/product/{{$pro->product_image}}" class="image-popup"><span class="arrow_expand"></span></a></li>
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
                        @if($pro->product_discount==0)
                            <div class="product__price">{{number_format($pro->product_price).' '.'đ'}}</div>
                        @else
                            <div class="product__price">{{number_format($pro->product_price-$pro->product_price*$pro->product_discount/100).' '.'đ'}} <span>{{number_format($pro->product_price).' '.'đ'}}</span></div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
                <div class="col-lg-12 text-center">
                    <a class="btn btn-lg btn-danger" href="{{ URL::to('/san-pham')}}" role="button" ><h6 class="text-white">Xem tất cả sản phẩm</h6></a>
                </div>
        </div>
    </div>
</section>
@endsection
