@extends('teacher.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Tuitions List</h4>
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
                            <h3 class="card-title">Active Tuitions</h3>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="hover table-bordered table border-bottom-0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Fee / Month</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($tuitions) && !empty($tuitions))
                                    @foreach($tuitions as $key=>$tuition)
                                        <tr>
                                            <td>{{$tuition->tuition->id}}</td>
                                            <td>{{$tuition->tuition->title}}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($tuition->tuition->description, 50,'.....') }}</td>
                                            <td>{{ $tuition->tuition->pay }}</td>
                                            <td>
                                                <a href="{{ route('teacher.tuition.show', $tuition->tuition->id) }}" class="btn btn-danger"> <i class="fa fa-eye text-white"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h4>No record Found</h4>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
