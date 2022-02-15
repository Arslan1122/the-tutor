

        <!--App-Header-->
        <div class="app-header1 header py-2 d-flex">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="header-brand" href="index.html">
                        <img src="{{asset('backend/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{asset('backend/assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="logo">
                    </a>
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"><i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg></i></a>
                    <div class="dropdown d-none d-md-flex country-selector">
                        <a href="javascript:void(0)" class="d-flex nav-link leading-none" data-bs-toggle="dropdown">
                            <img src="{{asset('backend/assets/images/flags/us_flag.jpg')}}" alt="img" class="avatar avatar-xs me-1 align-self-center">
                            <div>
                                <strong class="text-dark">English</strong>
                            </div>
                        </a>

                    </div>
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
                                    <div class="dropdown d-flex" >
                                        <a  class="nav-link icon full-screen-link">
                                            <i class=""  id="fullscreen-button"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg></i>
                                        </a>
                                    </div>
                                    <div class="dropdown header-notification d-flex">
                                        <a class="nav-link icon" data-bs-toggle="dropdown">
                                            <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg></i>
                                            <span class=" nav-unread badge badge-danger  badge-pill">4</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">You have 4 notification</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                <div class="notify-img">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                                <div>
                                                    <strong>2 new Messages</strong>
                                                    <div class="small text-muted">17:50 Pm</div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                <div class="notify-img">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <div>
                                                    <strong> 1 Event Soon</strong>
                                                    <div class="small text-muted">19-10-2021</div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                <div class="notify-img">
                                                    <i class="fa fa-comment-o"></i>
                                                </div>
                                                <div>
                                                    <strong> 3 new Comments</strong>
                                                    <div class="small text-muted">05:34 Am</div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                <div class="notify-img">
                                                    <i class="fa fa-exclamation-triangle"></i>
                                                </div>
                                                <div>
                                                    <strong> Application Error</strong>
                                                    <div class="small text-muted">13:45 Pm</div>
                                                </div>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item text-center">See all Notification</a>
                                        </div>
                                    </div>

                                    <div class="dropdown d-flex header-grid">
                                        <a class="nav-link icon" data-bs-toggle="dropdown">
                                            <i class=""><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><g><path d="M3,3v8h8V3H3z M9,9H5V5h4V9z M3,13v8h8v-8H3z M9,19H5v-4h4V19z M13,3v8h8V3H13z M19,9h-4V5h4V9z M13,13v8h8v-8H13z M19,19h-4v-4h4V19z"/></g></g></g></svg></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow  app-selector">
                                            <ul class="drop-icon-wrap">
                                                <li>
                                                    <a href="javascript:void(0)" class="drop-icon-item">
                                                        <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 3H2C.9 3 0 3.9 0 5v14c0 1.1.9 2 2 2h20c1.1 0 1.99-.9 1.99-2L24 5c0-1.1-.9-2-2-2zm0 16H2V5h20v14zM21 6h-7v5h7V6zm-1 2l-2.5 1.75L15 8V7l2.5 1.75L20 7v1zM9 12c1.65 0 3-1.35 3-3s-1.35-3-3-3-3 1.35-3 3 1.35 3 3 3zm0-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm6 8.59c0-2.5-3.97-3.58-6-3.58s-6 1.08-6 3.58V18h12v-1.41zM5.48 16c.74-.5 2.22-1 3.52-1s2.77.49 3.52 1H5.48z"/></svg></i>
                                                        <span class="block"> Profile</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="drop-icon-item">
                                                        <span class=" nav-unread badge badge-danger badge-pill">2</span>
                                                        <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21.99 8c0-.72-.37-1.35-.94-1.7L12 1 2.95 6.3C2.38 6.65 2 7.28 2 8v10c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2l-.01-10zm-2 0v.01L12 13 4 8l8-4.68L19.99 8zM4 18v-7.66l8 5.02 7.99-4.99L20 18H4z"/></svg></i>
                                                        <span class="block"> E-mail</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="drop-icon-item">
                                                        <i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i>
                                                        <span class="block">map</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)" class="drop-icon-item">
                                                        <span class=" nav-unread badge badge-danger badge-pill">2</span>
                                                        <i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 4v7H5.17l-.59.59-.58.58V4h11m1-2H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm5 4h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1z"/></svg></i>
                                                        <span class="block">Messages</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="drop-icon-item">
                                                        <i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z"/></svg></i>
                                                        <span class="block">Photos</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="drop-icon-item">
                                                        <i><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M10,13c0.55,0,1,0.45,1,1s-0.45,1-1,1s-1-0.45-1-1S9.45,13,10,13 M10,11c-1.66,0-3,1.34-3,3s1.34,3,3,3s3-1.34,3-3 S11.66,11,10,11L10,11z M18.5,9l1.09-2.41L22,5.5l-2.41-1.09L18.5,2l-1.09,2.41L15,5.5l2.41,1.09L18.5,9z M21.28,12.72L20.5,11 l-0.78,1.72L18,13.5l1.72,0.78L20.5,16l0.78-1.72L23,13.5L21.28,12.72z M16.25,14c0-0.12,0-0.25-0.01-0.37l1.94-1.47l-2.5-4.33 l-2.24,0.94c-0.2-0.13-0.42-0.26-0.64-0.37L12.5,6h-5L7.2,8.41C6.98,8.52,6.77,8.65,6.56,8.78L4.32,7.83l-2.5,4.33l1.94,1.47 C3.75,13.75,3.75,13.88,3.75,14s0,0.25,0.01,0.37l-1.94,1.47l2.5,4.33l2.24-0.94c0.2,0.13,0.42,0.26,0.64,0.37L7.5,22h5l0.3-2.41 c0.22-0.11,0.43-0.23,0.64-0.37l2.24,0.94l2.5-4.33l-1.94-1.47C16.25,14.25,16.25,14.12,16.25,14z M14.83,17.64l-1.73-0.73 c-0.56,0.6-1.3,1.04-2.13,1.23L10.73,20H9.27l-0.23-1.86c-0.83-0.19-1.57-0.63-2.13-1.23l-1.73,0.73l-0.73-1.27l1.49-1.13 c-0.12-0.39-0.18-0.8-0.18-1.23c0-0.43,0.06-0.84,0.18-1.23l-1.49-1.13l0.73-1.27l1.73,0.73c0.56-0.6,1.3-1.04,2.13-1.23L9.27,8 h1.47l0.23,1.86c0.83,0.19,1.57,0.63,2.13,1.23l1.73-0.73l0.73,1.27l-1.49,1.13c0.12,0.39,0.18,0.8,0.18,1.23 c0,0.43-0.06,0.84-0.18,1.23l1.49,1.13L14.83,17.64z"/></svg></i>
                                                        <span class="block">Settings</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="dropdown-divider m-0"></div>
                                            <a href="javascript:void(0)" class="dropdown-item text-center">View all</a>
                                        </div>
                                    </div>
                                    <div class="dropdown header-user ">
                                        <a href="javascript:void(0)" class="nav-link leading-none user-img" data-bs-toggle="dropdown">
                                            <img src="{{asset('backend/assets/images/users/female/20.jpg')}}" alt="profile-img" class="avatar">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                                            <a class="dropdown-item" href="profile.html">
                                                <i class="dropdown-icon icon icon-user"></i> My Profile
                                            </a>
                                            <a class="dropdown-item" href="emailservices.html">
                                                <i class="dropdown-icon icon icon-speech"></i> Inbox
                                            </a>
                                            <a class="dropdown-item" href="editprofile.html">
                                                <i class="dropdown-icon  icon icon-settings"></i> Account Settings
                                            </a>
                                            <a class="dropdown-item" href="login.html">
                                                <i class="dropdown-icon  icon icon-power"></i> Log out
                                            </a>
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
