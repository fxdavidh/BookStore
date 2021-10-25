<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Create Book</title>
  </head>
  <body>
    <h1 class="headings">Insert a New Book</h1>
    <div class="form-container">
      <form action="{{route('createBook')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Insert book's name" />
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" name="author" class="form-control" placeholder="Insert author's name" />
          @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="synopsis">Synopsis</label>
          <textarea name="synopsis" cols="30" rows="3" type="text" class="form-control">
          </textarea>
          @error('synopsis')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="nama-umkm">Upload Book's Cover</label>
          <input
            type="file"
            name="image"
            class="form-control-file"
          />
          @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="ktp">Book's Price</label>
          <input
            type="number"
            name="price"
            class="form-control"
            placeholder="Insert book's price"
          />
          @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="button">Submit</button>
      </form>
    </div>
  </body>
</html>
