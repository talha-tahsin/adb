


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
                        <th rowspan="2" style="text-align: left;">Cell No of Farmer/Forester</th>
                        <th rowspan="2" style="text-align: left;">Soil Sample ID</th>
                        <th colspan="2" style="text-align: center;">Sample Location</th>
                        <th colspan="3" style="text-align: center;">Cropping Pattern of Sample Collection Site</th>
                      </tr>
                      <tr style="background-color: #99ccff;">
                        <th style="text-align:center;border-bottom: none;">Longitude, X (Easting)</th>
                        <th style="text-align:center;border-bottom: none;">Latitude, Y (Northing)</th>
                        <th style="text-align:center;border-bottom: none;">Kharif I (Mar - Jun)</th>
                        <th style="text-align:center;border-bottom: none;">Kharif II (Jul - Oct)</th>
                        <th style="text-align:center;border-bottom: none;">Rabi (Nov - Feb)</th>
                      </tr>
                    </thead>

                    <tbody id="table_body">

                      <tr>
                        <td style="text-align: center;width: 10%"><input type="text" id="collection_date" name="collection_date" class="form-control date" placeholder="Write collection date"></td> 
                        <td style="text-align: center;width: 10%"><input type="text" id="collection_time" name="collection_time" class="form-control" placeholder="Write like 12:10 Am"></td> 
                        <td style="text-align: center;width: 10%"><input type="text" id="farmer_name" name="farmer_name" class="form-control" placeholder="Write farmar name"></td>
                        <td style="text-align: center;width: 10%"><input type="text" id="farmer_cell_no" name="farmer_cell_no" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;width: 10%"><input type="text" id="soil_sample_id" name="soil_sample_id" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;width: 10%"><input type="text" id="longitude" name="longitude" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;width: 10%"><input type="text" id="latitude" name="latitude" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;width: 10%"><input type="text" id="kharif_1" name="kharif_1" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;width: 10%"><input type="text" id="kharif_2" name="kharif_2" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;width: 10%"><input type="text" id="rabi" name="rabi" class="form-control" placeholder="0"></td> 
                      </tr>

                    </tbody>

                  </table>

                <!-- <hr style="border-bottom: 2px solid black;"> -->
                <div class="row">
                  <div class="col-md-12" style="margin: 10px 0px 10px 0px;">

                    <div class="row">
                      <!-- <div class="col-md-1"></div> -->
                      <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                        <label class="control-label validate" for="jhum_male">
                        <span style="color: red;">★&nbsp;</span>Soil Depth (cm)</label>
                        <input type="text" name="soil_depth" id="soil_depth" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="Please fill up this field">
                      </div>
                      <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                        <label class="control-label validate" for="jhum_male">
                        <span style="color: red;">★&nbsp;</span>Inundation depth (cm)</label>
                        <input type="text" name="inundation_depth" id="inundation_depth" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Write when normal flooding">
                      </div>
                      
                      <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="land_form">
                      <span style="color: red;">★&nbsp;</span>Land Form </label>
                        <select id="land_form" name="land_form" class="form-control initialSelectBoxVal" style="border-radius: 5px;border:2px solid #898AEE;">
                          <option value="" selected disabled>Select Option</option>
                          <option value="Hill Top">Hill Top</option>
                          <option value="Valley">Valley</option>
                          <option value="Low Lying Flat Land">Low Lying Flat Land</option>
                          <option value="Sloping Land">Sloping Land</option>
                        </select>
                      </div> 

                      <!-- <div class="col-md-1"></div>  -->
                      
                      <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                        <label class="control-label validate" for="jhum_male">
                        <span style="color: red;">★&nbsp;</span>Land Type (tbf by CEGIS)</label>
                        <input type="text" name="land_type" id="land_type" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this field">
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
                
                  </div>
                </div>
                <!-- end main row -->

            </form>
          <!-- ========= * ========== * =========== * ========== * =========== * ========== -->
          <hr style="border-bottom: 2px solid black;">
          <div class="col-md-12" style="margin: 10px 0px 10px 0px;">

          <form id="form2_body" method="POST">
            <h5>(a) Soil Test Result (tbf after lab test)</h5>
            <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table2">
              <thead>
                <tr style="background-color: #8ed6f2;">
                  <th style="text-align: left;">Soil Reaction (pH)</th>
                  <th style="text-align: left;">Organic Matter (OM), % </th>
                  <th style="text-align: left;">Water Holding Capacity</th>
                  <th style="text-align: center;">Percolation/Infiltration, ml/min</th>
                  <th style="text-align: center;">Nitrogen (N), %</th>
                  <th style="text-align: center;">Phosphorus (P), ppm</th>
                  <th style="text-align: center;">Potassium (K), meq/100g soil</th>
                  <th style="text-align: left;">Sulphur (S), ppm</th>
                  <th style="text-align: left;">Calcium (Ca), ppm</th>
                </tr>
              </thead>

              <tbody id="table_body">

                <tr>
                  <td style="text-align: center;width: 10%"><input type="text" id="collection_date" name="collection_date" class="form-control" placeholder="0"></td> 
                  <td style="text-align: center;width: 10%"><input type="text" id="collection_time" name="collection_time" class="form-control" placeholder="0"></td> 
                  <td style="text-align: center;width: 10%"><input type="text" id="farmar_name" name="farmar_name" class="form-control" placeholder="0"></td>
                  <td style="text-align: center;width: 10%"><input type="text" id="sample_id" name="sample_id" class="form-control" placeholder="0"></td>
                  <td style="text-align: center;width: 10%"><input type="text" id="approx_area" name="approx_area" class="form-control" placeholder="0"></td>
                  <td style="text-align: center;width: 10%"><input type="text" id="longitude" name="longitude" class="form-control" placeholder="0"></td>
                  <td style="text-align: center;width: 10%"><input type="text" id="latitude" name="latitude" class="form-control" placeholder="0"></td>
                  <td style="text-align: center;width: 10%"><input type="text" id="dry_season" name="dry_season" class="form-control" placeholder="0"></td> 
                  <td style="text-align: center;width: 10%"><input type="text" id="wet_season" name="wet_season" class="form-control" placeholder="0"></td> 
                </tr>

              </tbody>

            </table>

              <!-- table 2 : 2nd part -->
              <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table2">
                <thead>
                  <tr style="background-color: #8ed6f2;">
                    <th style="text-align: left;">Magnesium (Mg), mg/100g soil</th>
                    <th style="text-align: left;">Iron (Fe), mg/100g soil</th>
                    <th style="text-align: left;">Manganese (Mn), mg/100g soil</th>
                    <th style="text-align: left;">Copper (Cu), mg/100g soil</th>
                    <th style="text-align: left;">Molybdenum (Mo), mg/100g soil</th>
                    <th style="text-align: center;">Zinc (Zn), mg/100g soil</th>
                    <th style="text-align: center;">Boron (B), mg/100g soil</th>
                    <th style="text-align: center;">Cadmium (Cd), ppm</th>
                    <th style="text-align: center;">Lead (Pb), ppm</th>
                  </tr>
                </thead>

                <tbody id="table_body">

                  <tr>
                    <td style="text-align: center;width: 10%"><input type="text" id="collection_date" name="collection_date" class="form-control" placeholder="0"></td> 
                    <td style="text-align: center;width: 10%"><input type="text" id="collection_time" name="collection_time" class="form-control" placeholder="0"></td> 
                    <td style="text-align: center;width: 10%"><input type="text" id="farmar_name" name="farmar_name" class="form-control" placeholder="0"></td>
                    <td style="text-align: center;width: 10%"><input type="text" id="sample_id" name="sample_id" class="form-control" placeholder="0"></td>
                    <td style="text-align: center;width: 10%"><input type="text" id="approx_area" name="approx_area" class="form-control" placeholder="0"></td>
                    <td style="text-align: center;width: 10%"><input type="text" id="longitude" name="longitude" class="form-control" placeholder="0"></td>
                    <td style="text-align: center;width: 10%"><input type="text" id="latitude" name="latitude" class="form-control" placeholder="0"></td>
                    <td style="text-align: center;width: 10%"><input type="text" id="dry_season" name="dry_season" class="form-control" placeholder="0"></td> 
                    <td style="text-align: center;width: 10%"><input type="text" id="wet_season" name="wet_season" class="form-control" placeholder="0"></td> 
                  </tr>

                </tbody>

              </table>

              <div class="row">
                <div class="col-md-10"></div>
                  <!-- <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                    <button type="submit" class="btn btn-secondary" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add More Row</button>
                  </div> -->
                  <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                    <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                  </div>  
              </div>
            <form>
          </div>

          <!-- ========= * ========== * =========== * ========== * =========== * ========== -->
          <hr style="border-bottom: 2px solid black;">

          <div class="col-md-6" style="margin: 10px 0px 10px 0px;">
            <h5>(b) Soil Texture Class</h5>
            <table width="80%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table3">
              <thead>
                <tr style="background-color: #8ed6f2;">
                  <th style="text-align: center;">Serial</th>
                  <th style="text-align: left;">Soil Texture Class</th>
                  <th style="text-align: center;">Sand, %</th>
                  <th style="text-align: center;">Silt, %</th>
                  <th style="text-align: center;">Clay, %</th>   
                </tr>
              </thead>

                <tbody id="table_body"></tbody>

            </table>

            <div class="row">
              <div class="col-md-9"></div>
                <!-- <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                  <button type="submit" class="btn btn-secondary" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add More Row</button>
                </div> -->
                <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
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
<script src="{{ mix('resources/scripts/watershed_health/soil_sample_lab_test.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

<script>

document.title = 'soil sample lab test';

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
