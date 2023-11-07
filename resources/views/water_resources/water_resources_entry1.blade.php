


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
            <h1 class="m-0" style="font-family: Calibri;">Water Resources : Entry 1 </h1>
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
                    
                    <div class="col-md-2" style="margin: 10px 0px 20px 0px;">
                        <label class="control-label validate" for="type"><span style="color: red;">★&nbsp;</span>Type</label> 
                        <select id="type" name="type" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;" disabled>
                          <option value="" selected disabled> Select Type</option>                          
                          <option value="0101"> River</option>                          
                          <option value="0202"> Spring</option>                          
                          <option value="0303"> Lake</option>                          
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

                        <div class="col-md-3" style="margin: 10px 0px 10px 0px;">

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 0px 0px 10px 0px;">
                              <label class="control-label validate" for="name">
                              <span style="color: red;">★&nbsp;</span>Name</label>
                              <input type="text" name="name" id="name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                            </div>
                          </div>

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="location_north">
                              <span style="color: red;">★&nbsp;</span>Location (Northing)</label>
                              <input type="text" name="location_north" id="location_north" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                            </div> 
                          </div> 
                            
                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="location_south">
                              <span style="color: red;">★&nbsp;</span>Location (Southing)</label>
                              <input type="text" name="location_south" id="location_south" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                            </div> 
                          </div>
                          <!-- end row -->

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="source">
                              <span style="color: red;">★&nbsp;</span>Source</label>
                              <input type="text" name="source" id="source" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                            </div> 
                          </div>
                          <!-- end row -->

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="outlet">
                              <span style="color: red;">★&nbsp;</span>Outlet</label>
                              <input type="text" name="outlet" id="outlet" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                            </div> 
                          </div>
                          <!-- end row -->

                          <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8" style="margin: 10px 0px 10px 0px;">
                              <label class="control-label validate" for="distance">
                              <span style="color: red;">★&nbsp;</span>Distance From para center</label>
                              <input type="text" name="distance" id="distance" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                            </div> 
                          </div>
                          <!-- end row -->

                      </div>
                      <!-- end of col-md-4 -->

                      <div class="col-md-8" style="margin: 20px 0px 10px 0px;">

                          <!-- <h4>(3.1)	Connecting road in the para and distance from para center? </h4> -->

                          <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="water_table">
                              <thead>
                                  <tr style="background-color: #8ed6f2;">
                                      <th style="text-align: center;">Serial</th>
                                      <th style="text-align: left;">Season</th>
                                      <th style="text-align: center;">Water Availability (Ft)</th>
                                      <th style="text-align: left;">Season</th>
                                      <th style="text-align: center;">Average Water Depth (Ft)</th>
                                  </tr>
                              </thead>

                              <tbody id="table_body">
                                <tr>
                                  <td style="text-align: center;width: 5%">1</td> 
                                  <td style="text-align: left;width: 20%">March | April | May</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="availability_mam" class="form-control" placeholder="Write in Foot">
                                  </td>
                                  <td style="text-align: left;width: 20%">March | April | May</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="depth_mam" class="form-control" placeholder="Write in Foot">
                                  </td>
                                </tr>

                                <tr>
                                  <td style="text-align: center;width: 5%">2</td> 
                                  <td style="text-align: left;width: 20%">June | July | August | September</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="availability_jjas" class="form-control" placeholder="Write in Foot">
                                  </td>
                                  <td style="text-align: left;width: 20%">June | July | August | September</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="depth_jjas" class="form-control" placeholder="Write in Foot">
                                  </td>
                                </tr>

                                <tr>
                                  <td style="text-align: center;width: 5%">3</td> 
                                  <td style="text-align: left;width: 20%">October | November</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="availability_on" class="form-control" placeholder="Write in Foot">
                                  </td>
                                  <td style="text-align: left;width: 20%">October | November</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="depth_on" class="form-control" placeholder="Write in Foot">
                                  </td>
                                </tr>

                                <tr>
                                  <td style="text-align: center;width: 5%">4</td> 
                                  <td style="text-align: left;width: 20%">December | January | February</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="availability_djf" class="form-control" placeholder="Write in Foot">
                                  </td>
                                  <td style="text-align: left;width: 20%">December | January | February</td> 
                                  <td style="text-align: center;width: 20%">
                                    <input type="text" id="depth_djf" class="form-control" placeholder="Write in Foot">
                                  </td>
                                </tr>

                              </tbody>

                            </table>

                            <div class="col-md-8" style="margin: 0px 0px 0px 0px;">
                                <label class="control-label  validate" for="orchard_female">
                                Select the Purpose of use</label>
                            </div>
                            
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" id="drinking" type="checkbox" value="Drinking">
                                    <label class="form-check-label">Drinking</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" id="domestic" type="checkbox" value="Domestic use">
                                    <label class="form-check-label">Domestic use</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" id="irrigation" type="checkbox" value="Irrigation">
                                    <label class="form-check-label">Irrigation</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" id="cattle" type="checkbox" value="Cattle feeding">
                                    <label class="form-check-label">Cattle feeding</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" id="other" type="checkbox" value="Other">
                                    <label class="form-check-label">Other</label>
                                  </div>
                                </div>
                            </div>

                            

                      </div>


                </div>
                <!-- // end table row -->

                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                                <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 20px;color: black;">Save Info Details</button>
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
