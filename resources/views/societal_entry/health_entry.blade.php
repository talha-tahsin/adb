


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
            <h1 class="m-0" style="font-family: Serif;">Health Entry</h1>
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
                              
                                  <div class="col-md-7" style="margin: 20px 0px 10px 0px;">
                                    <h4>(a) Tendency to take modern health services and facilities</h4>
                                      <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                                          <thead>
                                              
                                              <tr style="background-color: #8ed6f2;">
                                                  <th style="text-align: left;">Health Center </th>
                                                  <th style="text-align: center;">Percentage of people</th>
                                                  <th style="text-align: center;">Distance from the para centre (km)</th>
                                                  <th style="text-align: center;">Reason for taking Services</th>
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
                                      <h4>(c) How many people (%) receive or have a tendency to receive ethno medicine? </h4>
                                      <input type="text" id="tendency_of_medicine" class="form-control col-md-4" placeholder="Write with percentage (%)" style="border-radius: 5px;border:2px solid #898AEE;">
                                  </div>
                                  <!-- end div col-7 -->

                                  <div class="col-md-5" style="margin: 20px 0px 10px 0px;">
                                    <h4>(b) Which diseases are prevalent in the para</h4>

                                    <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="diseases_table">

                                      <thead>
                                          
                                          <tr style="background-color: #8ed6f2;">
                                              <th style="text-align: left;">Name of the Diseases</th>
                                              <th style="text-align: center;">Ranking</th>
                                          </tr>
                                          
                                      </thead>

                                      <!-- <tfoot>
                                          <tr style="background-color: #f1f5f5;">
                                              <td colspan="3" style="text-align: right;font-weight: bold;">Total</td>
                                              <td id="total_amount" style="text-align: right;color: red;"></td>
                                              <td>&nbsp;</td>
                                          </tr>
                                      </tfoot>  -->

                                      <tbody id="table_body"></tbody></table>

                                  </div>
                                  <!-- end div col-6 -->
                            </div>

                         </div>
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
<script src="{{ mix('resources/scripts/societal_entry/health_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
