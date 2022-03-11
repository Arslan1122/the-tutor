@extends('guest.layout.master')
@section('content')
    <section>
        <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white py-7">
                        <h1 class="">Profile</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Teacher Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->
    </div><!--/Section-->

    <div class="container">
        <div class="row">
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="wideget-user ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="wideget-user-desc">
                                            <div class="wideget-user-img">
                                                <img class="" src=
                                                @if($user->teacherProfile->profile_img)
                                                    "{{ asset($user->teacherProfile->profile_img) }}"
                                                 @else
                                                    "{{ asset('frontend/assets/images/users/male/23.jpg') }}"
                                                @endif
                                                     alt="img" style="height:120px">
                                            </div>
                                            <div class="user-wrap">
                                                <h3>{{ $user->name }}</h3>
                                                <h6 class="text-default mb-3">Member Since: {{ $user->created_at->format('d M, Y') }}</h6>
                                                <div class="wideget-user-info mt-3">
                                                    <div class="wideget-user-rating mb-2">
                                                        @if(count($ratingCount) > 0)
                                                        <i class="fa fa-star text-warning"></i><span class="font-weight-bold">Rating: </span> {{array_sum($ratingCount) / count($ratingCount)}} / 10 <span> ({{ count($ratingCount) }} Reviews)</span>
                                                        @else
                                                            <i class="fa fa-star text-warning"></i><span class="font-weight-bold">Rating: </span> 0 / 10 <span> ({{ count($ratingCount) }} Reviews)</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer user-widget">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#tab-51" class="active" data-bs-toggle="tab">Profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-51">
                                        <div id="profile-log-switch">
                                            <div class="media-heading">
                                                <h5><strong>Personal Information</strong></h5>
                                            </div>
                                            <div class="table-responsive ">
                                                <table class="table row table-borderless">
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                    <tr>
                                                        <td><strong class="font-weight-bold text-default-dark">Full Name :</strong> {{$user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong class="font-weight-bold text-default-dark">Location :</strong> {{ $user->teacherProfile->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong class="font-weight-bold text-default-dark">City :</strong> {{ $user->teacherProfile->city }}</td>
                                                    </tr>
                                                    </tbody>
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                    <tr>
                                                        <td><strong class="font-weight-bold text-default-dark">Email :</strong>{{ $user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong class="font-weight-bold text-default-dark">Phone :</strong> {{ $user->phone_number }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong class="font-weight-bold text-default-dark">Degree  :</strong> {{ $user->teacherProfile->degree_name }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row profie-img">
                                                <div class="col-md-12 text-justify">
                                                    <div class="media-heading">
                                                        <h5 class="mb-3"><strong>Biography</strong></h5>
                                                    </div>
                                                    <p class="mb-0">{{ $user->teacherProfile->bio }}</p>
                                                </div>
                                                <div class="col-md-12 text-justify mt-4">
                                                    <div class="media-heading">
                                                        <h5 class="mb-3"><strong>About Teacher</strong></h5>
                                                    </div>
                                                    <p class="mb-0">{{ $user->teacherProfile->about_me }}</p>
                                                </div>
                                            </div>
                                        </div>
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
