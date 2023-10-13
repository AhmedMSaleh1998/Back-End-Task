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
  <h2 class="text-center text-dark">Post Create</h2>
  <form method="post" action="{{ route('posts.store') }}">
    @csrf
    <div class="mb-3 mt-3">
        @include('inc.errors')
      <label for="name" class="text-dark">post Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter Post title" name="name">
      <textarea class="form-control" id="content" placeholder="Enter Post content" name="content"></textarea>
      <div class="mb-3">
        <label for="category" class="text-dark">category:</label>
        <select id="category" name="category">
            <option value=""> Choose category ...</option>
            @foreach ($categories as $category )
            <option value="{{$category->id}}"> {{$category->name}}</option>
             @endforeach
        </select>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
</body>
</html>
@endsection
