@extends('student.layout.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/bars-horizontal.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/css-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/bootstrap-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars-o.css') }}">
@endsection
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
                                        <a href="{{route('chat.create.new',$proposal->teacher_id)}}" class="btn btn-success">Chat </a>
                                        <a href="{{ route('teacher.profile',$proposal->teacher_id) }}" class="btn btn-info" target="_blank">View Profile </a>
                                        @if($tuition->is_completed == 0)
                                        <a href=""
                                           class="btn btn-primary" data-bs-toggle="modal"
                                           data-bs-target="#completeTuition">Complete Tuition</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="completeTuition" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Complete Tuition</h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{route('student.complete.tuition')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $proposal->teacher_id }}" name="teacherId">
                                    <input type="hidden" value="{{ $proposal->tuition_id }}" name="id">
                                    <div class="modal-body">
                                        <label for="" class="form-label">Experience with your teacher</label>
                                        <div class="box box-example-1to10">
                                            <div class="box-body">
                                                <select id="example-1to10" name="rating" autocomplete="off">
                                                    <option value="1" selected="selected">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Write Review</label>
                                            <textarea name="review" id="" class="form-control" cols="30" rows="4"
                                                      required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($review)
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Your Review</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="text-center">
                                            <div class="box box-example-1to1">
                                                <div class="box-body">
                                                    <select id="example-1to1" name="rating" autocomplete="off">
                                                        <option value="1" @if($review->rating == 1)  selected @endif>1</option>
                                                        <option value="2" @if($review->rating == 2)  selected @endif>2</option>
                                                        <option value="3" @if($review->rating == 3)  selected @endif>3</option>
                                                        <option value="4" @if($review->rating == 4)  selected @endif>4</option>
                                                        <option value="5" @if($review->rating == 5)  selected @endif>5</option>
                                                        <option value="6" @if($review->rating == 6)  selected @endif>6</option>
                                                        <option value="7" @if($review->rating == 7)  selected @endif>7</option>
                                                        <option value="8" @if($review->rating == 8)  selected @endif>8</option>
                                                        <option value="9" @if($review->rating == 9)  selected @endif>9</option>
                                                        <option value="10" @if($review->rating == 10)  selected @endif>10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>{{ $review->review }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="alert alert-success font-weight-bold text-center">Congratulations! This Tuition is Assigned.</div>
        @endif
    </div>
@endsection

@section('scripts')
    <!-- Jquery-bar-rating Js-->
    <script src="{{ asset('backend/assets/plugins/jquery-bar-rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-bar-rating/js/rating.js') }}"></script>

    <!--Jquery-bar-rating js-->
    <script src="{{ asset('backend/assets/plugins/jquery-bar-rating/js/examples.js') }}"></script>
@endsection
