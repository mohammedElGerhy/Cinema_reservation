@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('messages.dashboard')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{__('messages.home')}}</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{App\Models\Lounge::select('id')->get()->count()}}</h3>

                                <p>Lounges</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('admin.lounges')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{App\Models\Move::select('id')->get()->count()}}</h3>

                                <p>movies</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{route('admin.movies')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{App\Models\ItemMovies::select('id')->get()->count()}}</h3>

                                <p>times</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('admin.times')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{App\Models\Admin::select('id')->get()->count()}}</h3>

                                <p>Admins</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{route('admin.admins')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.errors')
                        <!-- Custom tabs (Charts with tabs)-->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>customer</th>
                                        <th>Movie</th>
                                        <th>Lounge</th>
                                        <th>Time</th>
                                        <th>many ticket</th>
                                        <th>price ticket</th>
                                        <th>total</th>

                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)

                                        <tr>
                                            <td>{{$sale -> user -> name}}</td>
                                            <td>{{$sale -> movie -> name}}</td>
                                                @foreach($lounges as $lounge)
                                                @if($lounge -> id == $sale ->time -> id_lounge)
                                             <td>
                                                 {{$lounge  -> name}}
                                             </td>
                                                @endif
                                                @endforeach
                                             <td>{{$sale -> time -> from}} | {{$sale -> time -> to}}</td>
                                             <td> {{ $tew = $sale -> number}}</td>
                                             <td> {{ $test = $sale ->time -> ticket}}</td>
                                             <td> {{$tew * $tew }}  </td>

                                            <td>
                                                <div class="btn-group" role="group"
                                                     aria-label="Basic example">

                                                    <a href="{{route('admin.dashboard.destroy', $sale->id)}}"
                                                       class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>

                        </div>
                        <!-- /.card -->
                        </div>
                        <!-- DIRECT CHAT -->
                    </div>
                        <!-- /.card -->
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
