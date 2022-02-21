@extends('admin.layout.master')
@section('style')
@endsection
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
                            <h3 class="card-title">Tuitions</h3>
                        </div>
                        <button type="button" class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#addNewTuition"><i class="fe fe-plus"></i> Add Tuition</button>

                    </div>
                    <div class="modal fade" id="addNewTuition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Tuition</h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('student.tuitions.store')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="" class="form-label">Tuition Title</label>
                                            <input type="text" name="title" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Tuition Description(what kind of tutor you need)</label>
                                            <textarea name="description" id="" class="form-control" cols="30" rows="10" required ></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
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
                                            <td>{{$tuition->description}}</td>
                                            <td>@if($tuition->is_approved)
                                                <label class="badge badge-success"> Approved </label>
                                                @else
                                                    <label class="badge badge-warning"> Pending </label>
                                                @endif</td>
                                            <td>
                                                @if(!$tuition->is_approved)
                                                <a href="javascript:void 0" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTuition-{{$key}}" >
                                                    <i class="fa fa-pencil text-white"></i>
                                                </a>
                                                @endif
                                                <a href="{{ route('student.tuitions.delete', $tuition->id) }}" class="btn btn-danger"> <i class="fa fa-trash text-white"></i> </a>
                                            </td>

                                        </tr>
                                        <div class="modal fade" id="editTuition-{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit  Tuition</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('student.tuitions.update',$tuition->id)}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Tuition Title</label>
                                                                <input type="text" name="title" required value="{{$tuition->title}}" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="" class="form-label">Tuition Description(what kind of tutor you need)</label>
                                                                <textarea name="description"  class="form-control" id="" cols="30" rows="10">{{ $tuition->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
