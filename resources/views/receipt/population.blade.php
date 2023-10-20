


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
            <h1 class="m-0" style="font-family: Serif;">Community-Wise Population Distribution</h1>
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
                          <div class="col-md-12">
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                            <thead>
                                
                                <tr style="background-color: #8ed6f2;">
                                    <th rowspan="2" style="text-align:center;">Serial </th>
                                    <th rowspan="2" style="text-align:left;">Name </th>
                                    <th rowspan="2" style="text-align:center;">Select </th>
                                    <th colspan="6" style="text-align:center;">Age Group Male</th>
                                    <th colspan="6" style="text-align:center;">Age Group Female</th>
                                    <th colspan="3" style="text-align:center;">Total Population </th>
                                    <th colspan="2" style="text-align:center;">Disabled People </th>
                                    
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
                            <div class="col-md-10"></div>
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                                <button type="submit" class="btn btn-primary" id="save_CommunityInfo" style="width: 100%;border-radius: 20px;color: black;">Save Community Info</button>
                            </div>  
                        </div>

                      <!-- </div> -->
                        <!-- end main table div -->

    
              </div>  
              <!-- end card body -->
            </div>  
            <!-- end car-primary -->
          </div>  
          <!-- end col-md-9 -->

        </div> 
        <!-- end main content row -->



        </div>
    </section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ mix('resources/Scripts/Population.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
