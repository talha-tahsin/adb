

    document.title = 'Ledger View';

    $(document).ready(function(){

        $(document).on('keypress', '#patient_nm', function(){
            $('#patient_nm').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#patient_age', function(){
            $('#patient_age').css({ 'background-color' : 'transparent' });
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


        $('#test_nm').select2();
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
                $('#cont_num').css({'border': '2px solid red'});
            }
            else{
                $('#cont_num').css({'border': '2px solid #898AEE'});
            }
            
        });
        
        $.ajax({
            url: "/get_medical_test",
            type: "GET",
            data: { 'medical_test' : 'get_data' },
            dataType: "html",
            cache: false,
            success: function (data) {
                // console.log(data);
                $("#test_nm").html(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    });


    $(document).on('click', '#add_test', function(){

        userNm = $("#userName").val();
        entry_date = $("#entry_date").val();
        patient_nm = $("#patient_nm").val();
        patient_age = $("#patient_age").val();
        gender = $('#gender option:selected').val();
        cont_number = $("#cont_num").val();
        address = $("#address").val();
        testCode = $('#test_nm option:selected').val();
        testName = $('#test_nm option:selected').text();
        
        // console.log(userNm, entry_date);
        
        if(testName == '' || testName == null || testName == undefined)
        {
            alert("Please select test report...");
            $("#test_nm").css('background-color', '#FFCECE');  
        }
        else if(entry_date == '' || entry_date == null || entry_date == undefined)
        {
            alert("Please enter entry date...");
            $("#entry_date").css('background-color', '#FFCECE');  
        }
        else if(patient_nm == '' || patient_nm == null || patient_nm == undefined)
        {
            alert("Please enter patient name...");
            $("#patient_nm").css('background-color', '#FFCECE');  
        }
        else if (patient_age == '' || patient_age == null || patient_age == undefined) 
        {
            alert("Please enter patient age...");
            $("#patient_age").css('background-color', '#FFCECE');
        }
        else if (gender == '' || gender == null || gender == undefined) 
        {
            alert("Please select patient gender...");
            $("#gender").css('background-color', '#FFCECE');
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
            $('#table_row').removeClass('hide');

            var valid = true;

            $('#voucher_table > tbody > tr').each(function() {

                var tr_acountCode = $(this).attr('acc_code');
                var row_count = $(this).closest('tr').find('td:eq(0)').text();

                console.log("row account code..", row_count);

                if (tr_acountCode == testCode) {
                    alert("Sorry! already you take this test report...");
                    valid = false;
                }

                if (row_count > 2) {
                    alert("Sorry! can't take more than 3 test in one receipt...");
                    valid = false;
                }

            });

            if(valid)
            {
                insertTableRow(testName, testCode);  
            }


        }
    });

    function insertTableRow(testName, testCode){

        var appendString = '';
        var rowCount = $('#voucher_table > tbody > tr').length;
        rowCount++;

        // console.log(accountName);

        appendString += '<tr acc_code="'+testCode+'">'; 
        appendString += '<td class="sl" style="text-align: center;">'+rowCount+'</td>';  
        //appendString += '<td>'+ofcName+'</td>'; 
        appendString += '<td style="width: 100px;text-align: center;">'+testCode+'</td>'; 
        appendString += '<td style="width: 400px;text-align: left;">'+testName+'</td>';

        appendString += '<td>';
        appendString += '<input type="text" id="amount" class="form-control totalAmount" name="amount" value="" style="width: 150px;text-align: right;color: red;" placeholder="Enter Amount">';
        appendString += '</td>';

        appendString += '<td style="text-align: center;">';
        appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>'; 
        appendString += '</td>';

        appendString += '</tr>';


        $('#voucher_table > tbody:last-child').append(appendString);
        // $("#voucher_table tr:last").scrollintoview();
        removeTableRow();
    }

    $(document).on('click', '#btn_save', function(){

        // userNm = $("#userName").val();
        v_date = $("#entry_date").val().split('-').join('');
        // patient_id = generatePatientId(v_date);
        receipt_no = generateVoucherNo(v_date);
        var token = $("meta[name='csrf-token']").attr("content");
        var v_data = '';

        // console.log(userNm, entry_date, gender, testName);
        v_data = '<details>';

        $('#voucher_table > tbody > tr').each(function() {

            var tr_acc_code = $(this).closest('tr').find('td:eq(1)').text();
            var tr_acc_name = $(this).closest('tr').find('td:eq(2)').text();
            var tr_amount = $(this).find('#amount').val();

            if(tr_amount == '' || tr_amount == undefined || tr_amount == null)
            {
                $(this).find('#amount').css({ 'background-color' : '#FFCECE' });
            }
            else
            {
                v_data += '<trans>';
                v_data += '<receipt_no>'+receipt_no+'</receipt_no>'; 
                v_data += '<receipt_date>'+entry_date+'</receipt_date>'; 
                v_data += '<test_nm>'+tr_acc_name+'</test_nm>'; 
                v_data += '<test_code>'+tr_acc_code+'</test_code>'; 
                v_data += '<amount>'+tr_amount+'</amount>';
                v_data += '</trans>';
            }

        });

        v_data += '</details>';

        var sql_data = {
            'insert_receipt' : 'data',
            '_token' : token,
            'entry_by' : userNm,
            'receipt_no' : receipt_no,
            'entry_date' : entry_date,
            'patient_nm' : patient_nm,
            'patient_age' : patient_age,
            'gender' : gender,
            'cont_num' : cont_number,
            'address' : address,
            'xml_data' : v_data
        };

        var ajaxUrl = "/insrt_receipt_entry";

        console.log(userNm, receipt_no, v_data);

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: sql_data,
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                
                if(data.status == "SUCCESS") 
                { 
                    alert(data.message);
                    $('#table_row').addClass('hide');
                    $("#patient_nm").val('');
                    $("#patient_age").val('');
                    $('#gender').val('').change();
                    $("#cont_num").val('');
                    $("#address").val('');
                    $('#test_nm').val('').change();

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
    


