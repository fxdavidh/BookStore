@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header ">{{ __('Book View') }}</div>

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
                                            <a href="{{route('updateBook', ['id' => $book->id])}}" class="btn btn-success">Edit</a>
                                            <form action="{{route('deleteBook', ['id' => $book->id])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
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
