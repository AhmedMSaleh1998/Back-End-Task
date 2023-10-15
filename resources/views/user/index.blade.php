@extends('user.layout.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3></h3>

                <p>Users</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3></h3>

                <p>Products</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        <!-- ./col -->
        </div>
    </div>
</section>
@endsection
