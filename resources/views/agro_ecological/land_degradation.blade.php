


@extends('layouts.pages.master')

@section('current_page_css')
<!-- dataTables -->
<link rel="stylesheet" href="{{ mix('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ mix('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ mix('resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection


@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header" style="margin: 0px 0px -15px 0px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Land Degradation Status & Landscape Restoration Opportunities</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="margin-right: 5px;"> 
                <h5><span>Go To : </span> <a href="{{ route('Data.Entry.Dashboard') }}" >Data Entry Dashboard</a> </h5>
              </li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div>
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

                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="community_id"><span style="color: red;">★&nbsp;</span>Watershed Id</label> 
                      <input type="text" name="watershed_id" id="watershed_id" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="watershed_name"><span style="color: red;">★&nbsp;</span>Watershed Name</label>
                      <input type="text" name="watershed_name" id="watershed_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div>
                    
                    <!-- <input type="hidden" name="para_id" id="para_id" value=""/> -->
                    <!-- <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="map_unit"><span style="color: red;">★&nbsp;</span>Map Unit</label>
                      <input type="text" name="map_unit" id="map_unit" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div>  -->

                  </div> 
                  <!-- end row -->
                  <hr style="border-bottom: 2px solid black;">

                  <div class="col-md-6">
                    <table width="100%" class="table table-bordered table-striped datatable dtr-inline" id="my_table_list">
                    <thead>
                      <tr style="background-color: #6bbfd9;">
                        <th style="text-align: center;width: 5%;">Serial</th>
                        <th style="text-align: center;width: 5%;">Map Unit</th>
                        <th style="text-align: center;width: 10%;">Area Map Unit</th>
                        <th style="text-align: center;width: 10%;">Action</th>
                      </tr>
                    </thead>
                  
                    <tbody id="table_body"></tbody>

                  </table>
                </div> 

                <!-- start  -->
              <div class="form-group hide" id="entry_div">
                <hr style="border-bottom: 2px solid black;">

                <div class="row">
                      <div class="col-md-12" style="margin: 0px 0px 0px 0px;">

                        <div class="row">
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label validate" for="map_unit"><span style="color: red;">★&nbsp;</span>Map Unit</label>
                            <input type="text" name="map_unit" id="map_unit" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                          </div>
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label validate" for="area_map_unit"><span style="color: red;">★&nbsp;</span>Area Map Unit (ha)</label>
                            <input type="text" name="area_map_unit" id="area_map_unit" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                          </div>
                        </div>

                        <label class="control-label" for="map_unit"><span style="color: black;">(1) &nbsp;</span>Degradation</label>
                        <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table">
                            <thead>
                                <tr style="background-color: #8ed6f2;">
                                  <th rowspan="2" style="text-align: center;">Serial</th>
                                 
                                  <th rowspan="2" style="text-align: left;">Indicator</th>
                                  <th colspan="15" style="text-align: center;">LULC Class Map Unit</th>
                                  <th rowspan="2" style="text-align: center;">Remarks</th>
                                  <!-- <th rowspan="2" style="text-align: center;">Action</th> -->
                                </tr>

                                <tr style="background-color: #d6eaf8;">
                                  <th style="text-align:center;border-bottom: none;">F</th>
                                  <th style="text-align:center;border-bottom: none;">Hs</th>
                                  <th style="text-align:center;border-bottom: none;">O</th>
                                  <th style="text-align:center;border-bottom: none;">Sc</th>
                                  <th style="text-align:center;border-bottom: none;">Cr</th>
                                  <th style="text-align:center;border-bottom: none;">L</th>
                                  <th style="text-align:center;border-bottom: none;">B</th>
                                  <th style="text-align:center;border-bottom: none;">R</th>
                                  <th style="text-align:center;border-bottom: none;">P</th>
                                  <th style="text-align:center;border-bottom: none;">A</th>
                                  <th style="text-align:center;border-bottom: none;">Rs</th>
                                  <th style="text-align:center;border-bottom: none;">Br</th>
                                  <th style="text-align:center;border-bottom: none;">Hp</th>
                                  <th style="text-align:center;border-bottom: none;">Rd</th>
                                  <th style="text-align:center;border-bottom: none;">Sd</th>
                                </tr>
                                
                            </thead>

                            <tbody id="table_body"></tbody>

                          </table>

                          <div class="row">
                            <div class="col-md-10"></div>
                            <!-- <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-secondary" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add More Row</button>
                            </div> -->
                            
                            <div class="col-md-2" style="margin: 20px 0px 20px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store1" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                            </div>  
                          </div>

                          <hr style="border-bottom: 2px solid black;">
                          <!-- 2nd table -->
                          <label class="control-label" for="map_unit"><span style="color: black;">(2) &nbsp;</span>Existing Conservation</label>
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table2">
                            <thead>
                                <tr style="background-color: #8ed6f2;">
                                  <th rowspan="2" style="text-align: center;">Serial</th>
                                  <th rowspan="2" style="text-align: center;">Indicator</th>
                                  <th colspan="15" style="text-align: center;">LULC Class Map Unit</th>
                                  <th rowspan="2" style="text-align: center;">Remarks</th>
                                  <!-- <th rowspan="2" style="text-align: center;">Action</th> -->
                                </tr>

                                <tr style="background-color: #d6eaf8;">
                                  <th style="text-align:center;border-bottom: none;">F</th>
                                  <th style="text-align:center;border-bottom: none;">Hs</th>
                                  <th style="text-align:center;border-bottom: none;">O</th>
                                  <th style="text-align:center;border-bottom: none;">Sc</th>
                                  <th style="text-align:center;border-bottom: none;">Cr</th>
                                  <th style="text-align:center;border-bottom: none;">L</th>
                                  <th style="text-align:center;border-bottom: none;">B</th>
                                  <th style="text-align:center;border-bottom: none;">R</th>
                                  <th style="text-align:center;border-bottom: none;">P</th>
                                  <th style="text-align:center;border-bottom: none;">A</th>
                                  <th style="text-align:center;border-bottom: none;">Rs</th>
                                  <th style="text-align:center;border-bottom: none;">Br</th>
                                  <th style="text-align:center;border-bottom: none;">Hp</th>
                                  <th style="text-align:center;border-bottom: none;">Rd</th>
                                  <th style="text-align:center;border-bottom: none;">Sd</th>
                                </tr>
                                
                            </thead>

                            <tbody id="table_body"></tbody>

                          </table>

                          <div class="row">
                            <div class="col-md-10"></div>
                            <!-- <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-secondary" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add More Row</button>
                            </div> -->
                            
                            <div class="col-md-2" style="margin: 20px 0px 20px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                            </div>  
                          </div>

                          <hr style="border-bottom: 2px solid black;">
                          <!-- 3rd table -->
                          <label class="control-label" for="map_unit"><span style="color: black;">(3) &nbsp;</span>Future Conservation</label>
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table3">
                            <thead>
                                <tr style="background-color: #8ed6f2;">
                                  <th rowspan="2" style="text-align: center;">Serial</th>
                                  <th rowspan="2" style="text-align: center;">Indicator</th>
                                  <th colspan="15" style="text-align: center;">LULC Class Map Unit</th>
                                  <th rowspan="2" style="text-align: center;">Remarks</th>
                                  <!-- <th rowspan="2" style="text-align: center;">Action</th> -->
                                </tr>

                                <tr style="background-color: #d6eaf8;">
                                  <th style="text-align:center;border-bottom: none;">F</th>
                                  <th style="text-align:center;border-bottom: none;">Hs</th>
                                  <th style="text-align:center;border-bottom: none;">O</th>
                                  <th style="text-align:center;border-bottom: none;">Sc</th>
                                  <th style="text-align:center;border-bottom: none;">Cr</th>
                                  <th style="text-align:center;border-bottom: none;">L</th>
                                  <th style="text-align:center;border-bottom: none;">B</th>
                                  <th style="text-align:center;border-bottom: none;">R</th>
                                  <th style="text-align:center;border-bottom: none;">P</th>
                                  <th style="text-align:center;border-bottom: none;">A</th>
                                  <th style="text-align:center;border-bottom: none;">Rs</th>
                                  <th style="text-align:center;border-bottom: none;">Br</th>
                                  <th style="text-align:center;border-bottom: none;">Hp</th>
                                  <th style="text-align:center;border-bottom: none;">Rd</th>
                                  <th style="text-align:center;border-bottom: none;">Sd</th>
                                </tr>
                                
                            </thead>

                            <tbody id="table_body"></tbody>

                          </table>

                          <div class="row">
                            <div class="col-md-10"></div>
                            <!-- <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-secondary" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add More Row</button>
                            </div> -->
                            
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store3" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                            </div>  
                          </div>

        
                      </div>
                      <!-- end div col-md -->
                    </div>
                    <!-- end row  -->

                </div> 

    
              </div>  
              <!-- end card body -->
            </div>  
            <!-- end car-primary -->
          </div>  
          <!-- end col-md-12 -->

        </div> 
        <!-- end row -->


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
        <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<script src="{{ mix('resources/scripts/agro_ecological/land_degradation.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ mix('resources/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>


<script>

document.title = 'degradatiion';

$(document).ready(function () {

    console.log("hello talha..");
    
    var userNm = $('#userName').val();

    $.ajax({
        url: "/get_active_watershed",
        type: "GET",
        data: { 'userNm' : userNm },
        dataType: "json",
        cache: false,
        success: function (data) {
            // console.log(data);
            $.each(data.message, function (i, v) {
                $('#watershed_id').val(v.watershed_id);
                $('#watershed_name').val(v.watershed_name);
                $('#para_id').val(v.para_id);
                $('#para_name').val(v.para_name);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    $.ajax({
        url: "/get_map_unit_list",
        type: "GET",
        data: { 'watershed_id' : 'get_data' },
        dataType: "html",
        cache: false,
        success: function (data) {
            // console.log(data);
            $("#table_body").html(data);
            $('#my_table_list').DataTable();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });


});


</script>



@endsection
