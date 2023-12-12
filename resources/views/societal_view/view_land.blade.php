


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
            <h1 class="m-0" style="font-family: Serif;">Household View</h1>
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
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-body">

                  <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>

                  <div class="row"> 
                    <!-- <div class="col-md-1"></div>  -->

                    <div class="col-md-2" style="margin: 10px 0px 20px 0px;">
                        <label class="control-label validate" for="community_id">
                            <span style="color: red;">★&nbsp;</span>Watershed Id
                        </label> 

                        <select id="watershedId" name="watershedId" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">

                        </select>
                    </div> 

                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-2" style="margin: 10px 0px 20px 0px;">
                        <label class="control-label validate" for="community_id">
                            <span style="color: red;">★&nbsp;</span>Para
                        </label> 

                        <select id="para_list" name="para_list" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;" >
                           
                        </select>
                    </div> 

                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-2" style="margin: 40px 0px 20px 0px;">
                        <button type="submit" class="btn btn-info" id="btn_household_list" style="width: 100%;border-radius: 20px;color: black;">Get Household List</button>
                    </div>

              </div> 
              <!-- end row -->

              <div class="form-group hide" id="table_div">
                    <div class="row">
                        <div class="col-md-12" style="margin: 20px 0px 20px 0px;">
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                            <thead>
                                
                            <tr style="background-color: #8ed6f2;">
                                    <th rowspan="2" style="text-align:center;">Serial </th>
                                    <th rowspan="2" style="text-align:left;">Name </th>
                                    <th colspan="4" style="text-align:center;">Type of Household</th>
                                    <th rowspan="2" style="text-align:center;">Total Number of House </th>
                                    <th rowspan="2" style="text-align:center;">Action </th>
                                    <th rowspan="2" style="text-align:center;">Action </th>
                                </tr>

                                <tr style="background-color: #99ccff;">
                                    <th style="text-align:center;border-bottom: none;">Jhupri</th>
                                    <th style="text-align:center;border-bottom: none;">Kacha</th>
                                    <th style="text-align:center;border-bottom: none;">Semi Pacca</th>
                                    <th style="text-align:center;border-bottom: none;">Pacca</th>
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

                <!-- <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                        <button type="submit" class="btn btn-primary" id="save_CommunityInfo" style="width: 100%;border-radius: 20px;color: black;">Save Population Info</button>
                    </div>  
                </div> -->

            </div>
          <!-- end main table div -->

    
              </div>  
              <!-- end card body -->
            </div>  
            <!-- end car-primary -->
          </div>  
          <!-- end col-md-9 -->

        </div> 
        <!-- end main content row -->

        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Launch demo modal</button> -->

      <!-- Modal -->
      <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalTitle">Household Update for :  <strong id="cum_name" style="color: green;"></strong> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <input id="userName" value="'.$_SESSION['gluserName'].'" type="hidden">
            <input id="row_id" name="row_id" value="" type="hidden">

           <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Jhupri House</label>
                <input type="text" class="form-control count" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="jhupriType" id="jhupriType" value="">
              </div>
              
            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Kacha House</label>
                <input type="text" class="form-control count" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="kachaType" id="kachaType" value="">
              </div>
              

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Semi Pacca House</label>
                <input type="text" class="form-control count" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="semiPacca" id="semiPacca" value="">
              </div>
              

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Pacca House</label>
                <input type="text" class="form-control count" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="paccaType" id="paccaType" value="">
              </div>
             
            </div> 

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Total House</label>
                <input type="text" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="totalHouse" id="totalHouse" value="" disabled>
              </div>
            </div>
            
            
            

            <!-- </div>  -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="update_info" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>



        </div>
    </section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ asset('scripts/societal_view/view_household.js') }}"></script>
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
