


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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="margin-right: 5px;"> <h5><span>Go To : </span> <a href="{{ route('dashboard') }}" >Watershed Dashboard</a></h5></li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              
              <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>

              <div class="info-box-content">
                <span class="info-box-text">Current </span>
                <span class="info-box-number" > <h4 id="watershed_id"></h4> </span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                <h4 id="watershed_name" style="color: ;"> </h4>
                <!-- <a href="{{ route('dashboard') }}" class="nav-link" style="padding-left: 0px;"><h5 style="color: blue;">Go => Watershed Dashboard </h5></a>  -->
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning" style="background: linear-gradient(90deg, rgba(191,229,240,1) 0%, rgba(0,212,255,1) 35%, rgba(9,9,121,1) 100%);">
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
            <div class="small-box bg-warning" style="background: linear-gradient(90deg, rgba(212,185,137,1) 28%, rgba(224,176,38,1) 100%);">
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
            <div class="small-box bg-warning" style="background: linear-gradient(90deg, rgba(199,232,166,1) 28%, rgba(80,194,40,1) 100%);">
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

<script>

document.title = 'data entry dashboard';

$(document).ready(function () {

  var userNm = $('#userName').val();
  console.log(userNm);

  $.ajax({
      url: "/get_active_watershed",
      type: "GET",
      data: { 'userNm' : userNm },
      dataType: "json",
      cache: false,
      success: function (data) {
          console.log(data);
          $.each(data.message, function (i, v) {
              $('#watershed_id').text('Watershed: '+ v.watershed_id);
              $('#watershed_name').text('Name: ' + v.watershed_name);
          });
          
      },
      error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
  });

});

</script>

@endsection
