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
  <h2 class="text-center text-dark">Post Edit</h2>
  <form method="post" action="{{ route('posts.update',$post->id) }}">
    @csrf
    @method('put')
    <div class="mb-3 mt-3">
        @include('inc.errors')
      <label for="name" class="text-dark">Post <title></title>:</label>
      <input type="name" class="form-control" id="title" placeholder="Enter post title" name="title" value= {{old('title')?old('title'):$post->title}}>
    </div>
    <div class="mb-3">
        <label for="categories" class="text-dark">categories:</label>
        @if(old('category_id'))
        <select id="category" name="category_id">
            <option value=""> Choose categoy ...</option>
            @foreach ($categories as $category )
            <option  value="{{$category->id}}" @if(old('category_id') == $category->id )  selected @endif >{{ $category->name }}</option>
            @endforeach
        </select>
        @else
        <select id="governorate" name="category_id">
            <option value=""> Choose bloodType ...</option>
            @foreach ($categories as $category )
            <option  value="{{$category->id}}" @if( $category->id  == $post->category_id)  selected @endif >{{ $category->name }}</option>
            @endforeach
        </select>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
</body>
</html>
@endsection
