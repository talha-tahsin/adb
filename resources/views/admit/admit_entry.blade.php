


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
            <h1 class="m-0" style="font-family: Serif;">Patient Admit Entry</h1>
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

                <div class="form-group" id="personal_info" style="margin: 0px 100px 30px 100px;">

                  <input type="hidden" name="userName" id="userName" value="{{ Auth::user()->name }}"/>

                  <h5>Patient Personal Info</h5> <hr>

                  <div class="row">
                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-3" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="patient_nm">
                      <span style="color: red;">★&nbsp;</span>Patient Name</label>
                      <input type="text" class="form-control" placeholder="Enter patient name" name="patient_nm" id="patient_nm" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                    <div class="col-md-1"></div>

                    <div class ="col-md-3" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" >
                      <span style="color:red;">★&nbsp;</span>Gender </label>

                      <select id="gender" name="gender" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                        <option value="" selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                      </select>
                    </div>

                  <!-- <div class="col-md-1"></div> -->
        
                  </div>
                  <!-- end row  -->


                  <div class="row">
                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="patient_age">
                      <span style="color: red;">★&nbsp;</span>Patient Age</label>
                      <input type="text" class="form-control" placeholder="Enter patient age" name="patient_age" id="patient_age" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                    <div class="col-md-1"></div>

                    <div class ="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" >
                      <span style="color:red;">★&nbsp;</span>Blood Group </label>

                      <select id="blood_grp" name="blood_grp" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                        <option value="" selected disabled>Select Blood Group</option>
                        <option value="A+">A Positive (A+)</option>
                        <option value="A-">A Negetive (A-)</option>
                        <option value="B+">B Positive (B+)</option>
                        <option value="B-">B Negetive (B-)</option>
                        <option value="O+">O Positive (O+)</option>
                        <option value="O-">O Negetive (O-)</option>
                        <option value="AB-">AB Positive (AB+)</option>
                        <option value="AB-">AB Negetive (AB-)</option>
                      </select>
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="cont_num">
                      <span style="color: red;">★&nbsp;</span>Contact Number</label>
                      <input type="text" class="form-control" placeholder="Enter contact number" name="cont_num" id="cont_num" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                  </div> 
                  <!-- end row -->

                  <div class="row">
                    <!-- <div class="col-md-1"></div> -->

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="patnt_weight">
                      <span style="color: red;">★&nbsp;</span>Patient Weight</label>
                      <input type="text" class="form-control" placeholder="Enter patient weight" name="patnt_weight" id="patnt_weight" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="admit_cause">
                      <span style="color: red;">★&nbsp;</span>Cause of Admit (In Short)</label>
                      <input type="text" class="form-control" placeholder="Write cause of admit" name="admit_cause" id="admit_cause" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="address">
                      <span style="color: red;">★&nbsp;</span>Address</label>
                      <input type="text" class="form-control" placeholder="Enter patient address" name="address" id="address" style="border:2px solid #898AEE;border-radius: 5px;">
                    </div>

                  </div>
                  <!-- end row  -->
                  <br> <h5>Patient Health Info</h5> <hr>
                
                <div class="row">
                  <div class ="col-md-3" style="margin: 0px 0px 10px 0px;">
                    <label class="control-label validate" >
                    <span style="color: red;">★&nbsp;</span>Any Health Condition </label>

                    <select id="helth_condtn" name="helth_condtn" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                      <option value="" selected disabled>Select Problems</option>
                      <option value="No">No</option>
                      <option value="Diabetes">Diabetes</option>
                      <option value="Heart Disease">Heart Disease</option>
                      <option value="High blood pressure">High blood pressure</option>
                      <option value="Stroke">Stroke</option>
                      <option value="Kidney disease">Kidney disease</option>
                      <option value="Liver Trouble">Liver Trouble</option>
                      <option value="Lung disease">Lung disease</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>

                  <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 0px 0px 10px 0px;">
                      <label class="control-label validate" for="helth_discrip">
                      <span style="color: red;">★&nbsp;</span>If have, write about in short </label>
                      <input type="text" class="form-control" placeholder="Write about it in short" name="helth_discrip" id="helth_discrip" style="border:2px solid #898AEE;border-radius: 5px;" disabled>
                    </div>

                  </div>
                  <!-- end row  -->

                  <div class="row">
                  <div class ="col-md-3" style="margin: 10px 0px 10px 0px;">
                    <label class="control-label validate" for="allergies">
                    <span style="color: red;">★&nbsp;</span>Any Allergies </label>

                    <select id="allergies" name="allergies" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                      <option value="" selected disabled>Select Option</option>
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </div>

                  <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="allergies_discrip">
                      <span style="color: red;">★&nbsp;</span>If have, write about in short </label>
                      <input type="text" class="form-control" placeholder="Write about it in short" name="allergies_discrip" id="allergies_discrip" style="border:2px solid #898AEE;border-radius: 5px;" disabled>
                    </div>

                  </div>
                  <!-- end row  -->

                  <div class="row">
                  <div class ="col-md-3" style="margin: 10px 0px 10px 0px;">
                    <label class="control-label validate" for="surgery">
                    <span style="color: red;">★&nbsp;</span>Any Major Surgery </label>

                    <select id="surgery" name="surgery" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                      <option value="" selected disabled>Select Option</option>
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </div>

                  <div class="col-md-1"></div>

                    <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                      <label class="control-label validate" for="surgery_discrip">
                      <span style="color: red;">★&nbsp;</span>If have, write about in short </label>
                      <input type="text" class="form-control" placeholder="Write about it in short" name="surgery_discrip" id="surgery_discrip" style="border:2px solid #898AEE;border-radius: 5px;" disabled>
                    </div>

                  </div>
                  <!-- end row  -->

                <div class="row">
                  <div class="col-md-9"></div>
                    <div class="col-md-2" style="margin: 20px 0px 30px 0px;">
                      <button type="submit" class="btn btn-primary" id="btn_next" style="width: 100%;border-radius: 20px;color: black;">Go Next</button>
                    </div>
                  <div class="col-md-1"></div>
                </div>
                <!-- end row  -->

                </div>
                <!-- end form div  -->

              <div class="form-group hide" id="admit_info" style="margin: 0px 40px 30px 100px;">

              <h5>Patient Admit Info</h5> <hr>

              <div class="row">
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-3" style="margin: 0px 0px 10px 0px;">
                  <label class="control-label  validate" for="admit_date">
                  <span style="color: red;">★&nbsp;</span>Admit Date</label>
                  <input type="text" class="form-control" style="border-radius: 5px;border: 2px solid #898AEE;" name="admit_date" id="admit_date" value="{{ date('Y-m-d') }}">
                </div>

                <div class="col-md-1"></div>

                <div class ="col-md-3" style="margin: 0px 0px 10px 0px;">
                  <label class="control-label validate" >
                  <span style="color: red;">★&nbsp;</span>Admited By </label>

                  <select id="admit_by" name="admit_by" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                  </select>
                </div>

              </div>

              <!-- <div class="row">
                <div class ="col-md-3" style="margin: 10px 0px 10px 0px;">
                  <label class="control-label validate" >
                  <span style="color: red;">★&nbsp;</span>Admited Floor</label>

                  <select id="admt_floor" name="admt_floor" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                    <option value="" selected disabled>Select Option</option>
                    <option value="2nd Floor">2nd Floor</option>
                    <option value="3rd Floor">3rd Floor</option>
                    <option value="4th Floor">4th Floor</option>
                    <option value="5th Floor">5th Floor</option>
                  </select>
                </div>

              <div class="col-md-1"></div>

                <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                  <label class="control-label validate" for="admt_room">
                  <span style="color: red;">★&nbsp;</span>Admited Ward </label>
                  <select id="admt_room" name="admt_room" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                    <option value="" selected disabled>Select Option</option>
                    <option value="CASUAL">Casual</option>
                    <option value="GAINI">Gaini</option>
                    <option value="ICU">ICU</option>
                  </select>
                </div>

              </div> -->
              <!-- end row  -->

              <div class="row">
                <div class ="col-md-3" style="margin: 10px 0px 10px 0px;">
                  <label class="control-label validate" >
                  <span style="color: red;">★&nbsp;</span>Admited Bed/Cabin</label>

                  <select id="admit_type" name="admit_type" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                    <option value="" selected disabled>Select Option</option>
                    <option value="bed">Bed</option>
                    <option value="cabin">Cabin</option>
                  </select>
                </div>

              <div class="col-md-1"></div>

                <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                  <label class="control-label validate" for="bed_cabin_type">
                  <span style="color: red;">★&nbsp;</span>Bed/Cabin Type </label>
                  <select id="bed_cabin_type" name="bed_cabin_type" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                    <option value="" selected disabled>Select Option</option>
                    <option value="Normal">Normal</option>
                    <option value="Business">Business</option>
                  </select>
                </div>

              </div>
              <!-- end row  -->

              <div class="row">
                <div class ="col-md-3" style="margin: 10px 0px 10px 0px;">
                  <label class="control-label validate" >
                  <span style="color: red;">★&nbsp;</span>Admited Bed/Cabin No</label>

                  <select id="bed_cabin_no" name="bed_cabin_no" class="custom-select form-control" style="border-radius: 5px;border:2px solid #898AEE;">
                    <option value="" selected disabled>Select Option</option>
                    <option value="C-301">C-301</option>
                    <option value="B-201">B-201</option>
                  </select>
                </div>

              <div class="col-md-1"></div>

                <div class="col-md-3" style="margin: 10px 0px 10px 0px;">
                  <label class="control-label validate" for="bed_cabin_charge">
                  <span style="color: red;">★&nbsp;</span>Bed/Cabin Charge (per day) </label>
                  <input type="text" class="form-control" placeholder="Write about it in short" name="bed_cabin_charge" id="bed_cabin_charge" style="border:2px solid #898AEE;border-radius: 5px;" >
                </div>

              </div>
              <!-- end row  -->

              <div class="row">
                <div class="col-md-2" style="margin: 30px 0px 30px 0px;">
                  <button type="submit" class="btn btn-primary" id="btn_previous" style="width: 100%;border-radius: 20px;color: black;">Go Previous</button>
                </div>

                <div class="col-md-7"></div>
                  <div class="col-md-2" style="margin: 30px 0px 30px 0px;">
                    <button type="submit" class="btn btn-success" id="btn_save" style="width: 100%;border-radius: 20px;color: black;">Save Patient Details</button>
                  </div>
                <div class="col-md-1"></div>
              </div>

              </div>
              <!-- end main table div -->

    
              </div>  
              <!-- end card body -->
            </div>  
            <!-- end car-primary -->
          </div>  
          <!-- end col-md-12 -->



        </div>
    </section>

  
@endsection

@section('current_page_js')
<!-- this page js -->
<script src="{{ mix('resources/js/admit_entry.js') }}"></script>
<!-- datepicker -->
<script src="{{ mix('resources/plugins/datepicker/jquery-ui.js') }}"></script>

@endsection
