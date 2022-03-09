@extends('guest.layout.master')
@section('content')
    <section>
        <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white py-7">
                        <h1 class="">Pricing</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Pricing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->
    <!--Pricing Tables 1-->
    <section class="sptb" style="margin-top:5%">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="card text-center mb-md-0">
                            <div class="card-header text-center">
                                <h3 class="card-title font-weight-bold mx-auto">Basic</h3>
                            </div>
                            <div class="card-body">
                                <h1 class="pricing-card-title mb-5">$25 <small class="text-muted fs-20">/ mo</small></h1>
                                <p class="mb-5">50 Bid / Month</p>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <a href="{{ route('subscription.create') }}" class="btn btn-primary" type="button">Pay Now</a>
                                @else
                                    <a href="{{ route('register') }}" class="btn btn-primary" type="button">Sign up Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="card text-center mb-md-0 overflow-hidden">
                            <div class="card-status bg-primary"></div>
                            <div class="ribbon ribbon-top-left text-primary">
                                <span class="bg-primary">New</span>
                            </div>
                            <div class="card-header text-center">
                                <h3 class="card-title font-weight-bold mx-auto">Pro</h3>
                            </div>
                            <div class="card-body">
                                <h1 class="pricing-card-title mb-5">$40 <small class="text-muted fs-20">/ 3 Months</small></h1>
                                <p class="mb-5">50 Bids</p>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                <a href="{{ route('subscription.create') }}" class="btn btn-primary" type="button">Pay Now</a>
                                @else
                                <a href="{{ route('register') }}" class="btn btn-primary" type="button">Sign up Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="card text-center mb-0">
                            <div class="card-header text-center">
                                <h3 class="card-title font-weight-bold mx-auto">Premium</h3>
                            </div>
                            <div class="card-body">
                                <h1 class="pricing-card-title mb-5">$70 <small class="text-muted fs-20">/ Year</small></h1>
                                <p class="mb-5">100 Bids</p>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <a href="{{ route('subscription.create') }}" class="btn btn-primary" type="button">Pay Now</a>
                                @else
                                    <a href="{{ route('register') }}" class="btn btn-primary" type="button">Sign up Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Pricing Tables 1-->

@endsection
