@extends('teacher.layout.master')
@section('content')
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Edit Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </div>
        <!--Page-Header-->

        <div class="row ">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <img class="avatar brround avatar-xl" src="../../assets/images/users/male/25.jpg" alt="Avatar-img">
                                </div>
                                <div class="col">
                                    <h3 class="mb-1 ">Robert McLean</h3>
                                    <p class="mb-4 ">Administrator</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="5">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email-Address</label>
                                <input class="form-control" readonly placeholder="your-email@domain.com" value="robertmclean@spruko.com"/>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input class="form-control" placeholder="http://Edomi.com" value="http://Edomi.com"">
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Institute Name</label>
                                    <input type="text" class="form-control"  placeholder="Institute" value="" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" value="Robert123" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-label">Profile Image</label>
                                <input type="file" class="dropify" data-default-file="{{asset('backend/assets/images/media/media1.jpg')}}" data-height="180"  />

                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="Company" value="Robert">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" value="Mclean">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" value="Second stret, New York, NY 10012, US" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" placeholder="City" value="Newyork">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Postal Code</label>
                                    <input type="number" class="form-control" placeholder="ZIP Code" value="10012">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control form-select">
                                        <option value="0">--Select--</option>
                                        <option value="1">Germany</option>
                                        <option value="2">Canada</option>
                                        <option value="3" selected>Usa</option>
                                        <option value="4">Aus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Me</label>
                                    <textarea rows="5" class="form-control" placeholder="Enter About your description">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add  projects And Upload</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td><a href="store.html" class="text-inherit">Untrammelled prevents </a></td>
                                <td>28 May 2020</td>
                                <td><span class="status-icon bg-success"></span> Completed</td>
                                <td>$56,908</td>
                                <td class="text-end">
                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                <td>12 June 2020</td>
                                <td><span class="status-icon bg-danger"></span> On going</td>
                                <td>$45,087</td>
                                <td class="text-end">
                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                <td>12 July 2020</td>
                                <td><span class="status-icon bg-warning"></span> Pending</td>
                                <td>$60,123</td>
                                <td class="text-end">
                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                <td>14 June 2020</td>
                                <td><span class="status-icon bg-warning"></span> Pending</td>
                                <td>$70,435</td>
                                <td class="text-end">
                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                <td>25 June 2020</td>
                                <td><span class="status-icon bg-success"></span> Completed</td>
                                <td>$15,987</td>
                                <td class="text-end">
                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                    <a class="icon" href="javascript:void(0)"></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
