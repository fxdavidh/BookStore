@extends('layouts.app')
@section('content')
  <h1 class="headings">Update a User</h1>
  <div class="form-container">
    <form action="{{route('updateUser', ['id' => $updateUser[0]->id])}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{$updateUser[0]->name}}" placeholder="Insert user's name" />
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="{{$updateUser[0]->email}}" placeholder="Insert user's email" />
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="name">Role</label>
        <select class="form-select" name="roleId" id="">
          @foreach ($updateRole as $role)
              <option value="{{$role->id}}" {{$role->check}}>{{$role->name}}</option>
          @endforeach
        </select>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="button">Submit</button>
    </form>
  </div>
@endsection