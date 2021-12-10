@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="navbar navbar-light" style="padding-bottom: 40px;">
            <div class="container-fluid">
                <h1>Update Book's Information</h1>
                <form class="d-flex" action="{{route('deleteBook', ['id' => $updateBook->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete Book</button>
                </form>
            </div>
        </div>
        <div class="row col-4">
            <img src="{{asset('storage/'.$updateBook -> cover)}}" alt={{$updateBook -> cover}}>
        </div>
        <div class="row col-sm-1"></div>
        <div class="row col-7">
            <form action="{{route('updateBook', ['id' => $updateBook->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{$updateBook->name}}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" name="author" class="form-control" value="{{$updateBook->author}}">
                    </div>
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="author" class="col-sm-2 col-form-label">Genre</label>
                    <div class="col-sm-10" style="padding-top: 10px;">
                        @foreach ($updateGenre as $key => $genre)
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="genre[]" value="{{$genre->id}}" {{ ($genre->check == 'checked' ? 'checked': '') }}>
                              <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                            </div>
                        @endforeach 
                    </div>
                    @error('genre')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                    <div class="col-sm-10">
                          <textarea name="synopsis" cols="30" rows="3" type="text" class="form-control">
                            {{$updateBook->synopsis}}
                          </textarea>
                    </div>
                    @error('synopsis')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="cover" class="col-sm-2 col-form-label">Upload New Book's Cover</label>
                    <div class="col-sm-10">
                        <input
                          type="file"
                          name="cover" 
                          value="{{$updateBook->cover}}"
                          class="form-control-file"
                        />
                    </div>
                    @error('cover')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" class="form-control" value="{{$updateBook->price}}">
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection