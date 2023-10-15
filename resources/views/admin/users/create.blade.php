@extends('admin.layout.layout')
@section('content')
    <div class="container mt-5 w-25 p-3">
        <h2 class="text-center text-dark">User Create</h2>
        <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @include('inc.errors')
          @csrf
          <div class="mb-3 mt-3">
            <label for="name" class="text-dark">First Name:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter User first Name" name="firstname">
          </div>
          <div class="mb-3 mt-3">
          <label for="description" class="text-dark">Last Name:</label>
          <input type="text" class="form-control" id="lastname" placeholder="Enter User Last Name" name="lastname">
        </div>
        <div class="mb-3 mt-3">
            <label for="description" class="text-dark">Phone:</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter User Phone" name="phone">
        </div>
        <div class="mb-3 mt-3">
            <label for="description" class="text-dark">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter User email" name="email">
        </div>
        <div class="mb-3 mt-3">
            <label for="description" class="text-dark">Password:</label>
            <input type="password" class="form-control" id="email" placeholder="Enter User password" name="password">
        </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
</div>
</body>
</html>
@endsection
