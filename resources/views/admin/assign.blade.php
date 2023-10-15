@extends('admin.layout.layout')
@section('content')


    <div class="container mt-5 w-25 p-3">
        <h2 class="text-center text-dark">User Product Create</h2>
        <form method="post" action="{{ route('assign.store') }}" enctype="multipart/form-data">
            @include('inc.errors')
          @csrf
          <div class="mb-3 mt-3">
            <label for="name" class="text-dark">Users:</label>
            <select class="form-control" name="user_id">
                @foreach ($users as $user)
                <option  value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3 mt-3">
          <label for="description" class="text-dark">Products</label>
            <select class="form-control" name="products[]" multiple>
                @foreach ($products as $product)
                <option  value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
</div>
</body>
</html>
@endsection
