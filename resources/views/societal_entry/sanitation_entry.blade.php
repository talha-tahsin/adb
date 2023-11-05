


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
            <h1 class="m-0" style="font-family: Serif;">Sanitation Info Entry</h1>
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
              
                <div class="form-group hide" id="table_div">
                <hr style="border-bottom: 2px solid Gray;">
                    <div class="row">
                      
                          <div class="col-md-7" style="margin: 10px 0px 10px 0px;">
                            <h4>(1) Sanitation Information</h4>
                              <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="voucher_table">

                                  <thead>
                                      
                                      <tr style="background-color: #8ed6f2;">
                                          <th style="text-align: center;">Serial</th>
                                          <th style="text-align: left;">Latrine type</th>
                                          <th style="text-align: center;">Household Owned</th>
                                          <th style="text-align: center;">Shared</th>
                                          <th style="text-align: center;">Total</th>
                                          <th style="text-align: center;">Comments</th>
                                      </tr>
                                      
                                  </thead>

                                  <tbody id="table_body"></tbody>

                              </table>

                              <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3" style="margin: 20px 0px 30px 0px;">
                                    <button type="submit" class="btn btn-primary" id="btn_store1" style="width: 100%;border-radius: 20px;color: black;">Save Info</button>
                                </div>  
                              </div>
                              
                          </div>
                          <!-- end div col-7 -->

                          <div class="col-md-5" style="margin: 20px 0px 10px 0px;">
                            
                            <!-- <h4>(2) Number of users per latrine </h4> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label  validate" for="per_latrine_user">
                               (2) Number of users per latrine </label>
                            </div>  
                            <div class="col-md-4" style="margin: 0px 0px 10px 0px;">   
                              <input type="text" name="per_latrine_user" id="per_latrine_user" class="form-control" placeholder="Integer Number Only" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                            </div> 
              

                            <br>
                            <div class="col-md-12" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label  validate" for="orchard_female">
                              (3)	Are community people aware on washing hands, using sandals</label>
                            </div> 

                            <div class="col-md-4" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label  validate" for="orchard_female">
                              <span style="color: red;">★&nbsp;</span>Male</label>
                              <select id="male_awareness" name="male_awareness" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                                <option value="" selected disabled>Select </option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                            </div>
                            
                            <div class="col-md-4" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label  validate" for="orchard_female">
                              <span style="color: red;">★&nbsp;</span>Female</label>
                              <select id="female_awareness" name="female_awareness" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                                <option value="" selected disabled>Select </option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                            </div> 

                            <div class="row">
                              <div class="col-md-8"></div>
                              <div class="col-md-4" style="margin: 20px 0px 30px 0px;">
                                  <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 20px;color: black;">Save Info</button>
                              </div>  
                            </div>


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
<script src="{{ mix('resources/scripts/societal_entry/sanitation_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
