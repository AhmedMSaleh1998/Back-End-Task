@extends('admin.layout.layout')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>image</th>
                    <th colspan="2" class="text text-center">action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product )
                  <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="{{asset('images/products/' . $product->image)}}" width="100px"</td>
                    <td class="text text-center"><a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-success">Edit</a></td>
                    <form action="{{ route('admin.products.delete',$product->id) }}" method="product">
                      @csrf
                      @method('DELETE')
                    <td class="text text-center"><button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                  </tr>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      @push('scripts')
    {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
<script>
   $(document).ready(function() {

    $('#governorate').change(function() {
      //  consol.log(123);

        $('#cities option[data-governorate!="' + $(this).val() + '"]').hide().attr('disabled',
                      'disabled');
                  $('#cities option[data-governorate="' + $(this).val() + '"]').map(function() {
                      $(this).show().removeAttr('disabled');
                      });
    });
  });

</script>
@endpush
@endsection
