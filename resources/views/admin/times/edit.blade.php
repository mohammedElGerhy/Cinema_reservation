@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة قسم رئيسي
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> Create Times </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.layouts.alerts.success')
                                @include('admin.layouts.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.times.update',$times->id)}}"
                                              method="POST"
                                        >
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>  </h4>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">From</label>
                                                            <input type="datetime-local" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$times -> from}}"
                                                                   name="from">
                                                            @error("from")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">to</label>
                                                            <input type="datetime-local" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$times -> to}}"
                                                                   name="to">
                                                            @error("to")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ticket </label>
                                                            <input type="text" id=""
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$times -> ticket}}"
                                                                   name="ticket">

                                                            @error("ticket")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckChecked" checked>
                                                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                                                    statues
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> lounge </label>
                                                            <select class="select2 form-control" aria-label="Default select example" name="id_lounge">
                                                                <option selected>select Lounge</option>
                                                                @if($lounges && $lounges->count() > 0)
                                                                    @foreach($lounges as $lounge)
                                                                        <option value="{{$lounge -> id}}"
                                                                                @if($times -> id_lounge == $lounge -> id )  selected @endif
                                                                        >{{$lounge -> name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                            @error("id_lounge")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> movies </label>
                                                            <select class="select2 form-control" aria-label="Default select example" name="id_movies">
                                                                <option selected>select Movies</option>
                                                                @if($movies && $movies->count() > 0)
                                                                    @foreach($movies as $movie)
                                                                        <option value="{{$movie -> id}}"
                                                                                @if($times -> id_movies == $movie -> id )  selected @endif

                                                                        >{{$movie -> name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            @error("id_movies")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> save
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
