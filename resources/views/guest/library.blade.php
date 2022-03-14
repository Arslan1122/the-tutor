@extends('guest.layout.master')
@section('content')
    <section>
        <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white py-7">
                        <h1 class="">Library</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Library</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->
    </div><!--/Section-->
    <div class="container mt-5">
        <div class="row">
            @foreach($books as $book)
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card overflow-hidden">
                    <div class="item-card8-img  br-te-7 br-ts-7">
                        <img src="{{ @$book->image }}" alt="img" class="cover-image" height="200px">
                    </div>
                    <div class="card-body">
                        <div class="item-card8-desc">
                            <p class="text-muted">{{ $book->created_at->format('d-M-y') }}</p>
                            <h3 class="font-weight-semibold">{{ $book->title }}</h3>
                            <p class="mb-0">{{ $book->description }}</p>
                            <a href="{{ route('download.book',$book->id) }}" class="btn btn-secondary">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $books->links() }}
@endsection
