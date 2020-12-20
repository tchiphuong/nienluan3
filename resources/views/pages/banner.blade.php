@extends('layout');
@section('banner');
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
        <img class="third-slide" src="public/frontend/img/banner/banner-1.jpg">
        <div class="container">
            <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem ngay</a></p>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <img class="third-slide" src="public/frontend/img/banner/banner-1.jpg">
        <div class="container">
            <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem ngay</a></p>
            </div>
        </div>
    </div>
</div>
@endsection;
