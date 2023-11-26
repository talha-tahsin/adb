


@extends('layouts.para._head2')

@section('current_page_css')

@endsection

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header" style="margin: 0px 0px -15px 0px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Entry Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6"></div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
              <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
              <h3>Para Wise Information</h3>
              <p>Sample 1</p>
                <!-- <p>New Orders</p> -->
              </div>
              <!-- <div class="icon"><i class="ion ion-bag"></i></div> -->
              <a href="{{ route('Para.Boundary.Basic.Info') }}" class="small-box-footer">Click for Entry <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Map Unit Wise Info</h3>

                <p>Sample 2</p>
              </div>
              <!-- <div class="icon"><i class="ion ion-stats-bars"></i></div> -->
              <a href="{{ route('Watershed.View') }}" class="small-box-footer">Click for Entry <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Value Chain Analysis </h3>
                <!-- <h3>Business Model</h3> -->
                <p>Sample 3</p>
              </div>
              <!-- <div class="icon"><i class="ion ion-person-add"></i></div> -->
              <a href="#" class="small-box-footer">Click for Entry <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          

        </div>
        <!-- /.row -->

        </div>
    </section>

  
@endsection

@section('current_page_js')

@endsection
