@extends('layouts.app')
@section('content')
  <h1 class="headings">Update Book's Information</h1>
  <div class="form-container">
    <form action="{{route('updateBook', ['id' => $updateBook->id])}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{$updateBook->name}}" placeholder="Insert book's name" />
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" value="{{$updateBook->author}}" class="form-control" placeholder="Insert author's name" />
        @error('author')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="author">Genre</label>
        @foreach ($updateGenre as $key => $genre)
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="genre[]" value="{{$genre->id}}" {{ ($genre->check == 'checked' ? 'checked': '') }}>
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
          {{$updateBook->synopsis}}
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
          value="{{$updateBook->cover}}"
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
          value="{{$updateBook->price}}"
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