@extends('teacher.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
        <!--/Page-Header-->
        @if(!\Auth::user()->is_approved)
            <div class="alert alert-danger">Please ! Complete your profile,Admin will review your profile and approve it within 48 hours. </div>
        @elseif(\Auth::user()->is_block)
            <div class="alert alert-danger">You're blocked! Contact Admin for furthur investigation</div>
        @endif
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="card user-pro-list overflow-hidden">
                    <div class="card-body">
                        <div class="user-pic text-center">
											<span class="avatar avatar-xxl brround" style="background-image: url(@if(isset($teacher->teacherProfile->profile_img)) {{ asset($teacher->teacherProfile->profile_img) }} @else {{ asset('backend/assets/images/users/female/3.jpg') }} @endif">
												<span class="avatar-status bg-green"></span>
											</span>
                            <div class="pro-user mt-3">
                                <h5 class="pro-user-username text-dark mb-1 fs-16">{{ $teacher->name }}</h5>
                                <h6 class="pro-user-desc text-muted fs-12">{{ $teacher->email }}</h6>
                            </div>
                        </div>
                        <div class="pro-user mt-3 d-flex justify-content-center align-items-center">
                            <div class="btn-list">
                                <a href="{{ route('teacher.profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Personal Details</h4>
                        <div class="table-responsive user-details">
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Name </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $teacher->name }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Location </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $teacher->teacherProfile->address }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Email </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $teacher->email }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Phone </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $teacher->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">City </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $teacher->teacherProfile->city }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Postal Code </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $teacher->teacherProfile->postal_code }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Introduction video</h4>
                        <video width="280" height="200" autoplay controls>
                            <source src="{{ asset($teacher->teacherProfile->intro_clip) }}" type="video/mp4">
                        </video>
                        {{--                        <iframe width="280" height="200"--}}
                        {{--                                src="{{ asset('uploads/Teacher/introClip/1645175677.mp4') }}">--}}
                        {{--                        </iframe>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row profie-img">
                            <div class="col-md-12">
                                <div class="media-heading">
                                    <h5 class="mb-3"><strong>Biography</strong></h5>
                                </div>
                                <p>
                                    {{ $teacher->teacherProfile->bio }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row profie-img">
                            <div class="col-md-12">
                                <div class="media-heading">
                                    <h5 class="mb-3"><strong>Qualification</strong></h5>
                                </div>
                                <p>
                                    {{ $teacher->teacherProfile->about_me }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong>Standards</strong></h5>
                        @forelse($teacher->standards as $standard)
                            <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">{{ $standard->standard->name }}</a>
                        @empty
                            <p>No Standards Added</p>
                        @endforelse
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong>Subjects</strong></h5>
                        @forelse($teacher->subjects as $subject)
                            <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">{{$subject->subject->name }}</a>
                        @empty
                            <p>No Standards Added</p>
                        @endforelse
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong>Courses</strong></h5>
                        @forelse($teacher->courses as $course)
                            <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">{{ $course->course->name }}</a>
                        @empty
                            <p>No Standards Added</p>
                        @endforelse
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-semibold">Info</h5>
                        <div class="main-profile-contact-list d-lg-flex">
                            <div class="media me-5">
                                <div class="media-icon bg-secondary-transparent text-secondary me-5 mt-1">
                                    <i class="fa fa-slack"></i>
                                </div>
                                <div class="media-body">
                                    <small class="text-muted fs-16">Institute</small>
                                    <div class="font-weight-semibold">
                                        {{ $teacher->teacherProfile->institute_name }}
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-success-transparent text-success me-5 mt-1">
                                    <i class="fa fa-map"></i>
                                </div>
                                <div class="media-body">
                                    <small class="text-muted fs-16">Degree</small>
                                    <div class="font-weight-semibold">
                                        {{ $teacher->teacherProfile->degree }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
