@extends('layout')
@section('content')
    @foreach($details_product as $key => $value)
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ URL::to('/trang-chu')}}"><i class="fa fa-home"></i> Home</a>
                            <a href="{{ URL::to('/danh-muc/'.$value->category_id)}}">{{$value->category_name}}</a>
                        <span>{{$value->product_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" style="width: 125px;height: 170px; object-fit: cover; " alt=""/>
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="{{URL::to('/public/uploads/product/'.$value->product_image2)}}" style="width: 125px;height: 170px; object-fit: cover; " alt=""/>
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="{{URL::to('/public/uploads/product/'.$value->product_image3)}}" style="width: 125px;height: 170px; object-fit: cover; " alt=""/>
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" style="width: 415px;height: 550px; border-radius: 1px; object-fit: cover; " alt="">
                                <img data-hash="product-2" class="product__big__img" src="{{URL::to('/public/uploads/product/'.$value->product_image2)}}" style="width: 415px;height: 550px; border-radius: 1px; object-fit: cover; " alt="">
                                <img data-hash="product-3" class="product__big__img" src="{{URL::to('/public/uploads/product/'.$value->product_image3)}}" style="width: 415px;height: 550px; border-radius: 1px; object-fit: cover; " alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$value->product_name}}<span>Thương hiệu: {{$value->brand_name}}</span></h3>
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

                        @if($value->product_discount==0)
                            <div class="product__details__price">{{number_format($value->product_price).' '.'đ'}}</div>
                        @else
                            <div class="product__details__price">{{number_format($value->product_price-$value->product_price*$value->product_discount/100).' '.'đ'}} <span>{{number_format($value->product_price).' '.'đ'}}</span></div>
                        @endif

