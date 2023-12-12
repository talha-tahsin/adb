


@extends('layouts.pages.master')

@section('current_page_css')
<!-- datepicker -->
<link rel="stylesheet" href="{{ asset('plugins/datepicker/css/jquery-ui-1.9.2.custom.min.css') }}">

@endsection

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header" style="margin: 0px 0px -15px 0px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="font-family: Serif;">Livelihood Entry</h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="margin-right: 5px;"> 
                <h5><span>Go To : </span> <a href="{{ route('Data.Entry.Dashboard') }}" >Data Entry Dashboard</a> </h5>
              </li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div>
          
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
              
              <form id="form_body" method="POST">
                  <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>

                  <div class="row"> 

                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label" for="community_id"><span style="color: red;">★&nbsp;</span>Watershed Id</label> 
                      <input type="text" name="watershed_id" id="watershed_id" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label" for="watershed_name"><span style="color: red;">★&nbsp;</span>Watershed Name</label>
                      <input type="text" name="watershed_name" id="watershed_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div>
                    
                    <input type="hidden" name="para_id" id="para_id" value=""/>
                    <div class="col-md-2" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label" for="para_name"><span style="color: red;">★&nbsp;</span>Para Name</label>
                      <input type="text" name="para_name" id="para_name" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;"  value="" disabled>
                    </div> 
                  </div> 
                  <!-- end row -->
              
              <hr style="border-bottom: 2px solid black;">

              <div class="form-group" id="table_div">
                <div class="row" style="margin: 10px 0px 10px 0px;">

                  <div class="col-md-2" style="margin: 0px 0px 20px 0px;">
                    <label class="control-label" for="occupation"><span style="color: red;">★&nbsp;</span>Occupation</label>
                    <input type="text" name="occupation" id="occupation" class="form-control" value="" style="border-radius: 5px;border: 2px solid #898AEE;padding: 0px 15px 0px 15px;" placeholder="Write the ocuupation name ">
                  </div>

                  <table width="100%" class="table table-bordered table-striped table-hover tableFixHead" id="my_table">
                    <thead>
                      <tr style="background-color: #8ed6f2;">
                        <th colspan="2" style="text-align: center;">Chakma</th>
                        <th colspan="2" style="text-align: center;">Marma</th>
                        <th colspan="2" style="text-align: center;">Tripura</th>
                        <th colspan="2" style="text-align: center;">Mro</th>
                        <th colspan="2" style="text-align: center;">Tanchangya</th>
                        <th colspan="2" style="text-align: center;">Bawm</th>
                        <th colspan="2" style="text-align: center;">Chak</th>
                        <th colspan="2" style="text-align: center;">Khyang</th>
                        <th colspan="2" style="text-align: center;">Khumi</th>
                        <th colspan="2" style="text-align: center;">Lushai</th>
                        <th colspan="2" style="text-align: center;">Pankhua</th>
                        <th colspan="2" style="text-align: center;">Non-IPs</th>
                        <th colspan="2" style="text-align: center;">Others</th>
                      </tr>
                      <tr style="background-color: #99ccff;">
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>

                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>

                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                        <th style="text-align:center;border-bottom: none;">M</th>
                        <th style="text-align:center;border-bottom: none;">F</th>
                      </tr>
                    </thead>

                    <tbody id="table_body">

                      <tr>
                        <td style="text-align: center;"><input type="text" id="chakma_m" name="chakma_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="chakma_f" name="chakma_f" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="marma_m" name="marma_m" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;"><input type="text" id="marma_f" name="marma_f" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;"><input type="text" id="tripua_m" name="tripua_m" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;"><input type="text" id="tripura_f" name="tripura_f" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;"><input type="text" id="mro_m" name="mro_m" class="form-control" placeholder="0"></td>
                        <td style="text-align: center;"><input type="text" id="mro_f" name="mro_f" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="tanchangya_m" name="tanchangya_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="tanchangya_f" name="tanchangya_f" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;"><input type="text" id="bawm_m" name="bawm_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="bawm_f" name="bawm_f" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;"><input type="text" id="chak_m" name="chak_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="chak_f" name="chak_f" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="khyang_m" name="khyang_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="khyang_f" name="khyang_f" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;"><input type="text" id="khumi_m" name="khumi_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="khumi_f" name="khumi_f" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="lushai_m" name="lushai_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="lushai_f" name="lushai_f" class="form-control" placeholder="0"></td>

                        <td style="text-align: center;"><input type="text" id="pankhua_m" name="pankhua_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="pankhua_f" name="pankhua_f" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="non_ips_m" name="non_ips_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="non_ips_f" name="non_ips_f" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="other_m" name="other_m" class="form-control" placeholder="0"></td> 
                        <td style="text-align: center;"><input type="text" id="other_f" name="other_f" class="form-control" placeholder="0"></td> 
                      </tr>

                    </tbody>

                </table>


              </div>
              <!-- col-md-12 -->

              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                    <button type="submit" class="btn btn-primary" id="btn_store" style="width: 100%;border-radius: 5px;color: black;">Save All Details Info</button>
                </div>  
              </div>
            </form>
            </div>
            <!-- end main table div -->

              <hr style="border-bottom: 2px solid black;">

            <div class="row">

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('View.Occupation.Entry') }}" style="color: black;">
                  <button type="submit" class="btn btn-info" style="width: 100%;border-radius: 20px;">Previous : Societal Occupation</button>
                </a>
              </div>

              <div class="col-md-8"></div>

              <div class="col-md-2" style="margin: 10px 0px 10px 0px;">
                <a href="{{ route('View.Income.Entry') }}">
                  <button type="submit" class="btn btn-info" style="color: black;width: 100%;border-radius: 20px;">Next : Societal Income</button>
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
<script src="{{ asset('scripts/societal_entry/livelihood_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/jquery-ui.js') }}"></script>

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
