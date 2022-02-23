@extends('teacher.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Tuition Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">tuition</li>
            </ol>
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
                        <h4 class="card-title">Personal Details</h4>
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
                                        <span class="font-weight-semibold w-50">Postal Code </span>
                                    </td>
                                    <td class="py-2 px-0">{{ $tuition->user->studentProfile->postal_code }}</td>
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
                                    <a href="" class="btn btn-danger mt-3">Chat Now</a>
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
@endsection
