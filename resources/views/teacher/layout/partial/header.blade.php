

        <!--App-Header-->
        <div class="app-header1 header py-2 d-flex">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="header-brand" href="/">
                        <img src="{{asset('backend/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{asset('backend/assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="logo">
                    </a>
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"><i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg></i></a>

                    <div class="d-flex order-lg-2 ms-auto heaader-right">
                        <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                        </button>
                        <div class="p-0 mb-0 navbar navbar-expand-lg  responsive-navbar navbar-dark  ">
                            <div class="navbar-collapse collapse" id="navbarSupportedContent-4">
                                <div class="d-flex">

                                    <div class="header-navicon">
                                        <a href="javascript:void(0)" data-bs-toggle="search" class="nav-link d-lg-none navsearch-icon">
                                            <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></i>
                                        </a>
                                    </div>


                                    <div class="dropdown header-user ">
                                        <a href="javascript:void(0)" class="nav-link leading-none user-img" data-bs-toggle="dropdown">
                                            <img src="{{asset('backend/assets/images/users/female/20.jpg')}}" alt="profile-img" class="avatar">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                                            <a class="dropdown-item" href="profile.html">
                                                <i class="dropdown-icon icon icon-user"></i> My Profile
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <i class="dropdown-icon  icon icon-power"></i> Log out
                                            </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/App-Header-->
