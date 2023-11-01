


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
            <h1 class="m-0" style="font-family: Serif;">Livelihood Entry</h1>
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

                    <div class="col-md-2" style="margin: 10px 0px 20px 0px;">
                        <label class="control-label validate" for="community_id">
                            <span style="color: red;">★&nbsp;</span>Community
                        </label> 
                        <select id="community" name="community" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;" disabled>                          
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

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_male">
                          <span style="color: red;">★&nbsp;</span>Jhum (Male)</label>
                          <input type="text" name="jhum_male" id="jhum_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="jhum_female">
                          <span style="color: red;">★&nbsp;</span>Jhum (Female)</label>
                          <input type="text" name="jhum_female" id="jhum_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 

                          <div class="col-md-1"></div> 
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="plain_land_male">
                          <span style="color: red;">★&nbsp;</span>Plain land cultivation (Male)</label>
                          <input type="text" name="plain_land_male" id="plain_land_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label validate" for="plain_land_female">
                          <span style="color: red;">★&nbsp;</span>Plain land cultivation (Female)</label>
                          <input type="text" name="plain_land_female" id="plain_land_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 
                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="orchard_male">
                          <span style="color: red;">★&nbsp;</span>Orchard (Male)</label>
                          <input type="text" name="orchard_male" id="orchard_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="orchard_female">
                          <span style="color: red;">★&nbsp;</span>Orchard (Female)</label>
                          <input type="text" name="orchard_female" id="orchard_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 

                          <div class="col-md-1"></div> 
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="fuel_wood_male">
                          <span style="color: red;">★&nbsp;</span>Fuel wood collection (Male)</label>
                          <input type="text" name="fuel_wood_male" id="fuel_wood_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="fuel_wood_female">
                          <span style="color: red;">★&nbsp;</span>Fuel wood collection (Female)</label>
                          <input type="text" name="fuel_wood_female" id="fuel_wood_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>                           
                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="wage_labour_male">
                          <span style="color: red;">★&nbsp;</span>Wage labour (Male)</label>
                          <input type="text" name="wage_labour_male" id="wage_labour_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="wage_labour_female">
                          <span style="color: red;">★&nbsp;</span>Wage labour (Female)</label>
                          <input type="text" name="wage_labour_female" id="wage_labour_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 

                          <div class="col-md-1"></div> 
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="poultry_male">
                          <span style="color: red;">★&nbsp;</span>Poultry rearing (Male)</label>
                          <input type="text" name="poultry_male" id="poultry_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="poultry_female">
                          <span style="color: red;">★&nbsp;</span>Poultry rearing (Female)</label>
                          <input type="text" name="poultry_female" id="poultry_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 
                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="livestock_male">
                          <span style="color: red;">★&nbsp;</span>Livestock rearing (Male)</label>
                          <input type="text" name="livestock_male" id="livestock_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="livestock_female">
                          <span style="color: red;">★&nbsp;</span>Livestock rearing (Female)</label>
                          <input type="text" name="livestock_female" id="livestock_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 

                          <div class="col-md-1"></div> 
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="aquaculture_male">
                          <span style="color: red;">★&nbsp;</span>Aquaculture (Male)</label>
                          <input type="text" name="aquaculture_male" id="aquaculture_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="aquaculture_female">
                          <span style="color: red;">★&nbsp;</span>Aquaculture (Female)</label>
                          <input type="text" name="aquaculture_female" id="aquaculture_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>
                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="service_male">
                          <span style="color: red;">★&nbsp;</span>Service holder (Male)</label>
                          <input type="text" name="service_male" id="service_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="service_female">
                          <span style="color: red;">★&nbsp;</span>Service holder (Female)</label>
                          <input type="text" name="service_female" id="service_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 

                          <div class="col-md-1"></div> 
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="business_male">
                          <span style="color: red;">★&nbsp;</span>Business (Male)</label>
                          <input type="text" name="business_male" id="business_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="business_female">
                          <span style="color: red;">★&nbsp;</span>Business (Female)</label>
                          <input type="text" name="business_female" id="business_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>
                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="handicraft_male">
                          <span style="color: red;">★&nbsp;</span>Handicraft/loom (Male)</label>
                          <input type="text" name="handicraft_male" id="handicraft_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="handicraft_female">
                          <span style="color: red;">★&nbsp;</span>Handicraft/loom (Female)</label>
                          <input type="text" name="handicraft_female" id="handicraft_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div> 

                          <div class="col-md-1"></div> 
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="other_male">
                          <span style="color: red;">★&nbsp;</span>Other (Male)</label>
                          <input type="text" name="other_male" id="other_male" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>

                          <div class="col-md-1"></div>
                          
                          <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                          <label class="control-label  validate" for="other_female">
                          <span style="color: red;">★&nbsp;</span>Other (Female)</label>
                          <input type="text" name="other_female" id="other_female" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" placeholder="Please Enter Integer Number">
                          </div>
                            
                        </div>
                        <!-- end row -->

                    </div>
                </div>
                        <!-- // end table row -->

                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                                <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 20px;color: black;">Save Communities Info</button>
                            </div>  
                        </div>

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
<script src="{{ mix('resources/scripts/societal_entry/livelihood_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
