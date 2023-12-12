


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
            <h1 class="m-0" style="font-family: Serif;">Community Wise Population Entry</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="margin-right: 5px;"> 
                <h5><span>Go To : </span> <a href="{{ route('Data.Entry.Dashboard') }}" >Data Entry Dashboard</a> </h5>
              </li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div>

        </div>
      </div>
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
                
                <input type="hidden" name="para_id" id="para_id" value=""/>
                <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                  <label class="control-label validate" for="para_name"><span style="color: red;">★&nbsp;</span>Para Name</label>
                  <input type="text" name="para_name" id="para_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                </div> 

                <!-- <div class="col-md-1"></div> -->

              </div> 
              <!-- end row -->

              <!-- <div class="col-md-1"></div> -->

              <!-- <div class="col-md-2" style="margin: 40px 0px 20px 0px;">
                  <button type="submit" class="btn btn-info" id="get_communities" style="width: 100%;border-radius: 20px;color: black;">Get All Communities for Entry</button>
              </div> -->
              <hr style="border-bottom: 2px solid black;">
              
              <div class="form-group" id="table_div">
                    <div class="row">
                        <div class="col-md-12" style="margin: 20px 0px 10px 0px;">
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                            <thead>
                                
                                <tr style="background-color: #8ed6f2;">
                                    <th rowspan="2" style="text-align:center;">Serial </th>
                                    <th rowspan="2" style="text-align:left;">Name </th>
                                    <th colspan="6" style="text-align:center;">Age Group Male</th>
                                    <th colspan="6" style="text-align:center;">Age Group Female</th>
                                    <th colspan="3" style="text-align:center;">Total Population </th>
                                    <th colspan="2" style="text-align:center;">Disabled People </th>
                                    <th rowspan="2" style="text-align:left;">Action</th>
                                </tr>

                                <tr style="background-color: #99ccff;">
                                    <th style="text-align:center;border-bottom: none;"> Under 5</th>
                                    <th style="text-align:center;border-bottom: none;">5-14</th>
                                    <th style="text-align:center;border-bottom: none;">15-19</th>
                                    <th style="text-align:center;border-bottom: none;">20-49</th>
                                    <th style="text-align:center;border-bottom: none;">50-65</th>
                                    <th style="text-align:center;border-bottom: none;">65+</th>

                                    <th style="text-align:center;border-bottom: none;">Under 5</th>
                                    <th style="text-align:center;border-bottom: none;">5-14</th>
                                    <th style="text-align:center;border-bottom: none;">15-19</th>
                                    <th style="text-align:center;border-bottom: none;">20-49</th>
                                    <th style="text-align:center;border-bottom: none;">50-65</th>
                                    <th style="text-align:center;border-bottom: none;">65+</th>

                                    <th style="text-align:center;border-bottom: none;">Male</th>
                                    <th style="text-align:center;border-bottom: none;">Female</th>
                                    <th style="text-align:center;border-bottom: none;">In Total </th>

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

                              <tbody id="table_body">
                                  
                              </tbody>
                          </table>

                    </div>
                </div>
                <!-- // end table row -->

                <div class="row">
                  <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                    <button type="submit" class="btn btn-secondary" id="add_row" style="width: 100%;border-radius: 5px;color: black;">Add More Row</button>
                  </div>
                  
                  <div class="col-md-8"></div>

                  <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                    <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 5px;color: black;">Save Population Info</button>
                  </div>
                </div>

            </div>
          <!-- end main table div -->
          <hr style="border-bottom: 2px solid black;">

            <div class="row">

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('VCF.Boundary.Dominant.Plant') }}" style="color: black;">
                  <button type="submit" class="btn btn-info" style="width: 100%;border-radius: 5px;">Previous : VCF Dominant Plant</button>
                </a>
              </div>

              <div class="col-md-8"></div>

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('View.Entry.Household') }}">
                  <button type="submit" class="btn btn-info" style="color: black;width: 100%;border-radius: 5px;">Next : BaseLine Household</button>
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
<script src="{{ asset('scripts/societal_entry/population_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/jquery-ui.js') }}"></script>

<script>

document.title = 'population entry';

$(document).ready(function () {

    console.log("hello talha23..");
    
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

    insertTableRow();

    // $.ajax({
    //     url: "/getCommunityList",
    //     type: "GET",
    //     data: { 'community_list' : 'get_data' },
    //     dataType: "json",
    //     cache: false,
    //     success: function (data) {
    //         console.log(data);
    //         var option = '';
    //         $.each(data.message, function (i, v) {
    //           option += '<option value="'+v.community_id+'">'+v.community_name+'</option>';
    //         });
    //         $('#community_name').html(option);
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //         console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    //     }
    // });

    // for (var i = 0; i < 3; i++) {
    //     insertTableRow();
    // }


});


</script>

@endsection
