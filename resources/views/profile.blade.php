@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="margin: 0 auto;width:70%">
            <div class="card-body">
              <h5 class="card-title">Profile</h5>
              <form action="{{ route('updateName',['id' => Auth::user()->id]) }}" method="POST">
                @method('PATCH')
                @csrf
              <div>
                    <label style="margin-right: 35%" for="">Nama</label>
                    <input style="width: 50%" type="text" name="name" id="name" value="{{$name}}">
              </div>
              <div>
                    <label style="margin-right: 36%" for="">Email</label>
                    <span>{{ $email }}</span>
              </div>
              <div style="float: right;display: flex;width: 25%">
                        <button  class="btn btn-primary">Update</button>
              </form>
                    <form style="margin-left: 2%" action="{{ route('changePassword') }}">
                        <button class="btn btn-primary">Change Password</button>
                    </form>
              </div>
            </div>
        </div>
    </div>
@endsection
