@extends('layouts.app')
@section('content')
    <h1 class="headings">Insert a New Book</h1>
    <div class="form-container">
        <form action="{{route('createBook')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Insert book's name" />
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Insert author's name" />
                @error('author')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Genre</label>
                @foreach ($genres as $genre)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="genre[]" value="{{$genre->id}}">
                    <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                  </div>
                @endforeach
                @error('genre')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis</label>
                <textarea name="synopsis" cols="30" rows="3" type="text" class="form-control">
                </textarea>
                @error('synopsis')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama-umkm">Upload Book's Cover</label>
                <input
                  type="file"
                  name="cover"
                  class="form-control-file"
                />
                @error('cover')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ktp">Book's Price</label>
                <input
                  type="number"
                  name="price"
                  class="form-control"
                  placeholder="Insert book's price"
                />
                @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="button">Submit</button>
        </form>
    </div>
@endsection