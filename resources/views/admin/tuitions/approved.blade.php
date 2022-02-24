@extends('admin.layout.master')
@section('style')
@endsection
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Approved Tuitions</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Approved Tuitions</li>
            </ol>
        </div>
        <!--/Page-Header-->

        <div class="row">

            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h3 class="card-title">Tuitions</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="hover table-bordered table border-bottom-0" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Fee</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($tuitions) && !empty($tuitions))
                                    @foreach($tuitions as $key=>$tuition)
                                        <tr>
                                            <td>{{$tuition->id}}</td>
                                            <td>{{$tuition->title}}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($tuition->description, 50,'.....') }}</td>
                                            <td>{{ $tuition->pay }}</td>
                                            <td>@if($tuition->is_approved)
                                                    <label class="badge badge-success"> Approved </label>
                                                @else
                                                    <label class="badge badge-warning"> Pending </label>
                                                @endif</td>
                                            <td>
                                                <a href="{{ route('admin.tuition.unapproved', $tuition->id) }}" class="btn btn-dark" title="Block Tuition" >
                                                    <i class="fa fa-times text-white"></i>
                                                </a>
                                                <a href="{{ route('admin.tuition.show', $tuition->id) }}" class="btn btn-info" title="Show Tuition">
                                                    <i class="fa fa-eye text-white"></i>
                                                </a>
                                                <a href="{{ route('student.tuitions.delete', $tuition->id) }}" class="btn btn-danger" title="delete Tuitions"> <i class="fa fa-trash text-white"></i> </a>
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
@section('scripts')
    <!-- Data tables -->

@endsection
