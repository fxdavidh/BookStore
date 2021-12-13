@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-md-center">
        <div class="col-8">
            <div class="navbar navbar-light ">
                <div class="container-fluid">
                    @auth
                        @if (Auth::user()->roleId == 1)
                            <a href="{{route('createGenre')}}" class="btn btn-primary">Insert a New Genre</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Genre's Name</th>
                            <th scope="col-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $key => $genre)
                            <tr>
                                <td>{{$genre -> id}}</td>
                                <td>{{$genre -> name}}</td>
                                <td class="action">
                                    <a href="{{route('updateGenre', ['id' => $genre->id])}}" class="btn btn-success">Edit Genre</a>
                                    <form action="{{route('deleteGenre', ['id' => $genre->id])}}" method="POST" enctype="multipart/form-data">
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
@endsection

