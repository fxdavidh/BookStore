@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card" style="margin: 0 auto;width:70%">
            <div class="card-body">
              <h5 class="card-title">Change Password</h5>
              <form onsubmit="validate(this)" id="change_form" action="{{ route('updatePassword') }}" style="display: table;width: 100%" method="POST">
                    @method('PATCH')
                    @csrf
                <div style="display: table-row;width: 100%">
                    <label style="display: table-cell" for="">Old Password</label>
                    <input required style="width: 100%;display: table-cell" type="password" name="old_pass" id="old_pass" value="">
                        </div>
                    <div style="display: table-row">
                        <label style="display: table-cell" for="">New Password</label>
                        <input minlength="8" required style="width: 100%;display: table-cell" type="password" name="new_pass" id="new_pass" value="">
                    </div>
                    <div style="display: table-row">
                        <label style="display: table-cell" for="">New Confirmation Password</label>
                        <input  required style="width: 100%;display: table-cell" type="password" name="conf_pass" id="conf_pass" value="">
                    </div>
                    <div>
                        <button type="submit" style="width: 20%;margin-left: 5%;margin-bottom: 2%;margin-top: 2%" class="btn btn-primary">Update</button>
                    </div>
                    <div>
                        <span style="color: red;margin-left: 5%;margin-bottom: 2%;margin-top: 2%" id="error">{{ $error }}</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


