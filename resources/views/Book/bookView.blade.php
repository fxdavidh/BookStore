@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header ">{{ __('Book View') }}</div>
                    @auth
                        @if (Auth::user()->roleId == 1)
                            <a href="{{route('createBook')}}" class="btn btn-primary">Insert a New Book</a>
                        @endif
                    @endauth
                    <div>
                        <form action="{{route('getBooksByFilter')}}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="filter" class="form-control" placeholder="Filter book's name"/>
                            <button class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{route('getBooks')}}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-primary">Clear Filter</button>
                        </form>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Book's Name</th>
                                        <th scope="col">Book's Author</th>
                                        <th scope="col">Book's Genre</th>
                                        <th scope="col">Synopsis</th>
                                        <th scope="col">Cover</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $key => $book)
                                        <tr>
                                            <td>{{$book -> id}}</td>
                                            <td>{{$book -> name}}</td>
                                            <td>{{$book -> author}}</td>
                                            
                                            <td>
                                                @foreach ($book -> genre as $key)
                                                    <p>{{$key -> name}}</p>
                                                @endforeach
                                            </td>
                                            
                                            <td>{{$book -> synopsis}}</td>
                                            <td><img src="{{asset('storage/'.$book -> cover)}}" alt={{$book -> cover}} width='100px'></td>
                                            <td>{{$book -> price}}</td>
                                            <td>
                                                @auth
                                                    @if (Auth::user()->roleId == 1)
                                                        <a href="{{route('updateBook', ['id' => $book->id])}}" class="btn btn-success">View Details</a>
                                                    @else
                                                        <a href="{{route('viewBook', ['id' => $book->id])}}" class="btn btn-primary">View Details</a>
                                                    @endif
                                                @else
                                                    <a href="{{route('viewBook', ['id' => $book->id])}}" class="btn btn-primary">View Details</a>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
