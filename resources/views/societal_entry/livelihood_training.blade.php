


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
            <h1 class="m-0" style="font-family: Serif;">Education Entry : Part 2</h1>
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
          <div class="col-sm-12">
              <div class="card card-primary card-outline card-tabs">
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
                              <button type="submit" class="btn btn-info" id="get_communities" style="width: 100%;border-radius: 20px;color: black;">Get Form Table for Entry</button>
                          </div>

                        </div> 
                        <!-- end row -->

                        <div class="form-group" id="table_div">
                          <div class="row">
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
                          <!-- // end table row -->

                          <div class="row">
                              <div class="col-md-10"></div>
                              <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                                  <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 20px;color: black;">Save Population Info</button>
                              </div>  
                          </div>

                        </div>
                        <!-- end main table div -->
                         
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
                                <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 5px;color: black;">Save Info</button>
                            </div>  
                          </div>

                        </div>
                        <!-- end div col-6 -->


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
<script src="{{ mix('resources/scripts/societal_entry/livelihood_training.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
