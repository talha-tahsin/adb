


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
            <h1 class="m-0" style="font-family: Serif;">Education Entry : Part 1</h1>
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

                          <div class="form-group" id="table_div">
                            <div class="row">

                                  <div class="col-md-6" style="margin: 20px 0px 10px 0px;">
                                    <h4>(a) Literacy rate and level of education</h4>
                                      <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                                          <thead>
                                              
                                              <tr style="background-color: #8ed6f2;">
                                                  <th rowspan="2" style="text-align:center;">Serial </th>
                                                  <th rowspan="2" style="text-align:left;">Level </th>
                                                  <th colspan="2" style="text-align:center;">Number of Population </th>
                                              </tr>

                                              <tr style="background-color: #99ccff;">
                                                  <th style="text-align:center;border-bottom: none;">Male</th>
                                                  <th style="text-align:center;border-bottom: none;">Female</th>
                                              </tr>
                                              
                                          </thead>

                                          <!-- <tfoot>
                                              <tr style="background-color: #f1f5f5;">
                                                  <td colspan="3" style="text-align: right;font-weight: bold;">Total</td>
                                                  <td id="total_amount" style="text-align: right;color: red;"></td>
                                                  <td>&nbsp;</td>
                                              </tr>
                                          </tfoot>  -->

                                          <tbody id="table_body"></tbody>

                                      </table>
                                      <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                                            <button type="submit" class="btn btn-primary" id="btn_store1" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                                        </div>  
                                      </div>
                                  </div>
                                  <!-- end div col-6 -->

                                  <div class="col-md-6" style="margin: 20px 0px 10px 0px;">
                                    <h4>(b) Any alternative income generation training program for women ? </h4>

                                    <div class="row">
                                      <!-- <div class="col-md-1"></div> -->
                                      <div class ="col-md-10" id="radioDiv" style="margin: 10px 0px 0px 0px;">
                                        <label class="control-label validate">if yes mention the Name ? &nbsp;&nbsp;</label>
                                        <label class="radio"><input type="radio" name="optradio" class="btn_radio" value="0" checked>&nbsp;No &nbsp;&nbsp;</label>
                                        <label class="radio"><input type="radio" name="optradio" class="btn_radio" value="1">&nbsp;Yes</label>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <!-- <div class="col-md-1"></div> -->
                                      <div class ="col-md-12" id="radioDiv" style="margin: 10px 0px 0px 0px;">
                                        <textarea id="alt_income_training" class="form-control" rows="3" placeholder="Please write like : 1) Name 2) Name 3) Name " disabled></textarea>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <!-- <div class="col-md-10"></div> -->
                                      <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                                          <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 5px;color: black;">Save Info</button>
                                      </div>  
                                    </div>

                                  </div>
                                  <!-- end div col-6 -->

                            </div>
                         </div>
                         <!-- end form-group -->

                        
                        
                        <hr style="border-bottom: 2px solid black;">
                        <!-- 2nd part start -->
                        <div class="col-md-12" style="margin: 20px 0px 10px 0px;">
                                <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="training_table">

                                  <thead>
                                      
                                      <tr style="background-color: #8ed6f2;">
                                          <th rowspan="2" style="text-align:center;">Serial </th>
                                          <th rowspan="2" style="text-align:left;">Training on </th>
                                          <th rowspan="2" style="text-align:center;">Select </th>
                                          <th rowspan="2" style="text-align:center;">Number of training received </th>
                                          <th colspan="1" style="text-align:center;">Were these training useful</th>
                                          <th colspan="1" style="text-align:center;">Do you want these type of training in future</th>
                                          <th rowspan="2" style="text-align:center;">Percentage of women participation</th>
                                          <th colspan="3" style="text-align:center;">Organization Involved</th>
                                          
                                      </tr>

                                      <tr style="background-color: #99ccff;">
                                          <th style="text-align:center;border-bottom: none;">Select</th>
                                          <th style="text-align:center;border-bottom: none;">Select</th>

                                          <th style="text-align:center;border-bottom: none;">Govt.</th>
                                          <th style="text-align:center;border-bottom: none;">NGO</th>
                                          <th style="text-align:center;border-bottom: none;">Development Partner</th>
                                         
                                      </tr>
                                      
                                      
                                  </thead>

                                  <!-- <tfoot>
                                      <tr style="background-color: #f1f5f5;">
                                          <td colspan="3" style="text-align: right;font-weight: bold;">Total</td>
                                          <td id="total_amount" style="text-align: right;color: red;"></td>
                                          <td>&nbsp;</td>
                                      </tr>
                                  </tfoot>  -->

                                    <tbody id="table_body">
                                        
                                    </tbody>
                                </table>

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
<script src="{{ mix('resources/scripts/societal_entry/education_part1_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>


<script>

document.title = 'Societal Education';

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
