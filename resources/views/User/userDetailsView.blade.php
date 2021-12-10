
@extends('layouts.app')
@section('content')
  <h1 class="headings">User Details</h1>
  <div class="form-container">
      <div class="form-group">
          <label for="name">Name</label>
          <label for="name">{{$user[0]->name}}</label>
      </div>
      <div class="form-group">
          <label for="email">Email</label>
          <label for="email">{{$user[0]->email}}</label>
      </div>
      <div class="form-group">
          <label for="name">Role Name</label>
          <label for="name">{{$user[0]->roleName}}</label>
      </div>
      <a href="{{route('viewUpdateUser', ['id' => $user[0]->id])}}" class="btn btn-success">Update User</a>
  </div>
@endsection