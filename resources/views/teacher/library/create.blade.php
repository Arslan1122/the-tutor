@extends('teacher.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-2" style="margin-top:5%">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add library book</h3>
                </div>
                <form action="{{ route('teacher.upload.book') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Book Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="wd-200 mg-b-30">
                            <div class="form-group">
                                <label>Book description</label>
                                <textarea class="form-control" rows="4" cols="20"name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-6 col-md-6">
                            <label>Book PDF (upload only pdf)</label>
                            <input type="file" class="form-control" name="book" accept="application/pdf, application/vnd.ms-excel" required>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label class="form-label font-weight-bold">Book Cover Image</label>
                            <input type="file" name="image" value="1" class="dropify  @error('image') is-invalid state-invalid @enderror" data-height="180"  />
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="mt-4 ml-3">
                        <button type="submit" class="btn btn-success" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
