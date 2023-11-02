


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
            <h1 class="m-0" style="font-family: Serif;">Sanitation Entry</h1>
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

                    <div class ="col-md-2" style="margin: 10px 0px 10px 0px;">
                        <label class="control-label validate" >
                          <span style="color: red;">★&nbsp;</span>Water Source </label>

                        <select id="water_source" name="water_source" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;" disabled>
                          <option value="" selected disabled>Select Source</option>
                          <option value="1001">Tube Well</option>
                          <option value="1002">Ring well</option>
                          <option value="1003">Dug well</option>
                          <option value="1004">Gravity Feed System</option>
                          <option value="1005">Springs</option>
                        </select>

                    </div>

                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-2" style="margin: 40px 0px 20px 0px;">
                        <button type="submit" class="btn btn-info" id="get_entry_form" style="width: 100%;border-radius: 20px;color: black;">Get Form Details for Entry</button>
                    </div>

              </div> 
              <!-- end row -->
              
              <div class="form-group hide" id="table_div">
                <hr style="border-bottom: 2px solid black;">
                    <div class="row">
                        <div class="col-md-12" style="margin: 10px 0px 10px 0px;">

                        <h4> (a) Average number and distance from the source</h4>
                        <div class="row">
                         
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="preferred_source">
                          <span style="color: red;">★&nbsp;</span>Preferred Source</label>
                          <input type="text" name="preferred_source" id="preferred_source" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Write Preferred Source">
                          </div> 

                          <div class="col-md-1"></div> 
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="drinking_water_number">
                          <span style="color: red;">★&nbsp;</span>No. of Drinking Water Source</label>
                          <input type="text" name="drinking_water_number" id="drinking_water_number" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="distance">
                          <span style="color: red;">★&nbsp;</span>Distance (Meter)</label>

                            <select id="distance" name="distance" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Distance</option>
                              <option value="Less than 50 (meter)">Less than 50 (meter)</option>
                              <option value="50-100 (meter)">50-100 (meter)</option>
                              <option value="100-250 (meter)">100-250 (meter)</option>
                              <option value="250-500 (meter)">250-500 (meter)</option>
                              <option value="Above 500 (meter)">Above 500 (meter)</option>
                            </select>

                          </div> 
                            
                        </div>
                        <!-- end row -->

                        <br><br>
                        <h4> (b)	Availability of the water sources during the dry period ?</h4>
                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          
                          <div class ="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" >
                            <span style="color:red;">★&nbsp;</span>Availability</label>

                            <select id="availability" name="availability" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Source</option>
                              <option value="Low">Low</option>
                              <option value="Medium">Medium</option>
                              <option value="High">High</option>
                            </select>

                          </div>

                          <div class="col-md-1"></div> 
                          
                          <div class ="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" >
                            <span style="color:red;">★&nbsp;</span>Quality</label>

                            <select id="quality" name="quality" class="form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                              <option value="" selected disabled>Select Quality</option>
                              <option value="Bad">Bad</option>
                              <option value="Medium">Medium</option>
                              <option value="Good">Good</option>
                            </select>

                          </div>

                          <div class="col-md-1"></div>

                          <div class="col-md-2" style="margin: 40px 0px 10px 0px;">
                              <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 20px;color: black;">Save Communities Info</button>
                          </div> 
                          
                          <!-- <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="fuel_wood_female">
                          <span style="color: red;">★&nbsp;</span>Fuel wood collection (Female)</label>
                          <input type="text" name="fuel_wood_female" id="fuel_wood_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>                            -->
                            
                        </div>
                        <!-- end row -->

                    </div>
                </div>
                        <!-- // end table row -->

                        <!-- <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                                <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 20px;color: black;">Save Communities Info</button>
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
