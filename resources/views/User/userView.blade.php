@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header ">{{ __('Users View') }}</div>

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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> email}}</td>
                                        <td>{{$user -> roleName}}</td>
                                        <td>
                                            <a href="{{route('getUserByUserId', ['id' => $user->id])}}" class="btn btn-success">View Detail</a>
                                            @if (strcasecmp($user -> roleName, 'Member') == 0)
                                                <form action="{{route('deleteUser', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                            
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