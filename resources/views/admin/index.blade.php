@extends('admin.layout.master')
@section('content')
    <div class="side-app">
        <!--Page-Header-->
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
        <!--/Page-Header-->
        <div class="row row-cards">
            <div class="col-sm-12 col-lg-6 col-xl-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-start">
                                <h5 class="mb-3">Total Students</h5>
                                <h2 class="mb-2 font-weight-bold text-primary">25</h2>
                                <p class="mb-0"><span class="text-green"><i class="fa fa-arrow-up text-green me-1"> </i>23%</span> in Last Year</p>
                            </div>
                            <div class="text-end counter-2 my-auto col-4">
                                <div class="counter-icon1 bg-primary">
                                    <i class="icon icon-people text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-start">
                                <h5 class="mb-3">New Courses</h5>
                                <h2 class="mb-2 font-weight-bold text-warning">13</h2>
                                <p class="mb-0"><span class="text-red"><i class="fa fa-arrow-down text-red me-1"></i> 0.67%</span> in Last Year</p>
                            </div>
                            <div class="text-end counter-2 my-auto col-4">
                                <div class="counter-icon1 bg-warning">
                                    <i class="icon icon-book-open text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-start">
                                <h5 class="mb-3">Total Standards</h5>
                                <h2 class="mb-2 font-weight-bold text-secondary">15</h2>
                                <p class="mb-0"><span class="text-success"><i class="fa fa-arrow-up text-success me-1"> </i>23%</span> in Last Year</p>
                            </div>
                            <div class="text-end counter-2 my-auto col-4">
                                <div class="counter-icon1 bg-secondary">
                                    <i class="icon icon-graduation text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-start">
                                <h5 class="mb-3">New Students</h5>
                                <h2 class="mb-2 font-weight-bold text-info">40</h2>
                                <p class="mb-0"><span class="text-danger"><i class="fa fa-arrow-down text-danger me-1"> </i>5.25%</span> in Last Year</p>
                            </div>
                            <div class="text-end counter-2 my-auto col-4">
                                <div class="counter-icon1 bg-info">
                                    <i class="icon icon-user-follow text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Teacher Requests</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive mb-0 ">
                        <table class="data-table-example table table-striped table-bordered table-hover text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Degree</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Postal Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->name }}</td>
                                    <td> {{ $teacher->email }}</td>
                                    <td>{{ $teacher->teacherProfile->degree }}</td>
                                    <td>{{ $teacher->teacherProfile->address }}</td>
                                    <td>{{ $teacher->teacherProfile->city }}</td>
                                    <td>{{ $teacher->teacherProfile->postal_code }}</td>
                                    <td>
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="icon"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('admin.teachers.edit', $teacher->id)}}" class="dropdown-item"><i class="dropdown-icon fe fe-eye"></i> View </a>
                                                <form method="POST" action="{{ route('admin.teachers.destroy', $teacher->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="javascript:void(0)" class="dropdown-item" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="dropdown-icon fe fe-trash"></i> Delete</a>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
