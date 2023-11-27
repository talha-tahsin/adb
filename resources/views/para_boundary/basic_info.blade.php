


@extends('layouts.master')

@section('current_page_css')
<!-- datepicker -->
<link rel="stylesheet" href="{{ mix('resources/plugins/datepicker/css/jquery-ui-1.9.2.custom.min.css') }}">
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
            <h1 class="m-0" style="font-family: Serif;">Para Basic Information</h1>
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

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-body">

                <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>
              
              <div class="form-group" id="table_div">
                <!-- <hr style="border-bottom: 2px solid black;"> -->
                    <div class="row">
                        <div class="col-md-12" style="margin: 10px 0px 10px 0px;">

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="watershed_id"><span style="color: red;">★&nbsp;</span>Watershed Id</label>
                            <input type="text" name="watershed_id" id="watershed_id" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                          </div> 

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="watershed_name"><span style="color: red;">★&nbsp;</span>Watershed Name</label>
                            <input type="text" name="watershed_name" id="watershed_name" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                          </div>

                          <!-- <div class="col-md-1"></div>  -->

                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                          <label class="control-label" for="survey_date"><span style="color: red;">★&nbsp;</span>Survey Date</label>
                          <input type="text" name="survey_date" id="survey_date" class="form-control date initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please enter date">
                          </div>

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="para_name"><span style="color: red;">★&nbsp;</span>Para Name</label>
                            <input type="text" name="para_name" id="para_name" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div> 
                            
                        </div>
                        <!-- end row -->

                        <hr style="border-bottom: 2px solid black;">

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="mouza_name"><span style="color: red;">★&nbsp;</span>Mouza Name</label>
                            <input type="text" name="mouza_name" id="mouza_name" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div>

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="union"><span style="color: red;">★&nbsp;</span>Union</label>
                            <input type="text" name="union" id="union" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div> 

                          <!-- <div class="col-md-1"></div>  -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="upozila"><span style="color: red;">★&nbsp;</span>Upozila</label>
                            <input type="text" name="upozila" id="upozila" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div>

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="district"><span style="color: red;">★&nbsp;</span>District</label>
                            <input type="text" name="district" id="district" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div>                           
                            
                        </div>
                        <!-- end row -->

                        <hr style="border-bottom: 2px solid black;">

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="headman_name"><span style="color: red;">★&nbsp;</span>Headman Name</label>
                            <input type="text" name="headman_name" id="headman_name" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div>

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="karbari_name"><span style="color: red;">★&nbsp;</span>Karbari Name</label>
                            <input type="text" name="karbari_name" id="karbari_name" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div> 

                          <!-- <div class="col-md-1"></div>  -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="chairman_name"><span style="color: red;">★&nbsp;</span>Union Chairman Name</label>
                            <input type="text" name="chairman_name" id="chairman_name" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div>

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="para_area"><span style="color: red;">★&nbsp;</span>Approx. Para Area (ha)</label>
                            <input type="text" name="para_area" id="para_area" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div>
                            
                        </div>
                        <!-- end row -->

                        <hr style="border-bottom: 2px solid black;">

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <!-- <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label  validate" for="para_area"><span style="color: red;">★&nbsp;</span>Approx. Para Area (ha)</label>
                            <input type="text" name="para_area" id="para_area" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please fill up this feild">
                          </div> -->

                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                            <label class="control-label" for="any_remarks"><span style="color: green;">★&nbsp;</span>Any Others Remarks</label>
                            <input type="text" name="any_remarks" id="any_remarks" class="form-control initial" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Write something if have">
                          </div> 

                          <!-- <div class="col-md-1"></div> -->

                          <div class="col-md-2" style="margin: 30px 0px 30px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 5px;color: black;">Save Details Info</button>
                          </div>  
                         

                        </div>
                        <!-- end row -->

                    </div>
                </div>
                        <!-- // end table row -->

                  <!-- <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                        <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 20px;color: black;">Save Communities Info</button>
                    </div>  
                  </div> -->

              </div>
              <!-- end main table div -->

              <label class="control-label" for="any_remarks"><span style="color: green;">★&nbsp;</span>Show All Para list with details according to avobe watershed:</label>
              

              <div class="col-md-12">
                
                  <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>
                  <input type="hidden" name="watershed_id" id="watershed_id" value=""/>
                  <input type="hidden" name="watershed_name" id="watershed_name" value=""/>

                  <!-- <div class="col-md-2" style="margin: 30px 0px 30px 0px;">
                    <a href="{{ route('Para.Boundary.Basic.Info') }}">
                      <button type="submit" class="btn btn-info" id="btn_new_para" style="width: 100%;border-radius: 5px;color: black;">Add New Para</button>
                    </a>
                  </div>   -->
                  
                  <table width="100%" class="table table-bordered table-striped datatable dtr-inline" id="my_table">
                  <thead>
                    <tr style="background-color: #6bbfd9;">
                      <th style="text-align: center;width: 5%;">Serial</th>
                      <th style="text-align: center;width: 6%;">Watershed Id</th>
                      <th style="text-align: left;width: 10%;">Para Name</th>
                      <th style="text-align: center;width: 5%;">Area</th>
                      <th style="text-align: center;width: 6%;">Karbari</th>
                      <th style="text-align: center;width: 6%;">Headman</th>
                      <th style="text-align: center;width: 6%;">Mouza</th>
                      <th style="text-align: center;width: 6%;">Union</th>
                      <th style="text-align: center;width: 6%;">Upazila</th>
                      <th style="text-align: center;width: 8%;">Edit Para Info</th>
                      <th style="text-align: center;width: 10%;">Action</th>
                    </tr>
                  </thead>
                
                  <tbody id="table_body"></tbody>

                    <!-- <tfoot>;
                    <tr style="background-color: #eeee;">';
                    <td colspan="3" style="text-align: right;font-weight: bold;"> Total</td>;
                    <td style="text-align: right;font-weight: bold;" id="debit_total"></td>;
                    <td style="text-align: right;font-weight: bold;" id="credit_total"></td>;
                    </tr>;
                    </tfoot>; -->

                </table>

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
<!-- this page js -->
<script src="{{ mix('resources/scripts/para_boundary/basic_info.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ mix('resources/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

@endsection
