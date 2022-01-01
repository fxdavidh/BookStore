@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-md-center">
        <div class="col-12">
            
            <div class="navbar navbar-light ">
                <div class="container-fluid">
                    @auth
                        @if (Auth::user()->roleId == 1)
                            <a href="{{route('createBook')}}" class="btn btn-primary">Insert a New Book</a>
                        @endif
                    @endauth
                    <p></p>
                    <form class="d-flex" action="{{route('getBooksByFilter')}}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control me-2" type="search" name="filter" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-end filter">
                <form action="{{route('getBooks')}}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <button class="btn btn-success">Clear Filter</button>
                </form>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-wrapper">
                    <div class="row row-cols-1 row-cols-sm-5 g-4">
                        @foreach ($books as $key => $book)
                            <div class="col">
                                <div class="card">
                                    <div class="card-upper">
                                        <img src="{{asset('storage/'.$book -> cover)}}" class="upper-img" alt={{$book -> cover}}>
                                    </div>
                                    <div class="card-body card-lower">
                                        @foreach ($book->genre as $bookGenre)
                                            <button type="button" class="btn btn-outline-dark btn-sm genre">{{ $bookGenre -> name}}</button>
                                        @endforeach
                                        <h5 class="card-title">{{$book -> name}}</h5>
                                        <p class="card-text">{{$book -> author}}<br>IDR. {{$book -> price}}</p>
                                        @auth
                                            @if (Auth::user()->roleId == 1)
                                                <a href="{{route('updateBook', ['id' => $book->id])}}" class="btn btn-info">View Details</a>
                                            @else
                                                <a href="{{route('viewBook', ['id' => $book->id])}}" class="btn btn-info">View Details</a>
                                            @endif
                                        @else
                                            <a href="{{route('viewBook', ['id' => $book->id])}}" class="btn btn-info">View Details</a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="paginator">
            {{ $books->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection

