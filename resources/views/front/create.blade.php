@extends('layouts.site')

@section('content')
    <div class="slider-area">
        <!-- Slider -->

        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">

@include('admin.layouts.alerts.success');

                <div class="">
                    <h2 class="caption title text-center">
                        {{$movies ->name}}
                    </h2>
                    <form action="{{route('front.store',$movies->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput1">many</label>
                                    <input type="text" value="" id="name"
                                           class="form-control"
                                           placeholder="  "
                                           name="number">

                                </div>
                            </div><strong></strong>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput1">Time Reservation</label>
                                    <select name="time_id" class="select2 form-control" style="height: 50px">
                                        <option > check time </option>

                                    @if($times && $times -> count() > 0)

                                                @foreach($times as $time)
                                                @if($time  -> status == 0)

                                                    <option style=" font-size: 30px; padding: 4px"  value="{{$time -> id }}">

                                                        <strong>From</strong>
                                                        {{$time -> from}}
                                                        | <span style="color: #005cbf">To</span>
                                                        {{$time -> to}}
                                                        | <span style="color: #005cbf">Lounge</span>
                                                        {{$time -> lounge -> name}}
                                                    </option>
                                                @endif
                                                @endforeach
                                            @endif

                                    </select>
                                </div>
                            </div>
                    <input type="hidden" name="movie_id" value="{{$movies ->id}}">

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1"
                                        onclick="history.back();">
                                    <i class="ft-x"></i> تراجع
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> save
                                </button>

                            </div>

               </div>
                </form>
                    @foreach($times as $time)
                        {{$time -> lounge ->Number_chairs }}
                        @endforeach
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->

@endsection
