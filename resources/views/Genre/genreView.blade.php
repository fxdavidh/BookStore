@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header ">{{ __('Genre View') }}</div>

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
                                    <th scope="col">Genre's Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genres as $key => $genre)
                                    <tr>
                                        <td>{{$genre -> id}}</td>
                                        <td>{{$genre -> name}}</td>
                                        <td>
                                            <a href="{{route('genreUpdate', ['id' => $genre->id])}}" class="btn btn-success">Edit</a>
                                            <form action="{{route('genreDelete', ['id' => $genre->id])}}" method="POST" enctype="multipart/form-data">
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
