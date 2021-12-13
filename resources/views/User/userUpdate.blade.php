@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="navbar navbar-light" style="padding-bottom: 40px;">
            <div class="container-fluid">
                <h1>Update User's Information</h1>
            </div>
        </div>
        <div class="row col-8">
            <form action="{{route('updateUser', ['id' => $updateUser[0]->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH') 
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{$updateUser[0]->name}}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" value="{{$updateUser[0]->email}}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="roleId" class="col-sm-2 col-form-label">User Role</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="roleId" id="">
                            @foreach ($updateRole as $role)
                                <option value="{{$role->id}}" {{$role->check}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection