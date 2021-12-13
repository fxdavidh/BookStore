@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="row col-8">
            <h1 class="headings">Insert a New Genre</h1>
            <div class="form-container">
                <form action="{{route('createGenre')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
