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
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.errors')
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <a href="{{route('admin.times.create')}}"
                                       class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                        Craete Times
                                    </a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>from</th>
                                        <th>to</th>
                                        <th>ticket</th>

                                        <th>lounge</th>
                                        <th>movies</th>
                                        <th>status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($times as $time)
                                        <tr>

                                            <td>{{$time -> from}}</td>
                                            <td>{{$time -> to}}</td>
                                            <td>{{$time -> ticket}}</td>
                                            <td>{{$time -> lounge ->name}}</td>
                                            <td>{{$time -> movies -> name}}</td>
                                            <td>
                                                @if($time -> status == 1)
                                                    <a href="{{route('admin.times.status',$time -> id)}}"
                                                       class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">not active</a>
                                                @elseif($time -> status == 0)
                                                    <a href="{{route('admin.times.status',$time -> id)}}"
                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">active</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                     aria-label="Basic example">
                                                    <a href="{{route('admin.times.edit',$time -> id)}}"
                                                       class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                    <a href="{{route('admin.times.destroy',$time -> id)}}"
                                                       class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content -->
@endsection
