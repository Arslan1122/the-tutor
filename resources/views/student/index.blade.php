@extends('student.layout.master')
@section('content')
    @if(!\Auth::user()->is_approved)
        <div class="alert alert-danger" style="margin-top:5%">Please ! Complete your profile,Admin will review your profile and approve it within 48 hours. </div>
    @elseif(\Auth::user()->is_block)
        <div class="alert alert-danger" style="margin-top:5%">You're blocked! Contact Admin for furthur investigation</div>
    @endif


    <!--Page-Header-->
    <div class="page-header p-4" style="margin-top:5%">
        <h4 class="page-title">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <!--/Page-Header-->
    <div class="row row-cards p-4">
        <div class="col-sm-12 col-lg-6 col-xl-4">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 text-start">
                            <h5 class="mb-3">Tuitions Requests</h5>
                            <h2 class="mb-2 font-weight-bold text-primary">3</h2>
                        </div>
                        <div class="text-end counter-2 my-auto col-4">
                            <div class="counter-icon1 bg-primary">
                                <i class="icon icon-people text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 text-start">
                            <h5 class="mb-3">Active tuitions</h5>
                            <h2 class="mb-2 font-weight-bold text-warning">{{ count($activeTuitions) }}</h2>
                        </div>
                        <div class="text-end counter-2 my-auto col-4">
                            <div class="counter-icon1 bg-warning">
                                <i class="icon icon-book-open text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 text-start">
                            <h5 class="mb-3">Completed Tuitions</h5>
                            <h2 class="mb-2 font-weight-bold text-secondary">{{ count($completedTuitions) }}</h2>
                        </div>
                        <div class="text-end counter-2 my-auto col-4">
                            <div class="counter-icon1 bg-secondary">
                                <i class="icon icon-graduation text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div >
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="hover table-bordered table border-bottom-0">
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
                                @if(!$tuition->is_approved)
                                    <a href="javascript:void 0" class="btn btn-primary"
                                       data-bs-toggle="modal" data-bs-target="#editTuition-{{$key}}">
                                        <i class="fa fa-pencil text-white"></i>
                                    </a>
                                @else
                                    <a href="{{ route('student.tuitions.proposals', $tuition->id) }}" class="btn btn-sm btn-dark">
                                        Proposals
                                    </a>
                                @endif
                                <a href="{{ route('student.tuitions.delete', $tuition->id) }}"
                                   class="btn btn-danger"> <i class="fa fa-trash text-white"></i> </a>
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
@endsection
