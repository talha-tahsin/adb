


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
            <h1 class="m-0" style="font-family: Serif;">Community Wise Population View</h1>
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
                        <button type="submit" class="btn btn-info" id="viewPopulation" style="width: 100%;border-radius: 20px;color: black;">Get Population List</button>
                    </div>

              </div> 
              <!-- end row -->

              <div class="form-group hide" id="table_div">
                    <div class="row">
                        <div class="col-md-12" style="margin: 20px 0px 20px 0px;">
                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                            <thead>
                                
                                <tr style="background-color: #8ed6f2;">
                                    <!-- <th rowspan="2" style="text-align:center;">Serial </th> -->
                                    <th rowspan="2" style="text-align:left;">Name </th>
                                    <th colspan="6" style="text-align:center;">Age Group Male</th>
                                    <th colspan="6" style="text-align:center;">Age Group Female</th>
                                    <th colspan="2" style="text-align:center;">Total Population </th>
                                    <th colspan="2" style="text-align:center;">Disabled People </th>
                                    <th rowspan="2" style="text-align:center;">Action </th>
                                    <th rowspan="2" style="text-align:center;">Action </th>
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
                                    <!-- <th style="text-align:center;border-bottom: none;">In Total </th> -->

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
              <h5 class="modal-title" id="myModalTitle">Population Update for :  <strong id="cum_name" style="color: green;"></strong> </h5>
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
                <span style="color: red;">★&nbsp;</span>Male Under 5</label>
                <input type="text" class="form-control m_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="maleUnder5" id="maleUnder5" value="">
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Feamle Under 5</label>
                <input type="text" class="form-control fe_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="femaleUnder5" id="femaleUnder5" value="">
              </div>

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Male 5 to 14</label>
                <input type="text" class="form-control m_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="male5to14" id="male5to14" value="">
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Feamle 5 to 14</label>
                <input type="text" class="form-control fe_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="female5to14" id="female5to14" value="">
              </div>

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Male 15 to 19</label>
                <input type="text" class="form-control m_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="male15to19" id="male15to19" value="">
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Feamle 15 to 19</label>
                <input type="text" class="form-control fe_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="female15to19" id="female15to19" value="">
              </div>

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Male 20 to 49</label>
                <input type="text" class="form-control m_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="male20to49" id="male20to49" value="">
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Feamle 20 to 49</label>
                <input type="text" class="form-control fe_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="female20to49" id="female20to49" value="">
              </div>

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Male 50 to 65</label>
                <input type="text" class="form-control m_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="male50to65" id="male50to65" value="">
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="male20to49">
                <span style="color: red;">★&nbsp;</span>Feamle 50 to 65</label>
                <input type="text" class="form-control fe_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="female50to65" id="female50to65" value="">
              </div>

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Male 65 Up</label>
                <input type="text" class="form-control m_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="male65Up" id="male65Up" value="">
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Feamle 65 Up</label>
                <input type="text" class="form-control fe_num" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="female65Up" id="female65Up" value="">
              </div>

            </div>

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Total Male</label>
                <input type="text" class="form-control total" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="totalMale" id="totalMale" value="" disabled>
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Total Female </label>
                <input type="text" class="form-control total" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="totalFemale" id="totalFemale" value="" disabled>
              </div>
            </div>
            

            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Grand Total</label>
                <input type="text" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="grndTotal" id="grndTotal" value="" disabled>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-1"></div> 
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Disable Male</label>
                <input type="text" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="disableMale" id="disableMale" value="">
              </div>
              <div class="col-md-5" style="margin: 0px 0px 10px 0px;">
                <label class="control-label  validate" for="voucher_date">
                <span style="color: red;">★&nbsp;</span>Disable Female</label>
                <input type="text" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" name="disableFemale" id="disableFemale" value="">
              </div>

            </div>
            

            <!-- </div>  -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="updatePopulation" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>



        </div>
    </section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ asset('scripts/societal_view/view_population.js') }}"></script>
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
