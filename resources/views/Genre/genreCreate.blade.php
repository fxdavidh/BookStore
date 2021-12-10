@extends('layouts.app')
@section('content')
  <h1 class="headings">Insert a New Genre</h1>
  <div class="form-container">
    <form action="{{route('createGenre')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Genre</label>
        <input type="text" name="name" class="form-control" placeholder="Insert Genre's name" />
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="button">Submit</button>
    </form>
  </div>
@endsection