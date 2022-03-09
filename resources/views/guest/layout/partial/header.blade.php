<!--Section-->
<div class="cover-image bg-background-1" data-bs-image-src="{{ asset('frontend/assets/images/banners/banner1.jpg') }}">
    <!--Topbar-->
    <div class="header-main">
        <!-- Mobile Header -->
        <div class="sticky">
            <div class="horizontal-header clearfix ">
                <div class="container">
                    <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                    <span class="smllogo"><img src="{{ asset('frontend/assets/images/brand/logo1.png') }}" width="120" alt="img"/></span>
                    <span class="smllogo-white"><img src="{{ asset('frontend/assets/images/brand/logo.png') }}" width="120" alt="img"/></span>
                    <a href="tel:245-6325-3256" class="callusbtn"><i class="icon icon-phone" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- /Mobile Header -->

        <!--Horizontal-main -->
        <div class="horizontal-main header-style1 p-0 bg-dark-transparent clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <div class="desktoplogo" style="padding: 0">
                    <a href=""><img src="{{ asset('frontend/assets/images/brand/logo01.png') }}" alt="img" style="height: 90px">
                        <img src="{{ asset('frontend/assets/images/brand/logo1.png') }}" class="header-brand-img header-white" alt="logo">
                    </a>
                </div>
                <div class="desktoplogo-1">
                    <a href=""><img src="{{ asset('frontend/assets/images/brand/logo1.png') }}" alt="img" style="height: 50px"></a>
                </div>
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        <li aria-haspopup="true"><a href="/"> Home</a></li>
                        <li aria-haspopup="true"><a href="contact.html"> Contact Us</a></li>
                        <li aria-haspopup="true" class="d-lg-none mt-5 pb-5 mt-lg-0">
                            <span><a class="btn btn-info" href="{{ route('register') }}">Register Now</a></span>
                        </li>
                    </ul>
                    <ul class="mb-0">
                        <li aria-haspopup="true" class="d-none d-lg-block mt-2 top-postbtn">
                            <span><a class="btn btn-secondary" href="{{ route('register') }}">Register Now</a></span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div><!--/Horizontal-main -->

