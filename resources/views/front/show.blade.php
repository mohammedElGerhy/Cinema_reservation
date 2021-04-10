@extends('layouts.site')

@section('content')
    <div class="slider-area">
        <!-- Slider -->

        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">

              <img src="{{ $show -> image}}" alt="Slide">


                <div class="">
                    <h2 class="caption title">

                       <strong>Name</strong>  : <span class="primary">{{$show -> name}}</span>
                    </h2>


                    <h4 class="caption subtitle">
                        <strong>Show Day</strong>
                        {{$show -> date_show}}</h4>
                        @foreach($show_time as $show_tim)
                        @if($show -> id == $show_tim -> id_movies)

                        <h2 class="caption title">
                            <strong>From</strong> <span class="primary">{{$show_tim -> from}}</span>
                            </h2>

                            <h2 class="caption title">
                                <strong>To</strong> <span class="primary">{{$show_tim -> to}}</span>
                            </h2>
                            <h2 class="caption title">
                                <strong>Ticket</strong> <span class="primary">{{$show_tim -> ticket}}</span>
                            </h2>
                            @foreach($lounge_time as $lounge_tim)
                                @if($lounge_tim -> id == $show_tim -> id_lounge)
                                    <h2 class="caption title">
                                        <strong>Lounge</strong> <span class="primary">{{$lounge_tim -> name}}</span>

                                        <h2 class="caption title">
                                            <strong>Available Ticket </strong> <span class="primary">{{$lounge_tim -> Number_chairs}}</span>

                                        </h2>

                                @endif

                            @endforeach



                            <hr>
                                        @if($lounge_tim -> Number_chairs > 54)
                                            <div class="alert alert-success" role="alert">
                                                <h1 class="text-center"> time reservation</h1>
                                            </div>
                                        @else
                                            <div class="alert alert-danger" role="alert">
                                                <h1 class="text-center"> completed reservation</h1>
                                            </div>
                    @endif


                    @endif
                    @endforeach
                </div>
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->

@endsection
