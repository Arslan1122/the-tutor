@extends('teacher.layout.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/bars-horizontal.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/css-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/bootstrap-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars-o.css') }}">
@endsection
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Tuition Details</h4>
            <h6>{{ $tuition->created_at->format('d-M-Y') }}</h6>
        </div>
        <!--/Page-Header-->
        <div class="modal fade" id="teacherBid" tabindex="-1" aria-labelledby="teacherBid"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="teacherBid">Bid On Tuition</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{ route('teacher.tuition.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="tuition_id" value="{{ $tuition->id }}">
                            <div class="form-group">
                                <label for="pay" class="form-label">Tuition Fee (Per Month) </label>
                                <input type="number" class="form-control" name="teacher_price" placeholder="Bid your price"/>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Write your proposal</label>
                                <textarea name="description" id="" class="form-control" cols="30" rows="4"
                                          required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary">Bid</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                            <div class="pro-user mt-3 d-flex justify-content-center align-items-center">
                                @php
                                    $proposal  = \App\Models\TuitionProposal::where(['tuition_id' => $tuition->id , 'teacher_id' => \Auth::id()])->first();
                                @endphp
                                <div class="btn-list">
                                    @if(empty($proposal))
                                    <button type="button" data-bs-toggle="modal"
                                       data-bs-target="#teacherBid" class="btn btn-primary mt-3">Bid Now</button>
                                    @else
                                        <button type="button" class="btn btn-success mt-3">Already Bidded</button>
                                    @endif
{{--                                    <a href="" class="btn btn-danger mt-3">Chat Now</a>--}}
                                </div>
                            </div>
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
    @if($tuition->review)
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
                                        <option value="1" @if($tuition->review->rating == 1)  selected @endif>1</option>
                                        <option value="2" @if($tuition->review->rating == 2)  selected @endif>2</option>
                                        <option value="3" @if($tuition->review->rating == 3)  selected @endif>3</option>
                                        <option value="4" @if($tuition->review->rating == 4)  selected @endif>4</option>
                                        <option value="5" @if($tuition->review->rating == 5)  selected @endif>5</option>
                                        <option value="6" @if($tuition->review->rating == 6)  selected @endif>6</option>
                                        <option value="7" @if($tuition->review->rating == 7)  selected @endif>7</option>
                                        <option value="8" @if($tuition->review->rating == 8)  selected @endif>8</option>
                                        <option value="9" @if($tuition->review->rating == 9)  selected @endif>9</option>
                                        <option value="10" @if($tuition->review->rating == 10)  selected @endif>10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>{{ $tuition->review->review }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@section('scripts')
    <!-- Jquery-bar-rating Js-->
    <script src="{{ asset('backend/assets/plugins/jquery-bar-rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-bar-rating/js/rating.js') }}"></script>

    <!--Jquery-bar-rating js-->
    <script src="{{ asset('backend/assets/plugins/jquery-bar-rating/js/examples.js') }}"></script>
@endsection
