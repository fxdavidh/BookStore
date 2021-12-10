@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="row justify-content-md-center">
        <div class="col-8">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
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
                                <td class="action">
                                    <a href="{{route('viewUpdateUser', ['id' => $user->id])}}" class="btn btn-success">View Detail</a>
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
@endsection

