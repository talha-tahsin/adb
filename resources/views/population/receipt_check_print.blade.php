


@extends('layouts.master')

@section('current_page_css')
<!-- datepicker -->
<link rel="stylesheet" href="{{ asset('plugins/datepicker/css/jquery-ui-1.9.2.custom.min.css') }}">
<!-- dataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header" style="margin: 0px 0px -15px 0px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="font-family: Serif;">Medical Test Receipt Check & Print</h1>
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

          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-body">

              <div id="initial_text" class="form-group" style="margin: 60px 0px 170px 20px;">
                <h3 style="font-family: Trebuchet MS;font-style: italic;">
                Please Select Options Properly From the Right Side...</h3>
              </div>

                <div id="receipt_div" class="form-group hide" style="margin: 0px 0px 30px 0px;">

                  <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>

                    <table width="100%" class="table table-bordered table-striped datatable dtr-inline" id="tab_user_role">
                      <thead>
                        <tr style="background-color: #6bbfd9;">
                          <!-- <th style="text-align: center;width: 5%;">Serial</th> -->
                          <th style="text-align: center;width: 5%;">Receipt_No</th>
                          <th style="text-align: center;width: 5%;">Receipt_Date</th>
                          <th style="text-align: left;width: 15%;">Patient Name</th>
                          <th style="text-align: center;width: 5%;">Age</th>
                          <th style="text-align: center;width: 10%;">Cont Number</th>
                          <th style="text-align: center;width: 5%;">Amount</th>
                          <th style="text-align: center;width: 6%;">Status</th>
                          <th style="text-align: center;width: 6%;">Action</th>
                        </tr>
                      </thead>
                
                    <tbody id="tab_body"></tbody>

                    <!-- <tfoot>;
                    <tr style="background-color: #eeee;">';
                    <td colspan="3" style="text-align: right;font-weight: bold;"> Total</td>;
                    <td style="text-align: right;font-weight: bold;" id="debit_total"></td>;
                    <td style="text-align: right;font-weight: bold;" id="credit_total"></td>;
                    </tr>;
                    </tfoot>; -->

                  </table>

              </div>
              <!-- end form div  -->

    
            </div>  
            <!-- end card body -->
          </div>  
          <!-- end car-primary -->
        </div>  
        <!-- end col-md-9 -->

        <!-- ======= * ======= * ======= * ======== -->
          <div class="col-md-3">
            
            <div class="col-md-12">
              <div class="card card-info card-outline">
                <div class="card-body">

                    <div class="row">
                      <div class="col-md-1"></div>

                        <div class ="col-md-10" style="margin: 5px 0px 10px 0px;">
                          <label class="control-label validate" >
                          <span style="color: red;">★&nbsp;</span>Start Date </label>
                          <input type="text" class="form-control date" style="border-radius: 5px;border: 2px solid #898AEE;" name="start_date" id="start_date" placeholder="Enter Start Date">
                        </div>

                      </div> 
                      <!-- end row -->

                      <div class="row">
                      <div class="col-md-1"></div>

                        <div class ="col-md-10" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" >
                          <span style="color: red;">★&nbsp;</span>End Date </label>
                          <input type="text" class="form-control date" style="border-radius: 5px;border: 2px solid #898AEE;" name="end_date" id="end_date" placeholder="Enter End Date">
                        </div>

                      </div> 
                      <!-- end row -->


                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="margin: 20px 0px 30px 0px;">
                          <button type="submit" class="btn btn-success" id="btn_getData" style="width: 100%;border-radius: 20px;color: black;">Show Test Receipt</button>
                        </div>
                      </div>

                  </div>  
                  <!-- end card body -->
                </div>  
                <!-- end car-primary -->
              </div>  
              <!-- end col-md-12 -->

          </div>  
          <!-- end col-md-3 -->

        </div> 
        <!-- end main content row -->



        </div>
    </section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ asset('js/receipt_check_print.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/jquery-ui.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

@endsection
