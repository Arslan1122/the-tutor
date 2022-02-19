@extends('admin.layout.master')
@section('style')
@endsection
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">All Subjects List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subjects</li>
            </ol>
        </div>
        <!--/Page-Header-->

        <div class="row">

            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Subjects</h3>
                        <button type="button" class="btn bg-primary-transparent text-primary" data-bs-toggle="modal" data-bs-target="#addNewSubject"><i class="fe fe-plus"></i></button>

                    </div>
                    <div class="modal fade" id="addNewSubject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Subject</h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('admin.subject.insert')}}" method="post">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Subject Name</label>
                                        <input type="text" name="name" required class="form-control">
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
                                    <th>Name</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($subjects) && !empty($subjects))
                                    @foreach($subjects as $key=>$subject)
                                <tr>
                                    <td>{{$subject->id}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>
                                        <a href="javascript:void 0"data-bs-toggle="modal" data-bs-target="#editSubject-{{$key}}" > <i class="fa fa-pencil text-info"></i> </a>
                                        <a href="{{route('admin.subject.delete',$subject->id)}}"> <i class="fa fa-trash text-danger"></i> </a>
                                    </td>

                                </tr>
                                <div class="modal fade" id="editSubject-{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit  Subject Name</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('admin.subject.update',$subject->id)}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Subject Name</label>
                                                        <input type="text" name="name" required value="{{$subject->name}}" class="form-control">
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
