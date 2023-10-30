


@extends('layouts.master')

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
            <h1 class="m-0" style="font-family: Serif;">Economic Status Entry</h1>
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
                        <button type="submit" class="btn btn-info" id="get_communities" style="width: 100%;border-radius: 20px;color: black;">Get All Communities for Entry</button>
                    </div>

              </div> 
              <!-- end row -->

              <div class="form-group hide" id="table_div">
                    <div class="row">
                        <div class="col-md-12" style="margin: 20px 0px 10px 0px;">
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                            <thead>
                                
                                <tr style="background-color: #8ed6f2;">
                                    <th rowspan="2" style="text-align:center;">Serial </th>
                                    <th rowspan="2" style="text-align:left;">Name </th>
                                    <th rowspan="2" style="text-align:center;">Select </th>
                                    <th colspan="4" style="text-align:center;">Number of House</th>
                                    <th colspan="6" style="text-align:center;">No. of HHs. Growing Sufficient Food from their own lands</th>
                                </tr>

                                <tr style="background-color: #99ccff;">
                                    <th style="text-align:center;border-bottom: none;">Very Poor</th>
                                    <th style="text-align:center;border-bottom: none;">Poor</th>
                                    <th style="text-align:center;border-bottom: none;">Middle Class</th>
                                    <th style="text-align:center;border-bottom: none;">Better Off</th>

                                    <th style="text-align:center;border-bottom: none;">- 3 months</th>
                                    <th style="text-align:center;border-bottom: none;">3-6 months</th>
                                    <th style="text-align:center;border-bottom: none;">6-9 months</th>
                                    <th style="text-align:center;border-bottom: none;">9-12 months</th>
                                    <th style="text-align:center;border-bottom: none;">12 Months +</th>

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
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                        <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 20px;color: black;">Save Communities Info</button>
                    </div>  
                </div>

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
<script src="{{ mix('resources/scripts/societal_entry/economic_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
