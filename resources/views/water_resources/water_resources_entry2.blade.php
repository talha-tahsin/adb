


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
            <h1 class="m-0" style="font-family: Calibri;">Water Resources : Entry 2 </h1>
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
                        <label class="control-label validate" for="para_list"><span style="color: red;">★&nbsp;</span>Para</label> 
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
                <hr style="border-bottom: 2px solid black;">
                    <div class="row">

                        <div class="col-md-9" style="margin: 10px 0px 10px 0px;">

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 0px 0px 10px 0px;">
                              <label class="control-label validate" for="current_state">
                              (1)	What is the current state of the rivers and other waterbodies?  </label>
                              <input type="text" name="current_state" id="current_state" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Write Relevent as Question...">
                            </div>
                          </div>

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="existing_conversation">
                              (2) What are the existing conservation measures for water resource management?</label>
                              <input type="text" name="existing_conversation" id="existing_conversation" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Write Relevent as Question...">
                            </div> 
                          </div> 
                            
                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="tech_used_for_transport">
                              (3) What are the technologies used to transport drinking water and store?</label>
                              <input type="text" name="tech_used_for_transport" id="tech_used_for_transport" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Write Relevent as Question...">
                            </div> 
                          </div>
                          <!-- end row -->

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="recommendation">
                              (4) Any recommendation to improve water availability</label>
                              <input type="text" name="recommendation" id="recommendation" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Write Relevent as Question...">
                            </div> 
                          </div>
                          <!-- end row -->

                      </div>
                      <!-- end of col-md-4 -->


                </div>
                <!-- // end table row -->

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                                <button type="submit" class="btn btn-primary" id="btn_store2" style="width: 100%;border-radius: 20px;color: black;">Save Info Details</button>
                            </div>  
                        </div>

              </div>
              <!-- end main table div -->
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
<script src="{{ mix('resources/scripts/water_resources/water_resources_entry1.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
