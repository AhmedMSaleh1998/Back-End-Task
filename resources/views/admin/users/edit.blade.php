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
        <form method="post" action="{{ route('admin.users.update' , $user->id) }}" enctype="multipart/form-data">
            @include('inc.errors')
          @csrf
          <div class="mb-3 mt-3">
            <label for="firstname" class="text-dark">First Name:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter userfirstname" name="firstname" value={{ old('firstname') ? old('firstname') : $user->firstname }}>
          </div>

          <div class="mb-3 mt-3">
            <label for="lastname" class="text-dark">Last Name:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" value={{ old('lastname') ? old('lastname') : $user->lastname }}>
          </div>

          <div class="mb-3 mt-3">
            <label for="email" class="text-dark">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value={{ old('email') ? old('email') : $user->email }}>
          </div>

          <div class="mb-3 mt-3">
            <label for="phone" class="text-dark">Phone:</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value={{ old('phone') ? old('phone') : $user->phone }}>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
</div>
</body>
</html>
@endsection
