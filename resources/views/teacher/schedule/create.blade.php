@extends('teacher.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-2" style="margin-top:5%">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Class Schedule</h3>
                </div>
                <form action="{{ route('teacher.schedule.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Select Tuition</label>
                        <select class="form-control" name="tuition_id">
                            <option>Select Tuition</option>
                            @foreach($tuitions as $tuition)
                                <option value="{{ $tuition->tuition->id }}">{{ $tuition->tuition->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="wd-200 mg-b-30">
                        <label class="font-weight-bold">Class Date:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <div class="input-group-text timepicker1">
                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                </div>
                            </div><input class="form-control fc-datepicker" name="class_date" placeholder="MM/DD/YYYY" type="text" autocomplete="off">
                        </div>
                        <div class="form-group mt-5">
                            <label class="font-weight-bold">Class Time:</label>
                            <div class="wd-150 mg-b-30">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <div class="input-group-text timepicker1">
                                            <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><!-- input-group-text -->
                                    <input class="form-control" id="tpBasic" name="class_time" placeholder="Set time" type="text">
                                </div>
                            </div><!-- wd-150 -->
                        </div>
                        <div class="form-group">
                            <label>Class Link</label>
                            <textarea class="form-control" rows="4" cols="20"name="meet_link"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
