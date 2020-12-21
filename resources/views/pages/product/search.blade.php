@extends('layout')
@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ URL::to('/trang-chu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Kết quả tìm kiếm: {{$keyword}}</span>
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
                                            <b>
                                                <a class="text-dark" href="{{ URL::to('/danh-muc/'.$cate->category_id)}}"><i class="fa fa-angle-right"></i> {{$cate->category_name}}</a>
                                            </b>
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
                    @foreach($product as $key => $pro)
                        <div class="col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg img-fluid" data-setbg="{{asset('public/uploads/product/'.$pro->product_image)}}">
                                    @if($pro->product_discount>0)
                                        <div class="label sale">
                                            - {{$pro->product_discount}} %
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
                        <div class="pagination__option">
                            <?php
                            $next = $product->currentPage() + 1;
                            $prev = $product->currentPage() - 1;
                            if ($product->currentPage()>1)
                            {
                                echo '<a href="san-pham?page=1"><i class="fa fa-angle-double-left"></i></a>'."\n";;
                                echo "<a ".'href="'."san-pham?page=";
                                echo $prev.'"><i class="fa fa-angle-left"></i></a>'."\n";;
                            }
                            for ($i = 1; $i <= $product->lastPage(); $i++) {

                                if ($i==$product->currentPage()){
                                    echo '<span class="active">'.$i.'</span>'."\n";
                                }
                                else{
                                    echo "<a ".'href="'."san-pham?page=".$i.'">';
                                    echo '<span>'.$i.'</span>';
                                    echo "</a>"."\n";
                                }
                            }
                            if ($product->currentPage()!=$product->lastPage()){
                                echo "<a ".'href="'."san-pham?page=";
                                echo $next.'"><i class="fa fa-angle-right"></i></a>'."\n";;
                                echo "<a ".'href="'."san-pham?page=";
                                echo $product->lastPage().'"><i class="fa fa-angle-double-right"></i></a>'."\n";;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
@endsection
