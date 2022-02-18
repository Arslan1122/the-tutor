@extends('teacher.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
        <!--/Page-Header-->

        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="card user-pro-list overflow-hidden">
                    <div class="card-body">
                        <div class="user-pic text-center">
											<span class="avatar avatar-xxl brround" style="background-image: url(@if(isset($teacher->teacherProfile->profile_img)) {{ asset($teacher->teacherProfile->profile_img) }} @else {{ asset('backend/assets/images/users/female/3.jpg') }} @endif">
												<span class="avatar-status bg-green"></span>
											</span>
                            <div class="pro-user mt-3">
                                <h5 class="pro-user-username text-dark mb-1 fs-16">Jacob Smith</h5>
                                <h6 class="pro-user-desc text-muted fs-12">JacobSmith@gmail.com</h6>
                                <div class="mb-3 clearfix">
                                    <span class="fa fa-star text-warning"></span>
                                    <span class="fa fa-star text-warning"></span>
                                    <span class="fa fa-star text-warning"></span>
                                    <span class="fa fa-star-half-o text-warning"></span>
                                    <span class="fa fa-star-o text-warning"></span>
                                </div>
                                <div class="btn-list">
                                    <a href="profile.html" class="btn btn-primary mt-3">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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
                                    <td class="py-2 px-0">Jacob Smith</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Location </span>
                                    </td>
                                    <td class="py-2 px-0">USA</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Languages </span>
                                    </td>
                                    <td class="py-2 px-0">English, German</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Website </span>
                                    </td>
                                    <td class="py-2 px-0">JacobSmith.com</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Email </span>
                                    </td>
                                    <td class="py-2 px-0">yourdoamin@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-0">
                                        <span class="font-weight-semibold w-50">Phone </span>
                                    </td>
                                    <td class="py-2 px-0">+125 254 3562s</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="fade show active">
                                <form class="profile-edit">
                                    <textarea class="form-control" placeholder="What are you doing right now?" rows="5"></textarea>
                                    <div class="profile-share border-top-0">
                                        <div class="mt-2">
                                            <a href="javascript:void(0)" class="me-2" title="" data-toggle="tooltip" data-placement="top" data-original-title="Audio"><span class="fe fe-mic fs-16 text-muted"></span></a>
                                            <a href="javascript:void(0)" class="me-2" title="" data-toggle="tooltip" data-placement="top" data-original-title="Video"><span class="fe fe-video fs-16 text-muted"></span></a>
                                            <a href="javascript:void(0)" class="me-2" title="" data-toggle="tooltip" data-placement="top" data-original-title="Picture"><span class="fe fe-image fs-16 text-muted"></span></a>
                                        </div>
                                        <button class="btn btn-sm btn-success ms-auto"><i class="fa fa-share ml-1"></i> Share</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row profie-img">
                            <div class="col-md-12">
                                <div class="media-heading">
                                    <h5 class="mb-3"><strong>Biography</strong></h5>
                                </div>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>
                                <p >because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter but because those who do not know how to pursue consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3"><strong>Gallery</strong></h5>
                        <img class="img-fluid w-20 h-20 br-7 m-3" src="../../assets/images/media/0-8.jpg" alt="banner image">
                        <img class="img-fluid w-20 h-20 br-7 m-3" src="../../assets/images/media/0-10.jpg" alt="banner image ">
                        <img class="img-fluid w-20 h-20 br-7 m-3" src="../../assets/images/media/0-11.jpg" alt="banner image ">
                        <img class="img-fluid w-20 h-20 br-7 m-3" src="../../assets/images/media/0-11.jpg" alt="banner image ">
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong>Skills</strong></h5>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">HTML5</a>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">CSS</a>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">Java Script</a>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">Photo Shop</a>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">Php</a>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">Wordpress</a>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">Sass</a>
                        <a class="btn btn-sm btn-light me-2 mt-1" href="javascript:void(0)">Angular</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-semibold">Contact</h5>
                        <div class="main-profile-contact-list d-lg-flex">
                            <div class="media me-5">
                                <div class="media-icon bg-primary-transparent text-primary me-5 mt-1">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <small class="text-muted fs-16">Mobile</small>
                                    <div class="font-weight-semibold">
                                        +245 354 654
                                    </div>
                                </div>
                            </div>
                            <div class="media me-5">
                                <div class="media-icon bg-secondary-transparent text-secondary me-5 mt-1">
                                    <i class="fa fa-slack"></i>
                                </div>
                                <div class="media-body">
                                    <small class="text-muted fs-16">Stack</small>
                                    <div class="font-weight-semibold">
                                        @spruko.com
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-success-transparent text-success me-5 mt-1">
                                    <i class="fa fa-map"></i>
                                </div>
                                <div class="media-body">
                                    <small class="text-muted fs-16">Current Address</small>
                                    <div class="font-weight-semibold">
                                        San Francisco, USA
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
