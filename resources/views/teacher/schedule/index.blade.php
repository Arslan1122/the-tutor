@extends('teacher.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Tuitions Schedules</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tuitions</li>
            </ol>
        </div>
        <!--/Page-Header-->

        <div class="row">

            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h3 class="card-title">Schedules</h3>
                        </div>
                        <a href="{{ route('teacher.schedule.create') }}" class="btn bg-primary text-white"><i class="fe fe-plus"></i> Create Tuition
                            Schedule
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="hover table-bordered table border-bottom-0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tuition</th>
                                    <th>Class Date</th>
                                    <th>Class Time</th>
                                    <th>Link</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td> {{ $schedule->id }} </td>
                                        <td>{{ $schedule->tuition->title }}</td>
                                        <td>{{ $schedule->class_date->format('d-m-Y') }}</td>
                                        <td>{{ $schedule->class_time}}</td>
                                        <td>{{ $schedule->meet_link }}</td>
                                        <td>
                                            <a href="{{ route('teacher.schedule.delete', $schedule->id) }}" class="btn btn-danger"> <i class="fa fa-trash text-white"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
