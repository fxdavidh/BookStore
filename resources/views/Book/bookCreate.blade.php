@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="row col-8">

            <h1 class="headings">Insert a New Book</h1>
            <div class="form-container">
                <form action="{{route('createBook')}}" method="POST" enctype="multipart/form-data">
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
                    <div class="mb-3 row">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" name="author" class="form-control">
                        </div>
                        @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                        <div class="col-sm-10" style="padding-top: 10px;">
                            @foreach ($genres as $key => $genre)
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="genre[]" value="{{$genre->id}}">
                                  <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                                </div>
                            @endforeach 
                        </div>
                        @error('genre')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="storeId" class="col-sm-2 col-form-label">Store</label>
                        <div class="col-sm-10" style="padding-top: 10px;">
                            <div class="input-group mb-3">
                                <select class="form-select" id="storeId" name="storeId">
                                    <option selected></option>
                                    @foreach ($stores as $key => $store)
                                        <option value="{{$store->id}}">{{$store->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        @error('storeId')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="typeId" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10" style="padding-top: 10px;">
                            <div class="input-group mb-3">
                                <select class="form-select" id="typeId" name="typeId">
                                    <option selected></option>
                                    @foreach ($types as $key => $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        @error('typeId')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                        <div class="col-sm-10">
                              <textarea name="synopsis" cols="30" rows="3" type="text" class="form-control">
                              </textarea>
                        </div>
                        @error('synopsis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="cover" class="col-sm-2 col-form-label">Upload Book's Cover</label>
                        <div class="col-sm-10">
                            <input
                              type="file"
                              name="cover"
                              class="form-control-file"
                            />
                        </div>
                        @error('cover')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="file" class="col-sm-2 col-form-label">Upload Book's File</label>
                        <div class="col-sm-10">
                            <input
                              type="file"
                              name="file"
                              class="form-control-file"
                            />
                        </div>
                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" name="price" class="form-control" >
                        </div>
                        @error('price')
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
