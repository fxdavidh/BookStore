@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="navbar navbar-light" style="padding-bottom: 40px;">
            <div style="display: flex">
                <a style="text-decoration: none" href="{{ route('viewBook',['id' => $book->id,'locale' => 'en']) }}">EN |</a>
                <a style="text-decoration: none" href="{{ route('viewBook',['id' => $book->id,'locale' => 'id']) }}">| ID</a>
            </div>
            <div class="container-fluid">
                <h1>View Book's Information</h1>
            </div>
        </div>
        <div class="row col-4">
            @if ($book->imageFrom == 'web')
                <img src="{{$book -> cover}}" alt={{$book -> name}}>
            @else
                <img src="{{asset('storage/'.$book -> cover)}}" alt={{$book -> name}}>
            @endif
        </div>
        <div class="row col-sm-1"></div>
        <div class="row col-7">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">{{__('home.Name')}}</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="name" class="form-control-plaintext" value="{{$book->name}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="author" class="col-sm-2 col-form-label">{{__('home.Author')}}</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="author" class="form-control-plaintext" value="{{$book->author}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="genre" class="col-sm-2 col-form-label">{{__('home.Genre')}}</label>
                <div class="col-sm-10">
                    @foreach ($genres as $key => $genre)
                        <button type="button" class="btn btn-light btn-sm genre">{{ $genre -> name}}</button>
                    @endforeach
            </div>
            <div class="mb-3 row">
                <label for="synopsis" class="col-sm-2 col-form-label">{{__('home.Synopsis')}}</label>
                <div class="col-sm-10">
                        <textarea name="synopsis" readonly cols="30" rows="7" type="text" class="form-control-plaintext">
                        {{$book->synopsis}}
                        </textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="store" class="col-sm-2 col-form-label">{{__('home.Store')}}</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="store" class="form-control-plaintext" value="{{$book->store}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">{{__('home.Type')}}</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="type" class="form-control-plaintext" value="{{$book->type}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">{{__('home.Price')}}</label>
                <div class="col-sm-10">
                    <input type="text" readonly name="price" class="form-control-plaintext" value="{{$book->price}}">
                </div>
            </div>
            <form action="{{ route('addToCart') }}" method="POST">
                @csrf
                <div class="" style="display: flex;justify-content: space-between">
                    <div style="display: inline-block">
                        <label for="">{{__('home.Quantity')}}</label>
                        <input min="1" readonly required name="quantity" type="number" value="1">
                    </div>
                        <button type="submit" style="float: right">{{__('home.Addtocart')}}</button>
                    </div>
                    <input type="hidden" name="bookId" value="{{$book->id}}">
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
