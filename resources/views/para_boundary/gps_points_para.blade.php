


@extends('layouts.master')

@section('current_page_css')
<!-- datepicker -->
<link rel="stylesheet" href="{{ mix('resources/plugins/datepicker/css/jquery-ui-1.9.2.custom.min.css') }}">

@endsection

@section('content')
 
<!-- Content Header (Page header) -->
    <div class="content-header" style="margin: 0px 0px -15px 0px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="font-family: Serif;">Entry GPS Ponits for Para Boundary </h1>
          </div><!-- /.col -->
          <div class="col-sm-6"></div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-body">

                  <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>

                  <div class="row"> 
                    <!-- <div class="col-md-1"></div>  -->

                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="community_id"><span style="color: red;">★&nbsp;</span>Watershed Id</label> 
                      <input type="text" name="watershed_id" id="watershed_id" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="watershed_name"><span style="color: red;">★&nbsp;</span>Watershed Name</label>
                      <input type="text" name="watershed_name" id="watershed_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div>
                    <!-- <div class="col-md-1"></div> -->
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="para_name"><span style="color: red;">★&nbsp;</span>Para Name</label>
                      <input type="text" name="para_name" id="para_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 

                    <!-- <div class="col-md-1"></div> -->

                  </div> 
                  <!-- end row -->
              
                <!-- <div class="form-group" id="table_div"> -->
                  <hr style="border-bottom: 2px solid black;">

                    <div class="row">
                      <div class="col-md-9" style="margin: 10px 0px 10px 0px;">

                        <table width="80%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table">
                            <thead>
                                <tr style="background-color: #8ed6f2;">
                                  <th rowspan="2" style="text-align: center;">Serial</th>
                                  <th colspan="3" style="text-align: center;">Longitude, X (Easting)</th>
                                  <th colspan="3" style="text-align: center;">Latitude, Y (Northing)</th>
                                  <th rowspan="2" style="text-align: center;">Action</th>
                                </tr>

                                <tr style="background-color: #d6eaf8;">
                                  <th style="text-align:center;border-bottom: none;">Degree</th>
                                  <th style="text-align:center;border-bottom: none;">Minute</th>
                                  <th style="text-align:center;border-bottom: none;">Second</th>
                                  <th style="text-align:center;border-bottom: none;">Degree</th>
                                  <th style="text-align:center;border-bottom: none;">Minute</th>
                                  <th style="text-align:center;border-bottom: none;">Second</th>
                                </tr>
                            </thead>

                            <tbody id="table_body"></tbody>

                          </table>

                          <div class="row">
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-info" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add Row</button>
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                            </div>  
                          </div>
        
                      </div>
                      <!-- end div col-md -->
                    </div>
                    <!-- end row  -->

              <!-- </div> -->
              <!-- end form-group -->
                

    
      </div>  
      <!-- end card body -->
    </div>  
    <!-- end car-primary -->
  </div>  
  <!-- end col-md-9 -->

</div> 
<!-- end main content row -->

<!-- Popup Message Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h5 id="success_msg"><h5>
        <h5 id="error_msg"><h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>



    </div>
</section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ mix('resources/scripts/para_boundary/gps_points_para.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
