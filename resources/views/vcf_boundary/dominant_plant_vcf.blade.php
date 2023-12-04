


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
            <h1 class="m-0" style="font-family: Serif;">Dominant Plant VCF Boundary </h1>
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
                    <input type="hidden" name="para_id" id="para_id" value=""/>
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

                      <div class="col-md-7" id="div_plot1" style="margin: 10px 0px 10px 0px;">

                        <label class="control-label validate"><span style="color: black;">(1)&nbsp;</span>
                        Dominant plants species, measurement and their coverage in 1st Plot</label>

                        <div class="row">
                          <div class="col-md-4" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label validate" for="plot1_location"><span style="color: red;">★&nbsp;</span>Location</label>
                            <input type="text" name="plot1_location" id="plot1_location" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this field">
                          </div>
                          
                          <div class="col-md-4" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label validate" for="plot1_dimension"><span style="color: red;">★&nbsp;</span>Dimensions of the plot</label>
                            <input type="text" name="plot1_dimension" id="plot1_dimension" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this field">
                          </div>
                        </div>

                        <table width="80%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table">
                            <thead>
                              <tr style="background-color: #8ed6f2;">
                                <th  style="text-align: center;">Serial</th>
                                <th  style="text-align: center;">Tree Species Names</th>
                                <th  style="text-align: center;">Number of Tree</th>
                                <th  style="text-align: center;">Tree Diameter at Breast Height</th>
                                <th  style="text-align: center;">Avg. Tree Height</th>
                                <th  style="text-align: center;">Action</th>
                              </tr>
                            </thead>

                            <tbody id="table_body"></tbody>

                          </table>

                          <div class="row">
                            <!-- <div class="col-md-2" style="margin: 20px 0px 30px 0px;"> -->
                              <button type="submit" class="btn btn-info" id="get_2nd_plot" style="width: 100%;border-radius: 5px;color: black;">2nd plot</button>
                            <!-- </div> -->
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-secondary" id="add_row1" style="width: 100%;border-radius: 5px;color: black;">Add More Row </button>
                            </div>
                            <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store_plot1" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                            </div>  
                          </div>
                        </div>

                      <div class="col-md-7 hide" id="div_plot2" style="margin: 10px 0px 10px 0px;">      
                          <hr style="border-bottom: 2px solid black;">

                          <label class="control-label validate" for="para_name"><span style="color: black;">(2)&nbsp;</span>
                            Dominant plants species, measurement and their coverage in 2nd Plot</label>

                        <div class="row">
                          <div class="col-md-4" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label validate" for="location"><span style="color: red;">★&nbsp;</span>Location</label>
                            <input type="text" name="plot2_location" id="plot2_location" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this field">
                          </div>
                          
                          <div class="col-md-4" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label validate" for="plot1_dimension"><span style="color: red;">★&nbsp;</span>Dimensions of the plot</label>
                            <input type="text" name="plot2_dimension" id="plot2_dimension" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this field">
                          </div>
                        </div>

                        <table width="80%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table2">
                            <thead>
                              <tr style="background-color: #8ed6f2;">
                              <th  style="text-align: center;">Serial</th>
                                <th  style="text-align: center;">Tree Species Names</th>
                                <th  style="text-align: center;">Number of Tree</th>
                                <th  style="text-align: center;">Tree Diameter at Breast Height</th>
                                <th  style="text-align: center;">Avg. Tree Height</th>
                                <th  style="text-align: center;">Action</th>
                              </tr>
                            </thead>

                            <tbody id="table_body"></tbody>

                        </table>

                          <div class="row">
                            <button type="submit" class="btn btn-info" id="get_3rd_plot" style="width: 100%;border-radius: 5px;color: black;">3rd plot</button>
                            <div class="col-md-6"></div>
                              <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                                <button type="submit" class="btn btn-secondary" id="add_row2" style="width: 100%;border-radius: 5px;color: black;">Add More Row </button>
                              </div>
                              <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                                <button type="submit" class="btn btn-primary" id="btn_store_plot2" style="width: 100%;border-radius: 5px;color: black;">Save Info Details</button>
                              </div>  
                            </div>
                        </div>

                        <div class="col-md-7 hide" id="div_plot3" style="margin: 10px 0px 10px 0px;">       
                          <hr style="border-bottom: 2px solid black;">

                          <label class="control-label validate" for="para_name"><span style="color: black;">(3)&nbsp;</span>
                            Dominant plants species, measurement and their coverage in 3rd Plot</label>

                          <div class="row">
                            <div class="col-md-4" style="margin: 0px 0px 10px 0px;">
                              <label class="control-label validate" for="location"><span style="color: red;">★&nbsp;</span>Location</label>
                              <input type="text" name="plot3_location" id="plot3_location" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this field">
                            </div>
                            
                            <div class="col-md-4" style="margin: 0px 0px 10px 0px;">
                              <label class="control-label validate" for="dimensions"><span style="color: red;">★&nbsp;</span>Dimensions of the plot</label>
                              <input type="text" name="plot3_dimension" id="plot3_dimension" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this field">
                            </div>
                          </div>

                        <table width="80%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table3">
                            <thead>
                              <tr style="background-color: #8ed6f2;">
                              <th  style="text-align: center;">Serial</th>
                                <th  style="text-align: center;">Tree Species Names</th>
                                <th  style="text-align: center;">Number of Tree</th>
                                <th  style="text-align: center;">Tree Diameter at Breast Height</th>
                                <th  style="text-align: center;">Avg. Tree Height</th>
                                <th  style="text-align: center;">Action</th>
                              </tr>
                            </thead>

                            <tbody id="table_body"></tbody>

                          </table>

                          <div class="row">
                            <!-- <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-info" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add Row</button>
                            </div> -->
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-secondary" id="add_row3" style="width: 100%;border-radius: 5px;color: black;">Add More Row </button>
                            </div>
                            <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store_plot3" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                            </div>  
                          </div>
        
                      </div>
                      <!-- end div col-md -->


                    </div>
                    <!-- end row  -->

                    <div class="row hide" id="next_div">

                      <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                        <a href="{{ route('VCF.Boundary.GPS.Point') }}" style="color: black;">
                          <button type="submit" class="btn btn-info" style="width: 100%;border-radius: 5px;">Previous : VCF GPS Point</button>
                        </a>
                      </div>

                      <div class="col-md-8"></div>

                      <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                        <a href="{{ route('Population.Entry') }}">
                          <button type="submit" class="btn btn-info" style="color: black;width: 100%;border-radius: 5px;">Next : BaseLine Population</button>
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

