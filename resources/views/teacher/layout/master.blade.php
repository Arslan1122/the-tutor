<html lang="en">
@include('common.style')

<body class="app sidebar-mini">


<!--Page-->
<div class="page">
    <div class="page-main h-100">

       @include('teacher.layout.partial.header')

       @include('teacher.layout.partial.sidebar')

        <!--App-Content-->
        <div class="app-content my-3 my-md-5">
            @if(!\Auth::user()->is_subscribed && \Auth::user()->no_of_bids != 0)
            <div class="row mt-5">
                <div class="col-12">
                    <div class="alert alert-info font-weight-bold text-center" style="margin-top:2.4rem">
                        You Account is Active, You have {{ \Auth::user()->no_of_bids }} bids to get a job. Purchase a subscription now. <a href="">Click here</a>
                    </div>
                </div>
            </div>
            @elseif(!\Auth::user()->is_subscribed && \Auth::user()->no_of_bids == 0)
                <div class="col-12">
                    <div class="alert alert-warning font-weight-bold text-center" style="margin-top:3.8rem">
                        Your free bids is complete, Purchase our subscription to get a job. <a href="">Click here</a>
                    </div>
                </div>
            @elseif(\Auth::user()->is_subscribed && \Auth::user()->no_of_bids == 0)
                <div class="col-12">
                    <div class="alert alert-info font-weight-bold text-center" style="margin-top:3.8rem">
                        Your bids limit reached, Purchase subscription again to get more jobs. <a href="">Click here</a>
                    </div>
                </div>
            @endif
           @yield('content')
        </div>
    </div>

    @include('teacher.layout.partial.footer')
</div>


@include('common.scripts')

@yield('scripts')
</body>

</html>
