
<html lang="en">
@include('common.style')
@stack('form_builder_styles')
<body class="app sidebar-mini">


<!--Loader-->
{{--<div id="global-loader">--}}
{{--    <img src="https://spruko.com/demo/edomi/Edomi/assets/images/loader.svg" class="loader-img" alt="">--}}
{{--</div>--}}
<!--/Loader-->

<!--Page-->
<div class="page">
    <div class="page-main h-100">

       @include('student.layout.partial.header')

       @include('student.layout.partial.sidebar')

        <!--App-Content-->
        <div class="app-content my-3 my-md-5">
           @yield('content')
        </div>
    </div>

    @include('student.layout.partial.footer')
</div>


@include('common.scripts')
@yield('scripts')
@stack('form_builder_scripts')
</body>

</html>
