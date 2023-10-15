@extends('admin.layout.layout')
@section('content')
<html>
<head>
    <title>Laravel Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">User Data</h2>
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>first name</th>
                <th>last name</th>
                <th>email</th>
                <th>phone</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
            </td>
        </tbody>
    </table>
</div>
<a href="{{route('user.edit.profile')}}" class="btn btn-danger">Edit Password</a>
</body>
{{-- <script type="text/javascript">
    $(function () {
          var table = $('#myTable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.users.products') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'description', name: 'description'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
          ],
          });
        });
</script> --}}
</html>
@endsection