{{--                        <div class="product__details__price">{{number_format($value->product_price).' '.'đ'}}<span>{{number_format($value->product_price).' '.'đ'}}</span></div>--}}
                        <p style="max-width: 555px;word-wrap: break-word; text-align: justify;text-indent: 50px;">{{$value->product_content}}</p>
                        <form action="{{URL::to('/save-cart')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="product__details__button">
                                <div class="quantity">
                                    <span>Số lượng:</span>
                                    <div class="pro-qty">
                                        <input type="number" min="1" value="1" name="qty">
                                        <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
                                    </div>
                                </div>
                                @if($value->product_quantity==0)
                                <div class="cart-btn" style="background: #181818;"><span class="icon_bag_alt"></span> Đã hết hàng</div>
                                @else
                                    <button type="submit" class="cart-btn"><span class="icon_bag_alt"></span> Thêm vào giỏ hàng</button>
                                @endif
                            </div>
                        </form>
                        <div class="product__details__widget">
                            <ul>
                                @if($value->product_quantity==0)
                                    <li>
                                        <span>Tình trạng: </span>
                                        <div class="stock__checkbox">
                                                Hết hàng
                                        </div>
                                    </li>

                                @endif

                                <li>
                                    <span>Màu:</span> {{$value->product_color}}
{{--                                    <div class="color__checkbox">--}}
{{--                                        <label for="red">--}}
{{--                                            <input type="radio" name="color__radio" id="red" checked>--}}
{{--                                            <span class="checkmark"></span>--}}
{{--                                        </label>--}}
{{--                                        <label for="black">--}}
{{--                                            <input type="radio" name="color__radio" id="black">--}}
{{--                                            <span class="checkmark black-bg"></span>--}}
{{--                                        </label>--}}
{{--                                        <label for="grey">--}}
{{--                                            <input type="radio" name="color__radio" id="grey">--}}
{{--                                            <span class="checkmark grey-bg"></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
                                </li>
{{--                                <li>--}}
{{--                                    <span>Size:</span>--}}
{{--                                    <div class="size__btn">--}}
{{--                                        <label for="xs-btn" class="active">--}}
{{--                                            <input type="radio" id="xs-btn">--}}
{{--                                            xs--}}
{{--                                        </label>--}}
{{--                                        <label for="s-btn">--}}
{{--                                            <input type="radio" id="s-btn">--}}
{{--                                            s--}}
{{--                                        </label>--}}
{{--                                        <label for="m-btn">--}}
{{--                                            <input type="radio" id="m-btn">--}}
{{--                                            m--}}
{{--                                        </label>--}}
{{--                                        <label for="l-btn">--}}
{{--                                            <input type="radio" id="l-btn">--}}
{{--                                            l--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <span>Promotions:</span>--}}
{{--                                    <p>Free shipping</p>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Mô tả</h6>
                                <p style="word-wrap: break-word; text-align: justify;text-indent: 50px;">{{$value->product_desc}}</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Đánh giá</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                    consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                    quis, sem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>Sản phẩm liên quan</h5>
                    </div>
                </div>
                    @foreach($related_product as $key => $relate)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{URL::to('/public/uploads/product/'.$relate->product_image)}}">
                            @if(floor(abs(strtotime(date_format(date_create($relate->created_at),"d/m/Y")) - strtotime(date_format(date_create(Carbon\Carbon::now()),"d/m/Y"))) / (60*60*24))<10)
                                <div class="label new">
                                    Mới
                                </div>
                            @elseif($relate->product_discount>0)
                                <div class="label sale">
                                    - {{$relate->product_discount}} %
                                </div>
                            @elseif($relate->product_quantity==0)
                                <div class="label stockout">
                                    Hết hàng
                                </div>
                            @endif
                            <ul class="product__hover">
                                <li><a href="{{URL::to('/public/uploads/product/'.$relate->product_image)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{$relate->product_id}}">{{$relate->product_name}}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{number_format($relate->product_price).' '.'đ'}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
{{--            <div class="blog__details__comment">--}}
{{--                <h5>3 Comment</h5>--}}
{{--                <a href="#" class="leave-btn">Leave a comment</a>--}}
{{--                <div class="blog__comment__item">--}}
{{--                    <div class="blog__comment__item__pic">--}}
{{--                        <img src="img/blog/details/comment-1.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="blog__comment__item__text">--}}
{{--                        <h6>Brandon Kelley</h6>--}}
{{--                        <p>Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perpetua--}}
{{--                            mei et. Simul viderer facilisis egimus tractatos splendi.</p>--}}
{{--                        <ul>--}}
{{--                            <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>--}}
{{--                            <li><i class="fa fa-heart-o"></i> 12</li>--}}
{{--                            <li><i class="fa fa-share"></i> 1</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="blog__comment__item blog__comment__item--reply">--}}
{{--                    <div class="blog__comment__item__pic">--}}
{{--                        <img src="img/blog/details/comment-2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="blog__comment__item__text">--}}
{{--                        <h6>Brandon Kelley</h6>--}}
{{--                        <p>Consequat consetetur dissentiet, ceteros commune perpetua mei et. Simul viderer--}}
{{--                            facilisis egimus ulla mcorper.</p>--}}
{{--                        <ul>--}}
{{--                            <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>--}}
{{--                            <li><i class="fa fa-heart-o"></i> 12</li>--}}
{{--                            <li><i class="fa fa-share"></i> 1</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="blog__comment__item">--}}
{{--                    <div class="blog__comment__item__pic">--}}
{{--                        <img src="img/blog/details/comment-3.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="blog__comment__item__text">--}}
{{--                        <h6>Brandon Kelley</h6>--}}
{{--                        <p>Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perpetua--}}
{{--                            mei et. Simul viderer facilisis egimus tractatos splendi.</p>--}}
{{--                        <ul>--}}
{{--                            <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>--}}
{{--                            <li><i class="fa fa-heart-o"></i> 12</li>--}}
{{--                            <li><i class="fa fa-share"></i> 1</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
    <!-- Product Details Section End -->

@endsection
