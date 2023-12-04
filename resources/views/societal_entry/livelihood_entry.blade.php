


@extends('layouts.pages.master')

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

                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="community_id"><span style="color: red;">★&nbsp;</span>Watershed Id</label> 
                      <input type="text" name="watershed_id" id="watershed_id" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="watershed_name"><span style="color: red;">★&nbsp;</span>Watershed Name</label>
                      <input type="text" name="watershed_name" id="watershed_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div>
                    
                    <input type="hidden" name="para_id" id="para_id" value=""/>
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="para_name"><span style="color: red;">★&nbsp;</span>Para Name</label>
                      <input type="text" name="para_name" id="para_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 
                  </div> 
                  <!-- end row -->
              
              <div class="form-group" id="table_div">
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

              <hr style="border-bottom: 2px solid black;">

            <div class="row">

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('View.Occupation.Entry') }}" style="color: black;">
                  <button type="submit" class="btn btn-info" style="width: 100%;border-radius: 5px;">Previous : Societal Occupation</button>
                </a>
              </div>

              <div class="col-md-8"></div>

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('View.Income.Entry') }}">
                  <button type="submit" class="btn btn-info" style="color: black;width: 100%;border-radius: 5px;">Next : Societal Income</button>
                </a>
              </div>

            </div>

    
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

<script>

document.title = 'Livelihood';

$(document).ready(function () {

    console.log("hello talha..");
    
    var userNm = $('#userName').val();

    $.ajax({
        url: "/get_active_watershed",
        type: "GET",
        data: { 'userNm' : userNm },
        dataType: "json",
        cache: false,
        success: function (data) {
            // console.log(data);
            $.each(data.message, function (i, v) {
                $('#watershed_id').val(v.watershed_id);
                $('#watershed_name').val(v.watershed_name);
                $('#para_id').val(v.para_id);
                $('#para_name').val(v.para_name);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    insertTableRow();

    // for (var i = 0; i < 3; i++) {
    //     insertTableRow();
    // }


});

</script>

@endsection
