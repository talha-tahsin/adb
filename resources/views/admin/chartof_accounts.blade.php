


@extends('layouts.master')

@section('current_page_css')
<!-- datepicker -->
<link rel="stylesheet" href="{{ mix('resources/plugins/datepicker/css/jquery-ui-1.9.2.custom.min.css') }}">

@endsection

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Chart of Accounts</h1>
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

                <div class="form-group" style="margin: 0px 0px 30px 0px;">

                  <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>

                  <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label  validate" for="voucher_date">
                      <span style="color: red;">★&nbsp;</span>Test Date</label>
                      <input type="text" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;" name="entry_date" id="entry_date" value="{{ date('Y-m-d') }}">
                    </div>

                  <div class="col-md-2"></div>

                  <div class ="col-md-3" style="margin: 10px 0px 10px 0px;">
                    <label class="control-label validate" >
                    <span style="color:red;">★&nbsp;</span>Gender </label>

                    <select id="gender" name="gender" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                      <option value="" selected disabled>Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="others">Others</option>
                    </select>
                  </div>
        
                  </div>
                  <!-- end row  -->


                  <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="patient_nm">
                      <span style="color: red;">★&nbsp;</span>Patient Name</label>
                      <input type="text" class="form-control" placeholder="Enter patient name" name="patient_nm" id="patient_nm" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                    <div class="col-md-2"></div>

                    <div class="col-md-3" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="cont_num">
                      <span style="color: red;">★&nbsp;</span>Contact Number</label>
                      <input type="text" class="form-control" placeholder="Enter contact number" name="cont_num" id="cont_num" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                  </div> 
                  <!-- end row -->

                  <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="patient_age">
                      <span style="color: red;">★&nbsp;</span>Patient Age</label>
                      <input type="text" class="form-control" placeholder="Enter patient age" name="patient_age" id="patient_age" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                    <div class="col-md-2"></div>

                    <div class="col-md-3" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="address">
                      <span style="color: red;">★&nbsp;</span>Address</label>
                      <input type="text" class="form-control" placeholder="Enter patient address" name="address" id="address" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                  </div>
                  <!-- end row  -->
                </div>
                <!-- end form div  -->

              <div class="form-group hide" id="table_row">

                <div class="row">
                  <div class="col-md-1"></div>

                  <div class="col-md-8" style="margin: 10px 0px 0px 0px;">
                    <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                      <thead>
                        <tr style="background-color: #8ed6f2;">
                          <th>SL</th>
                          <th>Test code</th>
                          <th>Test Name</th>
                          <th style="text-align: left;">Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tfoot>
                        <tr style="background-color: #f1f5f5;">
                        <td colspan="3" style="text-align: right;font-weight: bold;">Total</td>
                        <td id="total_amount" style="text-align: right;color: red;"></td>
                        <td>&nbsp;</td>
                        </tr>
                      </tfoot>

                  <tbody id="table_body"></tbody>

                </table>
              </div>

                <div class="col-md-1"></div>
              </div>
              <!-- // end table row -->

              <div class="row">
                <div class="col-md-7"></div>
                  <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                    <button type="submit" class="btn btn-primary" id="btn_save" style="width: 100%;border-radius: 20px;color: black;">Save Invoice</button>
                  </div>
                <div class="col-md-1"></div>
              </div>

              </div>
              <!-- end main table div -->

    
              </div>  
              <!-- end card body -->
            </div>  
            <!-- end car-primary -->
          </div>  
          <!-- end col-md-9 -->

        <!-- ======= * ======= * ======= * ======== -->
          <div class="col-md-3">
            <div class="card card-info card-outline">
              <div class="card-body">

                <div class="row">
                  <div class="col-md-1"></div>

                    <div class ="col-md-10" style="margin: 10px 0px 20px 0px;">
                      <label class="control-label validate" >
                      <span style="color: red;">★&nbsp;</span>Test Category </label>

                      <select id="test_nm" name="test_nm" class="custom-select form-control" style="border-radius: 5px;border: 2px solid #898AEE;">
                        <option value="" selected disabled>Select Test</option>
                        <option value="1011">CBC</option>
                        <option value="1012">RBS</option>
                        <option value="1013">Urine C/S</option>
                        <option value="1014">Chest P/A View</option>
                        <option value="1015">RCU</option>
                        <option value="1016">TVS</option>
                        <option value="1017">Thyroid</option>
                      </select>
                    </div>

                  </div> 
                  <!-- end row -->


                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10" style="margin: 10px 0px 50px 0px;">
                      <button type="submit" class="btn btn-info" id="add_test" style="width: 100%;border-radius: 20px;color: black;">Add Test Report</button>
                    </div>
                  </div>
                

              </div>  
              <!-- end card body -->
            </div>  
            <!-- end car-primary -->
          </div>  
          <!-- end col-md-3 -->

        </div> 
        <!-- end main content row -->



        </div>
    </section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ mix('resources/js/receipt_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
