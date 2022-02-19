@extends('teacher.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Edit Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-frown-o me-2" aria-hidden="true"></i>
                {{$error}}.</div>
    @endforeach
    <!--Page-Header-->
        @if(!\Auth::user()->is_approved)
            <div class="alert alert-danger">Please ! Complete your profile,Admin will review your profile and approve it within 48 hours. </div>
        @elseif(\Auth::user()->is_block)
            <div class="alert alert-danger">You're blocked! Contact Admin for furthur investigation</div>
        @endif

        <div class="row ">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('teacher.profile.store') }}">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <img class="avatar brround avatar-xl" src="@if(isset(\Auth::user()->teacherProfile->profile_img)) {{ asset(\Auth::user()->teacherProfile->profile_img) }} @else {{ asset('backend/assets/images/users/female/3.jpg') }} @endif" alt="Avatar-img">
                                </div>
                                <div class="col">
                                    <h3 class="mb-1 ">{{ \Auth::user()->name }}</h3>
                                    <p class="mb-4 ">Teacher</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label font-weight-bold">Your Introduction</label>
                                <textarea class="form-control" rows="5" name="bio">{{ @$profile->bio }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label font-weight-bold">Full Name</label>
                                <input class="form-control" placeholder="" name="name" value=" {{ \Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label font-weight-bold">Phone Number</label>
                                <input class="form-control" placeholder="" name="phone_number" value=" {{ \Auth::user()->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label font-weight-bold">Email-Address</label>
                                <input class="form-control" readonly placeholder="your-email@domain.com" value="{{ \Auth::user()->email }}"/>
                            </div>

                            <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="card" method="post" action="{{route('teacher.profile.update',['id'=>Auth::id()])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{@$profile->profile_img}}">
                    <input type="hidden" name="old_clip" value="{{@$profile->intro_clip}}">

                    <div class="card-header">
                        <h3 class="card-title">Qualification / Skills</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Degree Name</label>
                                    <input type="text" name="degree_name" class="form-control @error('degree_name') is-invalid state-invalid @enderror"  value="{{@$profile->degree_name}}" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Institute Name</label>
                                    <input type="text" class="form-control @error('institute_name') is-invalid state-invalid @enderror"  name="institute_name" value="{{@$profile->institute_name}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Standards ( You wanna teach)</label>
                                    <select class="form-control select2" name="standards[]" data-placeholder="Choose Standards" multiple>
                                        @foreach($standards as $standard)
                                        <option value="{{ $standard->id }}" @if(in_array($standard->id, $userStandards))selected @endif>{{ $standard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Subjects ( You wanna teach)</label>
                                    <select class="form-control select2" name="subjects[]" data-placeholder="Choose Standards" multiple>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" @if(in_array($subject->id, $userSubjects))selected @endif> {{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Courses</label>
                                    <select class="form-control select2" name="courses[]" data-placeholder="Choose Standards" multiple>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" @if(in_array($course->id, $userCourses))selected @endif> {{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Home Address" value="{{@$profile->address}}" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">City</label>
                                    <input type="text" name="city" class="form-control" placeholder="City" value="{{@$profile->city}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Postal Code</label>
                                    <input type="number" name="postal_code" class="form-control" placeholder="ZIP Code" value="{{@$profile->postal_code}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label class="form-label font-weight-bold">Profile Image</label>
                                <input type="file" name="profile_img" value="1" class="dropify  @error('profile_img') is-invalid state-invalid @enderror" data-default-file="{{asset(@$profile->profile_img)}}" data-height="180"  />
                                @error('profile_img')
                                <div class="text-danger">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label class="form-label font-weight-bold">Introduction Video ( Max 10 MB)</label>
                                <input type="file" name="intro_clip" class="dropify @error('intro_clip') is-invalid state-invalid @enderror " data-default-file="" data-height="180" data-max-file-size="10M" />
                                @error('intro_clip')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-12 mt-5">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Write All your Qualifications </label>
                                    <textarea class="form-control" rows="5" name="about_me">{{ @$profile->about_me }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

