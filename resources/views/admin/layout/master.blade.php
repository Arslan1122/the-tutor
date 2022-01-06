
<html lang="en">
@include('common.style')

<body class="app sidebar-mini">


<!--Loader-->
{{--<div id="global-loader">--}}
{{--    <img src="https://spruko.com/demo/edomi/Edomi/assets/images/loader.svg" class="loader-img" alt="">--}}
{{--</div>--}}
<!--/Loader-->

<!--Page-->
<div class="page">
    <div class="page-main h-100">

       @include('admin.layout.partial.header')

       @include('admin.layout.partial.sidebar')

        <!--App-Content-->
        <div class="app-content my-3 my-md-5">
           @yield('content')
        </div>
    </div>

    @include('admin.layout.partial.footer')
</div>


@include('common.scripts')
</body>

</html>
