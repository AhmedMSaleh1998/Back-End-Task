@extends('admin.layout.layout')
@section('content')
{{--  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark">  --}}

    <div class="container mt-5 w-25 p-3">
        <h2 class="text-center text-dark">Product Edit</h2>
        <form method="post" action="{{ route('admin.products.update' , $product->id) }}" enctype="multipart/form-data">
            @include('inc.errors')
          @csrf
          <div class="mb-3 mt-3">
            <label for="name" class="text-dark">Product Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name" value={{ old('name') ? old('name') : $product->name }}>
          </div>
          <div class="mb-3 mt-3">
          <label for="description" class="text-dark">Product description:</label>
          <input type="text" class="form-control" id="description" placeholder="Enter Product description" name="description" value={{ old('description') ? old('description') : $product->description }}>
        </div>
        <div class="mb-3 mt-3">
          <label for="name" class="text-dark">Product Image:</label>
          <img src="{{asset('images/products/' . $product->image)}}" width="100px"/>
          <input type="file" class="form-control" id="image" placeholder="Enter Product image" name="image">
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
</div>
</body>
</html>
@endsection
