


@extends('layouts.master')

@section('current_page_css')
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
            <h1 class="m-0">Para Info List</h1>
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
              <input type="hidden" name="watershed_id" id="watershed_id" value=""/>
              <input type="hidden" name="watershed_name" id="watershed_name" value=""/>

              <div class="col-md-2" style="margin: 30px 0px 30px 0px;">
                <a href="{{ route('Para.Boundary.Basic.Info') }}">
                  <button type="submit" class="btn btn-info" id="btn_new_para" style="width: 100%;border-radius: 5px;color: black;">Add New Para</button>
                </a>
              </div>  

              <table width="100%" class="table table-bordered table-striped datatable dtr-inline" id="my_table">
              <thead>
                <tr style="background-color: #6bbfd9;">
                  <th style="text-align: center;width: 5%;">Serial</th>
                  <th style="text-align: center;width: 5%;">Watershed Id</th>
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

          <div class="example-modal">
            <div class="modal fade" id="myModal" role="dialog" style="z-index: 99999;">
            <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">         
            <div class="modal-header" style="background-color: #001a33;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="modal_head">
            <font color="white" style="text-align: left;"><span id="headmgs">Voucher Details</span></font>
            </h4>
            </div>

            <!-- // modal body starts -->
            <div class="modal-body">  
            <div id="mgs"></div>

            <!-- <input id="userName" value="'.$_SESSION['gluserName'].'" type="hidden">'; -->

            <div class="row">
            <!-- <div class="col-sm-1"></div>'; -->
            <div class="col-sm-2" style="margin: 0px 0px 0px 0px;text-align: left;"> 
            <label style="font-family: Tahoma;font-size: 15px;margin: 5px 0px 5px 0px;">
            <span style="color: red;">★&nbsp;</span>User Id</label></div>
            <div class="col-sm-5" style="margin: 0px 0px 0px 0px;">
            <input type="text" class="form-control" name="user_id" id="user_id" value="" style="border-radius: 5px;border: 2px solid #77c3e1" disabled>
            </div>

            </div> 
            <!-- // end row -->
          
            <div class="row">
            <!-- <div class="col-sm-1"></div>'; -->
            <div class="col-sm-2" style="margin: 20px 0px 0px 0px;text-align: left;"> 
            <label style="font-family: Tahoma;font-size: 15px;margin: 5px 0px 5px 0px;">
            <span style="color: red;">★&nbsp;</span>User Status </label></div>
            <div class="col-sm-5" style="margin: 20px 0px 0px 0px;">
            <select id="usr_status" name="usr_status" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
            <option value="" selected disabled>Select Status</option>
            <option value="active">Active</option>
            <option value="disabled">Disabled</option>

            </select>
            </div>
            
            </div> 
            <!-- // end row -->
          

            <div class="row">
            
            <div class="col-sm-2" style="margin: 20px 0px 0px 0px;text-align: left;"> 
              <label style="font-family: Tahoma;font-size: 15px;margin: 5px 0px 5px 0px;">
              <span style="color: red;">★&nbsp;</span>User Role </label></div>
                <div class="col-sm-5" style="margin: 20px 0px 0px 0px;">
                  <select id="usr_role" name="usr_role" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                    <option value="" selected disabled>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="receipt_all">Receipt All</option>
                    <option value="admit_all">Admit All</option>
                    <option value="voucher_all">Voucher All</option>
                    <option value="reports">Reports</option>
                    <option value="all">All</option>
                  </select>
                </div>

            </div> 
            <!-- // end row -->

              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3" style="margin: 30px 0px 30px 0px;">
                <button type="submit" class="btn btn-info" id="btn_updt" style="width: 100%;border-radius: 20px;color: black;">Update User Info</button>
                </div>
              </div>
          

                </div>  
                <!-- // end of modal-body -->

                <div class="modal-footer" style="background-color: #f4f4f4;text-align:center;">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>

                    </div>  
                    <!-- // end of modal-content -->
                  </div> 
                  <!-- // end of modal-dialog -->
                </div>  
              <!-- // end of modal fade      -->
          </div>  
          <!-- // end of modal -->

    
              </div>  
              <!-- end card body -->
            </div>  
            <!-- end car-primary -->
          </div>  
          <!-- end col-md-12 -->

        </div> 
        <!-- end row -->


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
<script src="{{ mix('resources/scripts/para_boundary/para_info_list.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ mix('resources/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ mix('resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

@endsection
