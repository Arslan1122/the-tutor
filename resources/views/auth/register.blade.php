@extends('guest.layout.master')
@section('content')
    <section>
        <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white py-7">
                        <h1 class="">Register</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">The Tutor</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <!-- Shape Start -->
    <div class="relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#f5f4f9"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <!--Register-section-->
    <section class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="col-lg-5 col-xl-5 col-md-6 d-block mx-auto">
                    <div class="card">
                        <div class="card-body p-6">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert-danger my-4">{{$error}}</div>
                                @endforeach
                            @endif
                            <div class="mb-6">
                                <h5 class="fs-25 font-weight-semibold">Register</h5>
                                <p class="fs-16">Register yourself with The Tutor </p>
                            </div>
                            <div class="single-page customerpage">
                                <div class="wrapper wrapper2 box-shadow-0">
                                    <form method="POST" action="{{ route('register') }}" id="register" class="" tabindex="500">
                                        @csrf
                                        <div class="name">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}" />
                                        </div>
                                        <div class="mail">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}">
                                        </div>
                                        <div class="passwd">
                                            <label>Password</label>
                                            <input type="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <select class="form-control select2-show-search  border-bottom-0" data-placeholder="Select Category" name="role">
                                                <optgroup label="User Types">
                                                    <option value="teacher">Teacher</option>
                                                    <option value="student">Student</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="submit">
                                            <button type="submit" class="btn btn-primary btn-block" >Register</button>
                                        </div>
                                        <p class="text-dark mb-0">Already have an account?<a href="{{ route('login') }}" class="text-primary ms-1">Sign In</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Register-section-->
@endsection
