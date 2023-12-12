


@extends('layouts.pages.master')

@section('current_page_css')
<!-- datepicker -->
<link rel="stylesheet" href="{{ asset('plugins/datepicker/css/jquery-ui-1.9.2.custom.min.css') }}">

@endsection

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header" style="margin: 0px 0px -15px 0px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="font-family: Serif;">Water Sampling and Quality Test Form </h1>
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

              <form id="form_body" method="POST">
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
                    
                    <input type="hidden" name="para_id" id="para_id" value=""/>
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="para_name"><span style="color: red;">★&nbsp;</span>Para Name</label>
                      <input type="text" name="para_name" id="para_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 
                  </div> 
                  <!-- end row -->

                  <hr style="border-bottom: 2px solid black;">

                  <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table">
                    <thead>
                      <tr style="background-color: #8ed6f2;">
                        <th rowspan="2" style="text-align: left;">Sample Collection Date</th>
                        <th rowspan="2" style="text-align: left;">Sample Collection Time</th>
                        <th rowspan="2" style="text-align: left;">Name of Farmer/Forester</th>
                        <th rowspan="2" style="text-align: left;">Water Sample ID</th>
                        <th rowspan="2" style="text-align: left;">Approx. Area (acre) of wetlands</th>
                        <th colspan="2" style="text-align: center;">Location of Sample from Wetlands (coordinates)</th>
                        <th colspan="2" style="text-align: center;">Approx. Avg. Depth (ft) of Flow</th>
                      </tr>
                      <tr style="background-color: #99ccff;">
                        <th style="text-align:center;border-bottom: none;">Longitude, X (Easting)</th>
                        <th style="text-align:center;border-bottom: none;">Latitude, Y (Northing)</th>
                        <th style="text-align:center;border-bottom: none;">Dry Season</th>
                        <th style="text-align:center;border-bottom: none;">Wet Season</th>
                      </tr>
                    </thead>

                    <tbody id="table_body">

                      <tr>
                        <td style="text-align: center;width: 10%"><input type="text" id="collection_date" name="collection_date" class="form-control date" placeholder="Write collection date"></td> 
                        <td style="text-align: center;width: 10%"><input type="text" id="collection_time" name="collection_time" class="form-control" placeholder="Write like 12:10 Am"></td> 
                        <td style="text-align: center;width: 10%"><input type="text" id="farmar_name" name="farmar_name" class="form-control" placeholder="Write farmar name"></td>
                        <td style="text-align: center;width: 10%"><input type="text" id="sample_id" name="sample_id" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;width: 10%"><input type="text" id="approx_area" name="approx_area" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;width: 10%"><input type="text" id="longitude" name="longitude" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;width: 10%"><input type="text" id="latitude" name="latitude" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;width: 10%"><input type="text" id="dry_season" name="dry_season" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;width: 10%"><input type="text" id="wet_season" name="wet_season" class="form-control" placeholder="0"></td> 
                      </tr>

                    </tbody>

                </table>

                <!-- <hr style="border-bottom: 2px solid black;"> -->
               
              
                  <div class="form-group" id="table_div">

                    <div class="row">
                        <div class="col-md-12" style="margin: 20px 0px 10px 0px;">

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Weather Condition during In-situ Test</label>
                            <select id="weather_condition" name="weather_condition" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Cloudy">Cloudy</option>
                              <option value="Sunny">Sunny</option>
                              <option value="Rainy">Rainy</option>
                              <option value="Foggy">Foggy</option>
                              <option value="Others">Others</option>
                            </select>
                          </div>

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_female">
                          <span style="color: red;">★&nbsp;</span>Sediment Type of Wetlands Bed </label>
                            <select id="sediment_type" name="sediment_type" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Gravel">Gravel</option>
                              <option value="Sand">Sand</option>
                              <option value="Silt">Silt</option>
                              <option value="Boulder">Boulder</option>
                              <option value="Others">Others</option>
                            </select>
                          </div> 

                          <!-- <div class="col-md-1"></div>  -->
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="plain_land_male">
                          <span style="color: red;">★&nbsp;</span>Status of Water Flow </label>
                            <select id="water_flow_status" name="water_flow_status" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Stagnant">Stagnant</option>
                              <option value="Mild Wave">Mild Wave</option>
                              <option value="Turbulent">Turbulent</option>
                              <option value="Others">Others</option>
                            </select>
                          </div>

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                            <label class="control-label validate" for="plain_land_female">
                            <span style="color: red;">★&nbsp;</span>Upper Riparian LULC Type </label>
                            <select id="lulc_type" name="lulc_type" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Open land">Open land</option>
                              <option value="Forest">Forest</option>
                              <option value="Hill tract">Hill tract</option>
                              <option value="Others">Others</option>
                            </select>
                          </div> 

                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                            <label class="control-label validate" for="plain_land_female">
                            <span style="color: red;">★&nbsp;</span>Interventions in Upstream of Sam. Site</label>
                            <select id="intervention_upstream" name="intervention_upstream" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Industrial">Industrial</option>
                              <option value="Mining">Mining</option>
                              <option value="Agricultural">Agricultural</option>
                              <option value="Others">Others</option>
                            </select>
                          </div> 

                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                            <label class="control-label validate" for="plain_land_female">
                            <span style="color: red;">★&nbsp;</span>Interventions Nearby the Samp. Site</label>
                            <select id="intervention_nearby" name="intervention_nearby" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Bridge">Bridge</option>
                              <option value="Settlement">Settlement</option>
                              <option value="Roads">Roads</option>
                              <option value="Market">Market</option>
                              <option value="Others">Others</option>
                            </select>
                          </div> 
                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Navigation Practice</label>
                            <select id="navigation_practice" name="navigation_practice" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Fishing Practice</label>
                            <select id="fishing_practice" name="fishing_practice" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Use of Wetlands Water</label>
                            <select id="use_of_wetland" name="use_of_wetland" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Drinking">Drinking</option>
                              <option value="Irrigation">Irrigation</option>
                              <option value="Household">Household</option>
                              <option value="Industrial">Industrial</option>
                              <option value="Others">Others</option>
                            </select>
                          </div>
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Waste Discharge into Water</label>
                            <select id="waste_discharge" name="waste_discharge" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Major Mollusks</label>
                            <select id="major_mollusks" name="major_mollusks" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Shamuk">Shamuk</option>
                              <option value="Jhinuk">Jhinuk</option>
                              <option value="Others">Others</option>
                            </select>
                          </div>
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Overall Wetlands Water Health</label>
                            <select id="overall_wetland" name="overall_wetland" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Option</option>
                              <option value="Very Good">Very Good</option>
                              <option value="Good">Good</option>
                              <option value="Moderate">Moderate</option>
                              <option value="Bad">Bad</option>
                              <option value="Very Bad">Very Bad</option>
                              <option value="Others">Others</option>
                            </select>
                          </div>

                      </div>
                      <!-- end row -->
                        
                        <div class="row">
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                            <label class="control-label validate" for="up_image"><span style="color: red;">★&nbsp;</span>Upload Image</label>
                            <input type="file" class="" id="up_image" name="up_image" accept="image/x-png,image/jpg,image/jpeg,image/heif,image/heic" autocomplete="off"/>
                          </div>
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label validate" for="any_remarks"><span style="color: red;">★&nbsp;</span>Any Remarks</label>
                            <textarea class="form-control initialval" id="any_remark" name="any_remark" rows="2" style="resize: vertical; border: 2px solid #898AEE;border-radius: 5px;" placeholder="Please write something"></textarea>
                          </div>
                          <div class="col-md-2" style="margin: 40px 0px 10px 0px;">
                            <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                          </div>
                          
                        </div>
                        <!-- end row -->
                  </form>

                    </div>
                </div>
                <!-- // end table row -->

                  <!-- <div class="row">
                      <div class="col-md-10"></div>
                      <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                        <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                      </div>  
                  </div> -->

              </div>
              <!-- end main table div -->

          <hr style="border-bottom: 2px solid black;">
            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">

              <table width="80%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table2">
                  <thead>
                      <tr style="background-color: #8ed6f2;">
                        <th style="text-align: center;">Serial</th>
                        <th style="text-align: left;">Test Name</th>
                        <th style="text-align: center;">1st  Test</th>
                        <th style="text-align: center;">2nd Test</th>
                        <th style="text-align: center;">3rd Test</th>  
                        <th style="text-align: center;">Average</th>  
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
                        <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                      </div>  
                  </div>
            </div>

          <hr style="border-bottom: 2px solid black;">

            <div class="row">

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('VCF.Boundary.Dominant.Plant') }}" style="color: black;">
                  <button type="submit" class="btn btn-info" style="width: 100%;border-radius: 20px;">Previous : VCF Dominant Plants</button>
                </a>
              </div>

              <div class="col-md-8"></div>

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('Soil.Sample.Lab.Test') }}">
                  <button type="submit" class="btn btn-info" style="color: black;width: 100%;border-radius: 20px;">Next : Soil Sample & Lab Test</button>
                </a>
              </div>

            </div>

    
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
<script src="{{ asset('scripts/watershed_health/water_sample_quality.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/jquery-ui.js') }}"></script>

<script>

document.title = 'water sample quality';

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

    // insertTableRow();

    // for (var i = 0; i < 3; i++) {
    //     insertTableRow();
    // }


});

</script>

@endsection
