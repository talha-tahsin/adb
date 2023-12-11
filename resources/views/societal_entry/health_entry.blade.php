


@extends('layouts.pages.master')

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
            <h1 class="m-0" style="font-family: Serif;">Societal Health Entry</h1>
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
          <div class="col-sm-12">
              <div class="card card-primary card-outline card-tabs">
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
                    
                      <input type="hidden" name="para_id" id="para_id" value=""/>
                      <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                        <label class="control-label validate" for="para_name"><span style="color: red;">★&nbsp;</span>Para Name</label>
                        <input type="text" name="para_name" id="para_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                      </div> 
                    </div> 
                    <!-- end row -->

                    <hr style="border-bottom: 2px solid black;">
                      <div class="row">     
                        <div class="col-md-6" style="margin: 0px 0px 10px 0px;">
                          <h5>(a) Tendency to take modern health services and facilities</h5>
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">
                            <thead>
                              <tr style="background-color: #8ed6f2;">
                                <th style="text-align: left;">Serial</th>
                                <th style="text-align: left;">Health Center</th>
                                <th style="text-align: center;">Percentage of people</th>
                                <th style="text-align: center;">Distance from the para centre (km)</th>
                                <th style="text-align: center;">Reason for taking Services</th>
                              </tr>                           
                            </thead>
                            <tbody id="table_body"></tbody>
                          </table>

                          <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store1" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                            </div>  
                          </div>

                        </div>
                        <!-- end right hand side div col-6 -->
                        
                        <div class="col-md-6" style="margin: 0px 0px 10px 0px;">
                          <form id="form1_body" method="POST">
                            <div class="col-md-12" style="margin: 0px 0px 10px 0px;">
                              <label>(1) How many people (%) receive or have a tendency to receive ethno medicine? </label>
                              <input type="text" id="tendency_of_medicine" name="tendency_of_medicine" class="form-control initialVal" placeholder="Write with percentage (%)" style="border-radius: 5px;border:2px solid #898AEE;">
                            </div>
                            <div class="col-md-12" style="margin: 0px 0px 10px 0px;">
                              <label>(2)	Do the community need any health or medical services nearby? Any other remarks?  </label>
                              <textarea class="form-control initialval" id="nearby_medical_services" name="nearby_medical_services" rows="2" style="resize: vertical; border: 2px solid #898AEE;border-radius: 5px;" placeholder="Please write something relevent the question"></textarea>
                            </div>
                            <div class="row">
                              <div class="col-md-9"></div>
                              <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                                <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                              </div>  
                            </div>
                          </form>  
                          <!-- Start :: Electricity -->
                          <form id="form2_body" method="POST">
                            <h5>Electricity coverage in the Para (Nos. of HHs)? </h5>
                            <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table2">
                              <thead>
                                <tr style="background-color: #8ed6f2;">
                                  <th style="text-align: left;">National Power Grid</th>
                                  <th style="text-align: left;">Solar</th>
                                  <th style="text-align: left;">Generator</th>
                                  <th style="text-align: center;">No Electricity Source</th>
                                  <th style="text-align: center;">Others</th>
                                </tr>
                              </thead>
                              <tbody id="table_body">
                                <tr>
                                  <td style="text-align: center;width: 10%"><input type="text" id="national_power_grid" name="national_power_grid" class="form-control" placeholder="0"></td> 
                                  <td style="text-align: center;width: 10%"><input type="text" id="solar" name="solar" class="form-control" placeholder="0"></td> 
                                  <td style="text-align: center;width: 10%"><input type="text" id="generator" name="generator" class="form-control" placeholder="0"></td>
                                  <td style="text-align: center;width: 10%"><input type="text" id="no_source" name="no_source" class="form-control" placeholder="0"></td>
                                  <td style="text-align: center;width: 10%"><input type="text" id="others" name="others" class="form-control" placeholder="0"></td>    
                                </tr>

                              </tbody>
                            </table>
                            <div class="col-md-12" style="margin: 0px 0px 10px 0px;">
                              <label>(1) Do the community need any electricity related services or solar energy facilities? </label>
                              <input type="text" id="any_electricity_services" name="any_electricity_services" class="form-control initialVal" placeholder="Please write something relevent the question" style="border-radius: 5px;border:2px solid #898AEE;">
                            </div>
                            <div class="row">
                              <div class="col-md-9"></div>
                              <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                                <button type="submit" class="btn btn-primary" id="btn_store3" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                              </div>  
                            </div>
                          </form>  
                          <!-- End :: Electricity -->

                        </div>
                        <!-- end left hand side div col-6 -->

                      </div>
                      <!-- end row -->

                      <hr style="border-bottom: 2px solid black;">
                      <div class="row">
                        <div class="col-md-8" style="margin: 0px 0px 10px 0px;">
                          <h5>(b) Which diseases are prevalent in the para</h5>
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="diseases_table">
                            <thead>      
                              <tr style="background-color: #8ed6f2;">
                                <th rowspan="2" style="text-align: center;">Serial</th>
                                <th rowspan="2" style="text-align: left;">Name of the Diseases</th>
                                <th rowspan="2" style="text-align: center;">Ranking</th>
                                <th colspan="4" style="text-align: center;">Frequency</th>
                              </tr>
                              <tr style="background-color: #99ccff;">
                                <th style="text-align:center;border-bottom: none;">Once in a year</th>
                                <th style="text-align:center;border-bottom: none;">Two incident in a year</th>
                                <th style="text-align:center;border-bottom: none;">Once in 2-3 years</th>
                                <th style="text-align:center;border-bottom: none;">Others</th>
                              </tr>                          
                            </thead>
                            <tbody id="table_body"></tbody>
                          </table>

                          <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store4" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                            </div>  
                          </div>

                        </div>
                        <!-- end div col-6 -->
                      </div>

                  <hr style="border-bottom: 2px solid black;">
                  <div class="row">
                    <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                      <a href="{{ route('View.EducationPart1.Entry') }}" style="color: black;">
                        <button type="submit" class="btn btn-info" style="width: 100%;border-radius: 20px;">Previous : Societal Education</button>
                      </a>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                      <a href="{{ route('View.Water.Entry') }}">
                        <button type="submit" class="btn btn-info" style="color: black;width: 100%;border-radius: 20px;">Next : Societal Water</button>
                      </a>
                    </div>
                  </div>


                  </div>
              </div>
          </div>
      </div>
      <!-- /end main row -->

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
<script src="{{ mix('resources/scripts/societal_entry/health_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>


<script>

document.title = 'societal health';

$(document).ready(function () {

    console.log("hello from blade script..");
    
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

    // insertTableRow();

    // for (var i = 0; i < 3; i++) {
    //     insertTableRow();
    // }


});

</script>

@endsection
