@extends('layouts.site')

@section('content')
    <div class="slider-area">
        <!-- Slider -->
        @if(auth()->user())
        <div class="alert alert-success" role="alert">
           <p class="text-center">Welcom in Reservation Movies <strong>{{auth()->guard('web')->user()->name}}</strong></p>
        </div>
    @endif
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">

                <li><img src="{{asset('assets/front/img/h4-slide4.png')}}" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">& Phone</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->


    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-10">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>better Movies</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-10">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free Reservation</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-10">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New Movies</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Movies</h2>
                        <div class="product-carousel">

                           @foreach($movies as $movie)
                                @if($movie-> statues !== 1)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{ $movie -> image}}" alt="">
                                    <div class="product-hover">
                                        <a href="{{route('front.show',$movie -> id )}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>

                                    </div>

                                </div>

                                <h2><a href="single-product.html">{{ $movie -> name}}</a></h2>

                                <div class="product-carousel-price">
                                    Show Day
                                    {{ $movie -> date_show	}}
                                </div>
                                <div class="product-carousel-price">
                                    <a href="{{route('front.create',$movie -> id)}}" class="btn btn-info"><i class="add-on"></i> Reservation</a>

                                </div>
                            </div>
                                @endif
                               @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->



@endsection
