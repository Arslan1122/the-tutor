<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
    <a class="header-brand sidemenu-header-brand" href="/">
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
            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="index.html">Dashboard 1</a></li>
                <li><a class="slide-item" href="index2.html">Dashboard 2</a></li>
                <li><a class="slide-item" href="index3.html">Dashboard 3</a></li>
                <li><a class="slide-item" href="index4.html">Dashboard 4</a></li>
                <li><a class="slide-item" href="index5.html">Dashboard 5</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg></i><span class="side-menu__label">Admin settings</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="admin-pricing.html">Admin Pricing</a></li>
                <li><a class="slide-item" href="Ads.html">Ads List</a></li>
                <li><a class="slide-item" href="comments.html">Comments</a></li>
                <li><a class="slide-item" href="email-users.html">Email-Users</a></li>
                <li><a class="slide-item" href="newad.html">New Ad</a></li>
                <li><a class="slide-item" href="newuser.html">New User</a></li>
                <li><a class="slide-item" href="favourite-ads.html">Favourite-Ads</a></li>
                <li><a class="slide-item" href="payment-orders.html">Payment Orders</a></li>
                <li><a class="slide-item" href="payments-adpacks.html">Payment Adpacks</a></li>
                <li><a class="slide-item" href="payment-settings.html">Payment Settings</a></li>
                <li><a class="slide-item" href="payments-membership.html">Payment Membership</a></li>
                <li><a class="slide-item" href="profile-admin.html">Profile Admin</a></li>
                <li><a class="slide-item" href="settings.html">Settings</a></li>
                <li><a class="slide-item" href="users-all.html">All Users</a></li>
            </ul>
        </li>
    </ul>
</aside>
<!-- /Sidebar menu-->
