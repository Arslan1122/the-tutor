@extends('admin.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Tuition Details</h4>
            <h6>{{ $tuition->created_at->format('d-M-Y') }}</h6>
        </div>
        <!--/Page-Header-->
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Student Personal Details</h4>
                        <div class="table-responsive user-details">
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Name </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $tuition->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Location </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $tuition->user->studentProfile->address }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Email </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $tuition->user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">City </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $tuition->user->studentProfile->city }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Fee / Month </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $tuition->pay }}</td>
                                </tr>
                                </tbody>
                            </table>
                            @if($tuition->is_approved)
                                <a href="{{ route('admin.tuition.unapproved', $tuition->id) }}" class="btn btn-dark mt-5" title="Block Tuition" >
                                    <i class="fa fa-times text-white"></i> Block Tuition
                                </a>
                                <a href="{{ route('admin.tuitions.proposals', $tuition->id) }}" class="btn btn-primary mt-5" title="Approve Tuition">
                                    <i class="fa fa-eye text-white"></i>Proposals
                                </a>
                            @else
                                <a href="{{ route('admin.tuition.approve', $tuition->id) }}" class="btn btn-primary mt-5" title="Approve Tuition">
                                    <i class="fa fa-check text-white"></i>Approve Tuition
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row profie-img">
                            <div class="col-md-12">
                                <div class="media-heading">
                                    <h5 class="mb-3"><strong>Student Biography</strong></h5>
                                </div>
                                <p>
                                    {{ $tuition->user->studentProfile->bio }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong>Standards</strong></h5>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">{{ $tuition->standard->name ?? '' }}</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong>Subjects</strong></h5>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">{{$tuition->subject->name ?? '' }}</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong>Courses</strong></h5>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">{{ $tuition->course->name ?? '' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
