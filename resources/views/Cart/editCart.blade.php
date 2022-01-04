@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="navbar navbar-light" style="padding-bottom: 40px;">
            <div class="container-fluid">
                <h1>Edit Cart's item</h1>
            </div>
        </div>
        <div class="row col-4">
            <img src="{{asset('storage/'.$updateBook -> cover)}}" alt={{$updateBook -> cover}}>
        </div>
        <div class="row col-sm-1"></div>
        <div class="row col-7">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="name" class="form-control-plaintext" value="{{$updateBook->name}}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="author" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="author" class="form-control-plaintext" value="{{$updateBook->author}}">
                </div>
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="author" class="col-sm-2 col-form-label">Genre</label>
                <div class="col-sm-10" style="padding-top: 10px;">
                    @foreach ($updateGenre as $key => $genre)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" onclick="return false;" id="inlineCheckbox1" name="genre[]" value="{{$genre->id}}" {{ ($genre->check == 'checked' ? 'checked': '') }}>
                            <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                        </div>
                    @endforeach
                </div>
                @error('genre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                <div class="col-sm-10">
                        <textarea name="synopsis" readonly cols="30" rows="3" type="text" class="form-control-plaintext">
                        {{$updateBook->synopsis}}
                        </textarea>
                </div>
                @error('synopsis')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="price" class="form-control-plaintext" value="{{$updateBook->price}}">
                </div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <form action="{{ route('addToCart') }}" method="POST">
                @csrf
                <div class="" style="display: flex;justify-content: space-between">
                    <div style="display: inline-block">
                        <label for="">Quantity</label>
                        <input min="1" required name="quantity" type="number">
                    </div>
                        <button type="submit" style="float: right">Add to cart</button>
                    </div>
                    <input type="hidden" name="bookId" value="{{$updateBook->id}}">
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
