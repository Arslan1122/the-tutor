
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    toastr.options = {
        "closeButton": true,
    }
    @if(session()->has('success'))
    toastr.success("{{session()->get('success')}}");
    @endif
    @if(session()->has('info'))
    toastr.info("{{session()->get('info')}}");
    @endif
    @if(session()->has('warning'))
    toastr.warning("{{session()->get('warning')}}");
    @endif
    @if(session()->has('error'))
    toastr.warning("{{session()->get('error')}}");
    @endif
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    toastr.error("{{$error}}");
    @endforeach
    @endif
    </script>
</body>

</html>
