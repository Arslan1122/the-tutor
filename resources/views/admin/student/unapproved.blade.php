@extends('admin.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Un Approved Students</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Students</a></li>
                <li class="breadcrumb-item active" aria-current="page">Un Approved Students</li>
            </ol>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Students</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="hover table-bordered table border-bottom-0" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Postal Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td> {{ $student->email }}</td>
                                    <td>{{ $student->studentProfile->address }}</td>
                                    <td>{{ $student->studentProfile->city }}</td>
                                    <td>{{ $student->studentProfile->postal_code }}</td>
                                    <td>
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="icon"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('admin.students.edit', $student->id)}}" class="dropdown-item"><i class="dropdown-icon fe fe-eye"></i> View </a>
                                                <form method="POST" action="{{ route('admin.students.destroy', $student->id) }}">
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
@endsection
