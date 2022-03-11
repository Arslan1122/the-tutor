@extends('guest.layout.master')
@section('content')
    <!--Section-->
    <section>
        <div class="sptb-2 sptb-tab">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white mb-7 mt-7 mt-lg-0">
                        <h1 class="mb-1">The Word's Largest Selection of Courses</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable.</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
                            <div class="search-background bg-transparent typewrite-text">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
                                        <div class="form row g-0 ">
                                            <div class="form-group col-xl-4 col-lg-3 col-md-12 select2-lg br-ts-7 br-bs-7 mb-0">
                                                <select class="form-control select2-show-search  border-bottom-0" data-placeholder="Select Category">
                                                    <optgroup label="Categories">
                                                        <option>Select</option>
                                                        <option value="1">IT</option>
                                                        <option value="2">Language</option>
                                                        <option value="3">Science</option>
                                                        <option value="4">Health</option>
                                                        <option value="5">Humanities</option>
                                                        <option value="6">Business</option>
                                                        <option value="7">Maths</option>
                                                        <option value="8">Marketing</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group  col-xl-6 col-lg-6 col-md-12 mb-0">
                                                <input type="text" class="form-control input-xl br-0" placeholder="Search Courses...." data-min-length="1" list="courses" name="courses">
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                                <a href="javascript:void(0)" class="btn btn-xl btn-block btn-secondary br-ts-md-0 br-bs-md-0"><i class="fe fe-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /header-text -->
        </div>
    </section><!--/Section-->
    </div><!--/Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title d-md-flex">
                <div>
                    <h2>Subjects & Courses</h2>
                    <p class="fs-18 lead">Services that The Tutor provides</p>
                </div>
                <div class="ms-auto">
                    <a class="btn btn-light mt-3" href="javascript:void(0)"><i class="fe fe-arrow-right"></i> View More</a>
                </div>
            </div>
            <div class="item-all-cat education-categories">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fe fe-book-open"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">O/A Levels</h5>
                                <p class="mt-3">Complete O/A Level Subjects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fe fe-airplay"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">IT Courses</h5>
                                <p class="mt-3">IT course for everyone</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fe fe-database"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">Data Science</h5>
                                <p class="mt-3">Guidence to Data Science Subjects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fe fe-heart"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">Health</h5>
                                <p class="mt-3">Health Subjects for </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fa fa-balance-scale"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">Law Course</h5>
                                <p class="mt-3">Sed do eiusmod tempor ut labore et dolore magna aliqua</p>
                                <a class="btn-link" href="javascript:void(0)"><i class="fe fe-chevron-right"></i> View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fe fe-hash"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">Maths</h5>
                                <p class="mt-3">Sed do eiusmod tempor ut labore et dolore magna aliqua</p>
                                <a class="btn-link" href="javascript:void(0)"><i class="fe fe-chevron-right"></i> View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark mb-lg-0 item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fe fe-briefcase"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">Business</h5>
                                <p class="mt-3">Sed do eiusmod tempor ut labore et dolore magna aliqua</p>
                                <a class="btn-link" href="javascript:void(0)"><i class="fe fe-chevron-right"></i> View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-all-card text-dark mb-lg-0 item-hover-card p-6">
                            <a href="page-list.html" class="absolute-link"></a>
                            <div class="iteam-all-icon">
                                <i class="fe fe-bar-chart"></i>
                            </div>
                            <div class="item-all-text mt-3">
                                <h5 class="mb-0">Marketing</h5>
                                <p class="mt-3">Sed do eiusmod tempor ut labore et dolore magna aliqua</p>
                                <a class="btn-link" href="javascript:void(0)"><i class="fe fe-chevron-right"></i> View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-5">
        <!--/Section-->
        <h3 class="">Best Trainers</h3>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="owl-carousel client-carousel">
                        @foreach($teachers as $teacher)
                        <div class="item text-center">
                            <div class="card overflow-hidden">
                                <img src="
                                          @if($teacher->teacherProfile->profile_img)
                                            {{ asset($teacher->teacherProfile->profile_img) }}"
                                            @else
                                            {{ asset('frontend/assets/images/trainers/1.jpg') }}"
                                            @endif

                                     class="w-100" alt="img">
                                <div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
                                    <h4 class="fs-16 mt-0 mb-1 font-weight-semibold"><a href="{{ route('teacher.profile', $teacher->id) }}">{{ $teacher->name }}</a></h4>
                                    <p class="mb-1">@if($teacher->teacherProfile->degree_name) {{ $teacher->teacherProfile->degree_name }} @else The Tutor Teacher @endif</p>
                                </div>
                                <div class="card-footer">
                                    @php
                                        $ratings = $teacher->teacherRatings->pluck('rating')->toArray();
                                        $count = count($ratings);
                                    @endphp
                                    <div class="">
                                        @if($count > 0)
                                        <i class="fa fa-star" style="color:orange"></i>{{array_sum($ratings) / $count}} / 10
                                        @else
                                            <i class="fa fa-star" style="color:orange"></i>   0 / 10
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>

    <!--Section-->
    <section class="about-1 pt-9 pb-9 bg-background cover-image" data-bs-image-src="../../assets/images/banners/pattern2.png">
        <div class="content-text mb-0">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-status md-mb-0">
                            <div class="counter-icon bg-primary">
                                <i class="typcn typcn-group-outline text-white"></i>
                            </div>
                            <h5>Total Learners</h5>
                            <h2 class="counter mb-0">2569</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-status status-1 md-mb-0">
                            <div class="counter-icon bg-primary">
                                <i class="typcn typcn-mortar-board text-white"></i>
                            </div>
                            <h5>Total Graduates</h5>
                            <h2 class="counter mb-0">1765</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-status status md-mb-0">
                            <div class="counter-icon bg-primary">
                                <i class="typcn typcn-globe-outline text-white"></i>
                            </div>
                            <h5>Total Countries</h5>
                            <h2 class="counter mb-0">846</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-status status">
                            <div class="counter-icon bg-primary">
                                <i class="typcn typcn-news text-white"></i>
                            </div>
                            <h5>Total Courses</h5>
                            <h2 class="counter mb-0">7253</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->



    <!--Section-->
    <section class="cover-image sptb bg-background-1" data-bs-image-src="../../assets/images/banners/banner5.jpg">
        <div class="content-text mb-0">
            <div class="container">
                <div class="text-white">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-0">
                                <h1 class="mb-2 font-weight-semibold">Subscribe</h1>
                                <p class="fs-18 mb-0">Many desktop publishing packages and web page editors.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-4">
                                <div class="input-group sub-input mt-1">
                                    <input type="text" class="form-control input-lg  br-ts-7  br-bs-7" placeholder="Enter your Email">
                                    <div class="input-group-text ">
                                        <button type="button" class="btn btn-secondary btn-lg br-te-7  br-be-7">
                                            Subscribe
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <div class="position-relative">
        <div class="shape overflow-hidden bottom-footer-shape">
            <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--/Section-->

@endsection
