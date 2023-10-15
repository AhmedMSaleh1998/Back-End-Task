@extends('admin.layout.layout')
@section('content')
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Users</h2>
    <a class="btn btn-info" href="{{route('admin.users.create')}}">Create User</a>
    <table id="USER" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="" id="deleteform">
            @csrf
            @method('delete')
        <div class="modal-body">
          Are you sure
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
    $(function () {
          var table = $('#USER').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.users.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'firstname', name: 'firstname'},
                  {data: 'lastname', name: 'lastname'},
                  {data: 'email', name: 'email'},
                  {data: 'phone', name: 'phone'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
          ],
          });
        });
</script>
<script type="text/javascript">
    $(document).on('click', '.delete-btn', function() {
        action = $(this).data('action')
        console.log(action);
        $('#deleteform').attr('action',action)
            });
</script>
</html>
@endsection
