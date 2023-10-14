@extends('admin.layout.layout')
@section('content')
<html>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-20">{{$user->name_ar}}</h4>

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>{{ $user->firstname }}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{ $user->lastname }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>
</html>
@endsection
