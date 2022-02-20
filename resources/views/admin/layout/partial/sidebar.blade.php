<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
    <a class="header-brand sidemenu-header-brand" href="index.html">
        <img src="{{asset('backend/assets/images/brand/logo-white.png')}}" class="header-brand-img desktop-logo" alt="Lmslist logo">
        <img src="{{asset('backend/assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Lmslist logo">
    </a>
    <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
            <div>
                <img src="{{asset('backend/assets/images/users/female/20.jpg')}}" alt="user-img" class="avatar avatar-lg brround">
                <span class="avatar-status profile-status bg-green"></span>
            </div>
            <div class="user-info">
                <h2>{{ \Auth::user()->name }}</h2>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label">Dashboard</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H5V5h15zm-5 14h-5v-9h5v9zM5 10h3v9H5v-9zm12 9v-9h3v9h-3z"/></svg></i><span class="side-menu__label">Teachers</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('admin.approved.teachers') }}">Approved Teachers</a></li>
                <li><a class="slide-item" href="{{ route('admin.un.approved.teachers') }}">UnApproved Teachers</a></li>
                <li><a class="slide-item" href="{{ route('admin.blocked.teachers') }}">Blocked Teachers</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H5V5h15zm-5 14h-5v-9h5v9zM5 10h3v9H5v-9zm12 9v-9h3v9h-3z"/></svg></i><span class="side-menu__label">Students</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('admin.approved.students') }}">Approved Students</a></li>
                <li><a class="slide-item" href="{{ route('admin.un.approved.students') }}">UnApproved Students</a></li>
                <li><a class="slide-item" href="{{ route('admin.blocked.students') }}">Blocked Students</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item slide-show" href="{{ route('admin.standard.index') }}"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label">Standards</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item slide-show" href="{{ route('admin.subject.index') }}"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label">Subjects</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item slide-show" href="{{ route('admin.courses.index') }}"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label">Courses</span></a>
        </li>


    </ul>
</aside>
<!-- /Sidebar menu-->
