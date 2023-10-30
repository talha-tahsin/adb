


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
            <h1 class="m-0" style="font-family: Serif;">Education Entry : Part 2</h1>
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

                          <!-- <div class="col-md-2" style="margin: 40px 0px 20px 0px;">
                              <button type="submit" class="btn btn-info" id="get_communities" style="width: 100%;border-radius: 20px;color: black;">Get All Communities for Entry</button>
                          </div> -->

                        </div> 
                        <!-- end row -->

                        <div class="form-group" id="table_div">
                          <div class="row">
                              <div class="col-md-12" style="margin: 20px 0px 10px 0px;">
                                <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="section_b">

                                  <thead>
                                      
                                      <tr style="background-color: #8ed6f2;">
                                          <th rowspan="2" style="text-align:center;">Serial </th>
                                          <th rowspan="2" style="text-align:left;">Training on </th>
                                          <th rowspan="2" style="text-align:center;">Select </th>
                                          <th rowspan="2" style="text-align:center;">Number of training received </th>
                                          <th colspan="2" style="text-align:center;">Were these training useful</th>
                                          <th colspan="2" style="text-align:center;">Do you want these type of training in future</th>
                                          <th rowspan="2" style="text-align:center;">Percentage of women participation</th>
                                          <th colspan="3" style="text-align:center;">Organization Involved</th>
                                          
                                      </tr>

                                      <tr style="background-color: #99ccff;">
                                          <th style="text-align:center;border-bottom: none;">Yes</th>
                                          <th style="text-align:center;border-bottom: none;">No</th>
                                          <th style="text-align:center;border-bottom: none;">Yes</th>
                                          <th style="text-align:center;border-bottom: none;">No</th>

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
                         <!-- end form-group -->


                  </div>
              </div>
          </div>
      </div>
      <!-- /end main row -->


    </div>
</section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ mix('resources/scripts/societal_entry/education_part2_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
