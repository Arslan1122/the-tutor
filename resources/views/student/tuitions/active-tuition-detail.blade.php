@extends('student.layout.master')
@section('content')
    <div class="side-app">

        <!-- Page-Header-->
        <div class="page-header">
            <h4 class="page-title">Tuition Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">tuitions</a></li>
                <li class="breadcrumb-item active" aria-current="page">proposals</li>
            </ol>
        </div>
        <!--/Page-Header-->
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tuition Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <h4>Title</h4>
                                <p class="">
                                    {{ $tuition->title }}
                                </p>
                            </div>
                            <div>
                                <h4>Description</h4>
                                <p class="">
                                    {{ $tuition->description }}
                                </p>
                            </div>
                            @if(!empty($tuition->standard_id))
                                <div class="d-flex">
                                    <div>
                                        <h4>Standard</h4>
                                        <p class="">
                                            {{ $tuition->standard->name }}
                                        </p>
                                    </div>
                                    <div style="margin-left: 10%">
                                        <h4>Subject</h4>
                                        <p class="">
                                            {{ $tuition->subject->name }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div style="margin-left: 10%">
                                    <h4>Course</h4>
                                    <p class="">
                                        {{ $tuition->course->name }}
                                    </p>
                                </div>
                            @endif
                            <div>
                                <h4>Fee/Month</h4>
                                <p class="">
                                    PKR {{ $tuition->pay }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($tuition->isAcceptedproposals) && sizeof($tuition->isAcceptedproposals) > 0)
            <div class="page-header">
                <h4 class="page-title">Teachers Details</h4>
            </div>
            <div class="row email-users">
                @foreach($proposals as $proposal)
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $proposal->teacher->name }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3">
                                        <div class="text-center">
                                            <div>
                                                <img src="
                                                @if(isset($proposal->teacher->teacherProfile->profile_img))
                                                {{ asset($proposal->teacher->teacherProfile->profile_img) }}
                                                @else {{ asset('backend/assets/images/users/female/3.jpg') }} @endif"
                                                     alt="user-img" class="avatar avatar-lg brround"
                                                     style="width: 5rem;height: 5rem;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-9">
                                        <p class="mt-4 mt-sm-0">{{ $proposal->description }}</p>
                                        <a href="" class="btn btn-success">Chat </a>
                                        <a href="" class="btn btn-info">View Profile </a>
                                        <a href="{{ route('student.complete.tuition', $proposal->id) }}"
                                           class="btn btn-primary">Complete </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-success font-weight-bold text-center">Congratulations! This Tuition is Assigned.</div>
        @endif
    </div>
@endsection
