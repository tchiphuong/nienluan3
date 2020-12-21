@extends('layout')
@section('content')
    <!-- Shop Cart Section Begin -->
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ URL::to('/trang-chu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <section class="shop-cart spad">
        <div class="container">
            <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (Cart::content()->count()==0)
                                <td colspan="4">
                                    <h3 class="text-center"><i>(Giỏ hàng rỗng)</i></h3>
                                </td>
                            @endif

                            <?php
                            $content = Cart::content();
                            ?>
                            @foreach($content as $v_content)
                            <tr>
                                <td class="cart__product__item">
                                    <img class="img-thumbnail" style="width: 100px;height: 100px; border-radius: 100%; object-fit: cover;" src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="">
                                    <div class="cart__product__item__title">
                                        <h6><a href="san-pham/{{$v_content->id}}" style="color: #0b0b0b;">{{$v_content->name}}</a>
                                            <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart"></h6>
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
                                    </div>
                                </td>
                                <td class="cart__price">{{number_format($v_content->price)}} đ</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <?php
                                            $up = $v_content->qty + 1;
                                            $down = $v_content->qty - 1;
                                        ?>
                                                <input type="number" value="{{$v_content->qty}}" name="cart_quantity">
                                    </div>
                                </td>
                                <td class="cart__total">
                                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal).' '.'đ';
                                    ?>
                                </td>
                                <td class="cart__close">
                                    <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">
                                        <span class="icon_close"></span>
                                    </a>
                                </td>
                            </tr>


                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ URL::to('/san-pham')}}">Mua tiếp</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <button type="submit" class="site-btn" style="float: right"><span class="icon_refresh"></span> Cập nhật giỏ hàng</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
{{--                        <h6>Mã giảm giá</h6>--}}
{{--                        <form action="#">--}}
{{--                            <input type="text" placeholder="Nhập mã giảm giá">--}}
{{--                            <button type="submit" class="site-btn">Áp dụng</button>--}}
{{--                        </form>--}}
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Thanh toán</h6>
                        <ul>
                            <li>Tổng tiền hàng <span>{{substr(Cart::priceTotal(), 0, -3)}} đ</span></li>
                            <li>Phí vận chuyển <span>0 đ</span></li>
{{--                            <li>Đã giảm giá<span>- {{substr(Cart::discount(), 0, -3)}} đ</span></li>--}}
{{--                            <li>Thuế <span>{{substr(Cart::tax(), 0, -3)}} đ</span></li>--}}
                            <li>Tổng thanh toán <span>{{substr(Cart::total(), 0, -3)}} đ</span></li>
                        </ul>

                        <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id!=NULL){
                        ?>
                        <a class="primary-btn" href="{{URL::to('/checkout')}}">Mua hàng</a>
                        <?php
                        }else{
                        ?>

                        <a class="primary-btn" href="{{URL::to('/dang-nhap')}}">Mua hàng</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

@endsection