<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

<script>

document.title = 'VCF dominant plants';

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

    for (var i = 0; i < 5; i++) {
        insertTableRow();
    }
    for (var j = 0; j < 5; j++) {
        insertTableRow2();
    }
    for (var i = 0; i < 5; i++) {
        insertTableRow3();
    }


});

function insertTableRow() {

  var appendString = '';
  var rowCount = $('#my_table > tbody > tr').length;
  rowCount++;
  // console.log(accountName);

  appendString += '<tr>';
  appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="species_name1" name="species_name1" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
  appendString += '</td>';    
  appendString += '<td>';
  appendString += '<input type="text" id="number_tree1" name="number_tree1" class="form-control" value="" style="width: 160px;text-align: center;" placeholder="0">';
  appendString += '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="diameter_height1" name="diameter_height1" class="form-control" value="" style="width: 220px;text-align: center;" placeholder="0">';
  appendString += '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="avg_height1" name="avg_height1" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
  appendString += '</td>';

  appendString += '<td style="text-align: center;">';
  appendString += '<button type="button" class="btn btn-xs btn-danger removeHead"><i class="fa fa-remove"></i>Remove</button>';
  appendString += '</td>';

  appendString += '</tr>';


  $('#my_table > tbody:last-child').append(appendString);
  // $("#my_table tr:last").scrollintoview();
  removeTableRow();
}

function insertTableRow2() {

  var appendString = '';
  var rowCount = $('#my_table2 > tbody > tr').length;
  rowCount++;
  // console.log(accountName);

  appendString += '<tr>';
  appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="species_name2" name="species_name2" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
  appendString += '</td>';    
  appendString += '<td>';
  appendString += '<input type="text" id="number_tree2" name="number_tree2" class="form-control" value="" style="width: 160px;text-align: center;" placeholder="0">';
  appendString += '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="diameter_height2" name="diameter_height2" class="form-control" value="" style="width: 220px;text-align: center;" placeholder="0">';
  appendString += '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="avg_height2" name="avg_height2" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
  appendString += '</td>';

  appendString += '<td style="text-align: center;">';
  appendString += '<button type="button" class="btn btn-xs btn-danger removeHead"><i class="fa fa-remove"></i>Remove</button>';
  appendString += '</td>';

  appendString += '</tr>';


  $('#my_table2 > tbody:last-child').append(appendString);
  // $("#my_table tr:last").scrollintoview();
  removeTableRow();
}

function insertTableRow3() {
  var appendString = '';
  var rowCount = $('#my_table3 > tbody > tr').length;
  rowCount++;
  // console.log(accountName);

  appendString += '<tr>';
  appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="species_name3" name="species_name3" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
  appendString += '</td>';    
  appendString += '<td>';
  appendString += '<input type="text" id="number_tree3" name="number_tree3" class="form-control" value="" style="width: 160px;text-align: center;" placeholder="0">';
  appendString += '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="diameter_height3" name="diameter_height3" class="form-control" value="" style="width: 220px;text-align: center;" placeholder="0">';
  appendString += '</td>';
  appendString += '<td>';
  appendString += '<input type="text" id="avg_height3" name="avg_height3" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
  appendString += '</td>';

  appendString += '<td style="text-align: center;">';
  appendString += '<button type="button" class="btn btn-xs btn-danger removeHead"><i class="fa fa-remove"></i>Remove</button>';
  appendString += '</td>';

  appendString += '</tr>';


  $('#my_table3 > tbody:last-child').append(appendString);
  // $("#my_table tr:last").scrollintoview();
  removeTableRow();
}

</script>

<!-- this page js -->
<script src="{{ mix('resources/scripts/vcf_boundary/dominant_plant_vcf.js') }}"></script>

@endsection
