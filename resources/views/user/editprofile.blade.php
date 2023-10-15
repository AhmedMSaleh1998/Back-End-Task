@extends('user.layout.layout')
@section('content')
    <div class="container mt-5 w-25 p-3">
        <h2 class="text-center text-dark">User Create</h2>
        <form method="post" action="{{ route('user.store.profile') }}" enctype="multipart/form-data">
            @include('inc.errors')
          @csrf
          <div class="mb-3 mt-3">
            <label for="name" class="text-dark">Password</label>
            <input type="text" class="form-control" id="password" placeholder="Enter New Password" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
</div>
</body>
</html>
@endsection
