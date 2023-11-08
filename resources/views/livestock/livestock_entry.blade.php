


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
            <h1 class="m-0" style="font-family: Serif;">Livestock </h1>
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
                        <select id="watershedId" name="watershedId" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                        </select>
                    </div> 

                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-2" style="margin: 10px 0px 20px 0px;">
                        <label class="control-label validate" for="para_list">
                            <span style="color: red;">★&nbsp;</span>Para
                        </label> 
                        <select id="para_list" name="para_list" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;" >                          
                        </select>
                    </div> 

                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-2" style="margin: 40px 0px 20px 0px;">
                        <button type="submit" class="btn btn-info" id="get_entry_form" style="width: 100%;border-radius: 20px;color: black;">Get Form Details for Entry</button>
                    </div>

              </div> 
              <!-- end row -->
              
                <div class="form-group " id="table_div">
                <hr style="border-bottom: 2px solid Maroon;">

                    <div class="row">
                      
                          <div class="col-md-6" style="margin: 10px 0px 10px 0px;">
                            <h4>(1)	Identify the type, population of the livestock and Poultry in your area</h4>
                              <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                                  <thead>
                                      
                                      <tr style="background-color: #8ed6f2;">
                                          <th style="text-align: center;">Serial</th>
                                          <th style="text-align: left;">Livestock Type</th>
                                          <th style="text-align: left;">Nos.</th>
                                          <th style="text-align: left;">Unit Value (BDT)</th>
                                      </tr>
                                      
                                  </thead>

                                  <tbody id="table_body"></tbody>

                              </table>

                              <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                                    <button type="submit" class="btn btn-primary" id="btn_store1" style="width: 100%;border-radius: 20px;color: black;">Save Info Details</button>
                                </div>
                              </div>

                              <div class="row">
                                <!-- <div class="col-md-2"></div> -->
                                <div class="col-md-8" style="margin: 0px 0px 10px 0px;">
                                  <label class="control-label validate" for="current_state">
                                  (1)	Livestock and Poultry mortality rate and causes  </label>
                                  <input type="text" name="current_state" id="current_state" class="form-control" style="border-radius: 5px;border: 2px solid #EEB889;padding: 0px 15px 0px 15px;"  value="" placeholder="Please write something relevent as question...">
                                </div>
                              </div>

                              <br>
                              <div class="col-md-8" style="margin: 0px 0px 0px 0px;">
                                <label class="control-label  validate" for="orchard_female">(2) What are the livestock-rearing methods in this area?</label>
                              </div>
                            
                              <div class="col-sm-6">
                                  <!-- checkbox -->
                                  <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" id="drinking" type="checkbox" value="Drinking">
                                      <label class="form-check-label">Feed</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" id="domestic" type="checkbox" value="Domestic use">
                                      <label class="form-check-label">Graze in the wilderness</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" id="irrigation" type="checkbox" value="Irrigation">
                                      <label class="form-check-label">Shed</label>
                                    </div>
                                  </div>
                              </div>

                              <br>
                              <div class="col-md-8" style="margin: 0px 0px 0px 0px;">
                                <label class="control-label  validate" for="orchard_female">(3) Recommendation and future need for improved livestock and poultry production</label>
                              </div>
                            
                              <div class="col-sm-8">
                                  <!-- checkbox -->
                                  <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" id="drinking" type="checkbox" value="Drinking">
                                      <label class="form-check-label">(a)</label>
                                      <input type="text" name="current_state" id="current_state" class="form-control" style="border-radius: 5px;border: 2px solid #EEB889;padding: 0px 15px 0px 15px;"  value="" placeholder="Please write something relevent as question...">
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" id="domestic" type="checkbox" value="Domestic use">
                                      <label class="form-check-label">(b)</label>
                                      <input type="text" name="current_state" id="current_state" class="form-control" style="border-radius: 5px;border: 2px solid #EEB889;padding: 0px 15px 0px 15px;"  value="" placeholder="Please write something relevent as question...">
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" id="irrigation" type="checkbox" value="Irrigation">
                                      <label class="form-check-label">(c)</label>
                                      <input type="text" name="current_state" id="current_state" class="form-control" style="border-radius: 5px;border: 2px solid #EEB889;padding: 0px 15px 0px 15px;"  value="" placeholder="Please write something relevent as question...">
                                    </div>
                                  </div>
                              </div>

                          <div class="row">
                              <!-- <div class="col-md-9"></div> -->
                              <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                                  <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 20px;color: black;">Save Info</button>
                              </div>  
                          </div>
  
                        
                              
                    </div>
                    <!-- end div col-7 -->

                          <div class="col-md-6" style="margin: 10px 0px 10px 0px;">
                            @include('livestock.livestock_right_side')
                          </div>
                          <!-- end div col-6 -->
                    </div>

                   

                </div>
                <!-- end form-group -->
                

    
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
<script src="{{ mix('resources/scripts/livestock/livestock_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
