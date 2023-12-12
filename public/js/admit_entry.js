

    document.title = 'Admit Entry';

    $(document).ready(function(){

        $(document).on('keypress', '#patient_nm', function(){
            $('#patient_nm').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#patient_age', function(){
            $('#patient_age').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#patnt_weight', function(){
            $('#patnt_weight').css({ 'background-color' : 'transparent' });
        });
        $(document).on('change', '#gender', function(){
            $('#gender').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#cont_num', function(){
            $('#cont_num').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#address', function(){
            $('#address').css({ 'background-color' : 'transparent' });
        });
        $(document).on('change', '#test_nm', function(){
            $('#test_nm').css({ 'background-color' : 'transparent' });
        });

        $(document).on('change', '#helth_condtn', function(){
            if($('#helth_condtn option:selected').val() == 'No'){
                $('#helth_discrip').prop('disabled', true);
            }
            else{
                $('#helth_discrip').prop('disabled', false);
            }
        });

        $(document).on('change', '#allergies', function(){
            if($('#allergies option:selected').val() == 'No'){
                $('#allergies_discrip').prop('disabled', true);
            }
            else{
                $('#allergies_discrip').prop('disabled', false);
            }
        });

        $(document).on('change', '#surgery', function(){
            if($('#surgery option:selected').val() == 'No'){
                $('#surgery_discrip').prop('disabled', true);
            }
            else{
                $('#surgery_discrip').prop('disabled', false);
            }
        });


        $('#blood_grp').select2();
        $('#helth_condtn').select2();
        $('#admit_by').select2();

        $('.select2').css({'border': '1px solid #898AEE', 'border-radius': '5px'});

        $('#entry_date').datepicker({ dateFormat: "yy-mm-dd" });

        $('#cont_num').on('keyup', function() {
            
            var num_len = $('#cont_num').val().length;

            // console.log(num_len);

            if(num_len == 5) {
                var temp = $('#cont_num').val();
                tem = temp+'-';
                $('#cont_num').val(tem);
            }
            
            if(num_len > 12){
                $('#cont_num').css({'border' : '2px solid red'});
            }
            else{
                $('#cont_num').css({'border' : '2px solid #898AEE'});
            }
            
        });
        
        $.ajax({
            url: "/get_doctors_list",
            type: "GET",
            data: { 'doctor_list' : 'get_data' },
            dataType: "html",
            cache: false,
            success: function (data) {
                // console.log(data);
                $("#admit_by").html(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    });


    $(document).on('click', '#btn_next', function(){

        entry_by = $("#userName").val();
        patient_nm = $("#patient_nm").val();
        patient_age = $("#patient_age").val();
        patient_weight = $("#patnt_weight").val();
        admit_cause = $("#admit_cause").val();

        gender = $('#gender option:selected').val();
        blood_grp = $('#blood_grp option:selected').val();
        cont_number = $("#cont_num").val();
        address = $("#address").val();

        helth_condt = $('#helth_condtn option:selected').val();
        helth_discrip = $("#helth_discrip").val();
        allergies = $('#allergies option:selected').val();
        allergies_discrip = $("#allergies_discrip").val();
        surgery = $('#surgery option:selected').val();
        surgery_discrip = $("#surgery_discrip").val();
        
        // console.log(userNm, entry_date);
        
        if(patient_nm == '' || patient_nm == null || patient_nm == undefined)
        {
            alert("Please enter patient name...");
            $("#patient_nm").css('background-color', '#FFCECE');  
        }
        else if (patient_age == '' || patient_age == null || patient_age == undefined) 
        {
            alert("Please enter patient age...");
            $("#patient_age").css('background-color', '#FFCECE');
        }
        else if (patient_weight == '' || patient_weight == null || patient_weight == undefined) 
        {
            alert("Please enter patient weight...");
            $("#patnt_weight").css('background-color', '#FFCECE');
        }
        else if (blood_grp == '' || blood_grp == null || blood_grp == undefined) 
        {
            alert("Please select patient blood group...");
            $("#blood_grp").css('background-color', '#FFCECE');
        }
        else if (gender == '' || gender == null || gender == undefined) 
        {
            alert("Please select patient gender...");
            $("#gender").css('background-color', '#FFCECE');
        }
        else if (admit_cause == '' || admit_cause == null || admit_cause == undefined) 
        {
            alert("Please select patient admit cause...");
            $("#admit_cause").css('background-color', '#FFCECE');
        }
        else if (cont_number == '' || cont_number == null || cont_number == undefined) 
        {
            alert("Please enter contact number...");
            $("#cont_num").css('background-color', '#FFCECE');
        }
        else if (address == '' || address == null || address == undefined) 
        {
            alert("Please enter address...");
            $("#address").css('background-color', '#FFCECE');
        }
        else
        {
            $('#personal_info').addClass('hide');
            $('#admit_info').removeClass('hide');

        }
    });

    $(document).on('click', '#btn_previous', function(){
        
        $('#personal_info').removeClass('hide');
        $('#admit_info').addClass('hide');

    });   

    $(document).on('click', '#btn_save', function(){

        entryBy = $("#userName").val();
        v_date = $("#admit_date").val().split('-').join('');
        patient_id = generatePatientId(v_date);

        admit_acc_code = '4200000000';
        admit_date = $("#admit_date").val();
        admit_by = $('#admit_by option:selected').val();
        admit_type = $('#admit_type option:selected').val();
        bed_cabin_type = $('#bed_cabin_type option:selected').val();
        bed_cabin_no = $('#bed_cabin_no option:selected').val();
        bed_cabin_charge = $('#bed_cabin_charge').val();

        var token = $("meta[name='csrf-token']").attr("content");
        // receipt_no = generateVoucherNo(v_date);
        var v_data = '';

        // console.log(userNm, entry_date, gender, testName);

        var sql_data = {
            'insert_receipt' : 'data',
            '_token' : token,
            'entry_by' : entryBy,
            'patient_id' : patient_id,
            'admit_date' : admit_date,
            'patient_nm' : patient_nm,
            'patient_age' : patient_age,
            'patient_weight' : patient_weight,
            'blood_grp' : blood_grp,
            'admit_cause' : admit_cause,
            'gender' : gender,
            'cont_num' : cont_number,
            'address' : address,
            'helth_condt' : helth_condt,
            'helth_discrip' : helth_discrip,
            'allergies' : allergies,
            'allergies_discrip' : allergies_discrip,
            'surgery' : surgery,
            'surgery_discrip' : surgery_discrip,
            'admit_acc_code' : admit_acc_code,
            'admit_by' : admit_by,
            'admit_type' : admit_type,
            'bed_cabin_type' : bed_cabin_type,
            'bed_cabin_no' : bed_cabin_no,
            'cabin_charge' : bed_cabin_charge,
        };

        var ajaxUrl = "/insrt_admit_entry";

        // console.log(userNm, receipt_no, v_data);

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: sql_data,
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                
                if(data.status == "SUCCESS") { 
                    alert(data.message);
                    $('#personal_info').removeClass('hide');
                    $('#admit_info').addClass('hide');

                    $("#patient_nm").val('');
                    $("#patient_age").val('');
                    $('#blood_grp').val('').change();
                    $('#gender').val('').change();
                    $("#patnt_weight").val('');

                    $("#cont_num").val('');
                    $("#admit_cause").val('');
                    $("#address").val('');

                    $('#helth_condtn').val('').change();
                    $('#allergies').val('').change();
                    $('#surgery').val('').change();
                    $("#helth_discrip").val('');
                    $("#surgery_discrip").val('');
                    $("#allergies_discrip").val('');

                    $('#admit_by').val('').change();
                    $('#admit_type').val('').change();
                    $('#bed_cabin_type').val('').change();
                    $('#bed_cabin_no').val('').change();
                    $("#bed_cabin_charge").val('');

                    // gotoUrl("../reportPdf/receipt_pdf.php", { 'receipt_pdf' : 'data', 'receipt_no' : receipt_no }, '', '_blank');
                }
                else 
                {
                    alert(data.message);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    function generatePatientId(cur_date) {
      
      var get_monDate = cur_date.substr(2,2);

      var timestamp = new Date().getTime();
      var stNumber = timestamp.toString();

      var unique_number = stNumber.substring(5);

      // console.log(get_monDate, unique_number);

      // Combine the random voucher number with the timestamp to ensure uniqueness
      const uniqueVoucher = get_monDate + unique_number;

      return uniqueVoucher;
    }

    function generateVoucherNo(current_date) {
      
      var get_yearMon = current_date.substring(2);

      // Get the current timestamp (milliseconds since January 1, 1970)
      var timestamp = new Date().getTime();
      var stNumber = timestamp.toString();

      var unique_number = stNumber.substring(9);

      // console.log(get_yearMon, unique_number);

      // Combine the random voucher number with the timestamp to ensure uniqueness
      const uniqueVoucher = get_yearMon + unique_number;

      return uniqueVoucher;
    }
    
    $(document).on('change', '#amount', function(){

        var totalAmount = 0;

        // console.log("here i am..");

        $('#voucher_table > tbody > tr').each(function() {

            var tem_total = $(this).find('#amount').val();

            if(tem_total == undefined || tem_total == null || tem_total == '') tem_total = 0;
            
            totalAmount += parseFloat(tem_total);
            
        });

        // console.log("888..", totalAmount);

        if(totalAmount == '' || totalAmount == null || totalAmount == undefined) 
        $('#total_amount').text('0.00');
        else
        $('#total_amount').text(totalAmount.toFixed(2));     
    });

    function removeTableRow(){

        $(document).on('click', '.removeHead', function(){
            
            $(this).parent().parent().remove();
            reOrderTable();
            
            if($('#amount').length == '0')
            {
                $('#total_amount').text((0).toFixed(2));
            }

            // $('#amount').trigger('change');
            var totalAmount = 0;
            $('#voucher_table > tbody > tr').each(function() {

                var tem_total = $(this).find('#amount').val();

                if(tem_total == undefined || tem_total == null || tem_total == '') tem_total = 0;
                
                totalAmount += parseFloat(tem_total);
            
            });

            // console.log("888..", totalAmount);

            if(totalAmount == '' || totalAmount == null || totalAmount == undefined) 
            $('#total_amount').text('0.00');
            else
            $('#total_amount').text(totalAmount.toFixed(2));  
                
        }); 
    }

    function reOrderTable(){
        var sl = 1;
        $('#voucher_table > tbody > tr').each(function(){
            $(this).find('.sl').html(sl);
            sl++;
        });
        counter = sl-1;
    }

    function gotoUrl(path, params, method, target = ''){

        method = method || "post";
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);
        form.setAttribute("target", target);
        if (typeof params === 'string') {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", 'data');
            hiddenField.setAttribute("value", params);
            form.appendChild(hiddenField);
        }
        else {
            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    if(typeof params[key] === 'object'){
                        hiddenField.setAttribute("value", JSON.stringify(params[key]));
                    }
                    else{
                        hiddenField.setAttribute("value", params[key]);
                    }
                    form.appendChild(hiddenField);
                }
            }
        }

        document.body.appendChild(form);
        form.submit();
    }
    


