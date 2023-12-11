


document.title = 'Health Entry';

$(document).ready(function () {

    console.log("hello talha.."); 

    // $('#para_list').prop('disabled', true);

    $.ajax({
        url: "/get_health_center_list",
        type: "GET",
        data: { 'center_list' : 'get_data' },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            $('#table_div').removeClass('hide');
            $.each(data.message, function (i, v) {
                insertTableRow(v.center_name, v.center_id);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    myJson = {
        '001' : 'Diarrhoeal',
        '002' : 'Malaria',
        '003' : 'Dengue',
        '004' : 'Typhoid',
        '005' : 'Zika Fever',
        '006' : 'Skin Diseases',
        '007' : 'Heat Stroke',
        '008' : 'Mental diseases',
        '009' : 'Others',
    };
    $.each(myJson, function(key, value) {
        insertDiseasesTable(value);
    });


});

$('#radioDiv input[type=radio]').change(function(){
    if($(this).val() == '0'){
        $('#alt_income_trainig').prop('disabled', true);
    }
    else {
        $('#alt_income_trainig').prop('disabled', false);
    }

});

function insertTableRow(center_name, center_id) {

    var appendString = '';
    var rowCount = $('#voucher_table > tbody > tr').length;
    rowCount++;

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td style="width: 400px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="people_percentage" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="distance" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="service_reason" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
    removeTableRow();
    // $("#voucher_table tr:last").scrollintoview();
}

$(document).on('click', '#btn_store1', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var xml_data = '';

    xml_data = '<head>';

    $('#voucher_table > tbody > tr').each(function () {

        // var center_id = $(this).attr('center_id');
        // var center_name = $(this).find('td:eq(0)').text(); 
        var health_center = $(this).closest('tr').find('td:eq(1)').text();
        
        var people_percentage = $(this).find('#people_percentage').val();
        var distance = $(this).find('#distance').val();
        var service_reason = $(this).find('#service_reason').val();

        // first binding data as xml string
        xml_data += '<row>';

        xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
        xml_data += '<watershed_name>' + watershed_name + '</watershed_name>';
        xml_data += '<para_id>' + para_id + '</para_id>';
        xml_data += '<para_name>' + para_name + '</para_name>';

        xml_data += '<health_center>' + health_center + '</health_center>';
        xml_data += '<people_percentage>' + people_percentage + '</people_percentage>';
        xml_data += '<distance>' + distance + '</distance>';
        xml_data += '<service_reason>' + service_reason + '</service_reason>';

        xml_data += '<created_by>' + created_by + '</created_by>';

        xml_data += '</row>';
        

    });

    xml_data += '</head>';
    
    console.log(xml_data);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_tendency_health_services",
        type: "POST",
        data: { '_token' : token, 'dataToSend' : xml_data },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#voucher_table td input[type=text]').val('');
                $('#voucher_table td').find('.resetSelect').prop("selectedIndex", 0);
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html('<span style="color: red;">'+data.message+'</span>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});

$(document).on('click', '#btn_store2', function (event) {

    event.preventDefault();
    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();

    var form = $('#form1_body')[0];
    var formdata = new FormData(form);
    formdata.append( "_token", token);
    formdata.append( "watershed_id", watershed_id);
    formdata.append( "watershed_name", watershed_name);
    formdata.append( "para_id", para_id);
    formdata.append( "para_name", para_name);
    formdata.append( "created_by", created_by);

    console.log(formdata);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_health_additional_info",
        type: "POST",
        enctype: 'multipart/form-data',
        dataType: 'json',
        data: formdata,
        processData: false,  // Important when file upload!
        contentType: false,
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#nearby_medical_services').val('');
                $('.initialVal').val('');
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html('<span style="color: red">ERROR!! <p>'+data.message+'</p></span>');
            }
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });


});

$(document).on('click', '#btn_store3', function (event) {

    event.preventDefault();
    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();

    var form = $('#form2_body')[0];
    var formdata = new FormData(form);
    formdata.append( "_token", token);
    formdata.append( "watershed_id", watershed_id);
    formdata.append( "watershed_name", watershed_name);
    formdata.append( "para_id", para_id);
    formdata.append( "para_name", para_name);
    formdata.append( "created_by", created_by);

    console.log(formdata);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_electricity_info",
        type: "POST",
        enctype: 'multipart/form-data',
        dataType: 'json',
        data: formdata,
        processData: false,  // Important when file upload!
        contentType: false,
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#my_table2 td input[type=text]').val('');
                $('.initialVal').val('');
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html('<span style="color: red">ERROR!! <p>'+data.message+'</p></span>');
            }
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });


});

function insertDiseasesTable(name) {

    var appendString = '';
    var rowCount = $('#diseases_table > tbody > tr').length;
    rowCount++;

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';

    appendString += '<td style="width: 300px;text-align: left;">' + name + '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="ranking" name="ranking" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="once_in_year" name="once_in_year" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="twice_in_year" name="twice_in_year" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="once_in_2_3years" name="once_in_2_3years" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="others" name="others" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    //appendString += '<td style="text-align: center;">';
    //appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>';
    //appendString += '</td>';
    
    appendString += '</tr>';


    $('#diseases_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    removeTableRow();
}

$(document).on('click', '#btn_store4', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var xml_data = '';

    xml_data = '<head>';

    $('#diseases_table > tbody > tr').each(function () {

        // var center_id = $(this).attr('center_id');
        // var center_name = $(this).find('td:eq(0)').text(); 
        var diseases_name = $(this).closest('tr').find('td:eq(1)').text();
        
        var ranking = $(this).find('#ranking').val();
        var once_in_year = $(this).find('#once_in_year').val();
        var twice_in_year = $(this).find('#twice_in_year').val();
        var twice_in_year = $(this).find('#twice_in_year').val();
        var once_in_2_3years = $(this).find('#once_in_2_3years').val();
        var others = $(this).find('#others').val();

        // first binding data as xml string
        xml_data += '<row>';

        xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
        xml_data += '<watershed_name>' + watershed_name + '</watershed_name>';
        xml_data += '<para_id>' + para_id + '</para_id>';
        xml_data += '<para_name>' + para_name + '</para_name>';

        xml_data += '<diseases_name>' + diseases_name + '</diseases_name>';
        xml_data += '<ranking>' + ranking + '</ranking>';
        xml_data += '<once_in_year>' + once_in_year + '</once_in_year>';
        xml_data += '<twice_in_year>' + twice_in_year + '</twice_in_year>';
        xml_data += '<once_in_2_3years>' + once_in_2_3years + '</once_in_2_3years>';
        xml_data += '<others>' + others + '</others>';

        xml_data += '<created_by>' + created_by + '</created_by>';

        xml_data += '</row>';
        

    });

    xml_data += '</head>';
    
    console.log(xml_data);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_diseases_ranking_frequency",
        type: "POST",
        data: { '_token' : token, 'dataToSend' : xml_data },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#diseases_table td input[type=text]').val('');
                $('#diseases_table td').find('.resetSelect').prop("selectedIndex", 0);
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html('<span style="color: red;">'+data.message+'</span>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});

$(document).on('change', '.m_num', function () {

    var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    row.find('.m_num').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    row.find('#m_total').val(total);

    row.find('.total').each(function () {
        var rowTotal = parseFloat($(this).val());
        if (!isNaN(rowTotal)) {
            grandTotal += rowTotal;
        }
    });

    row.find('#grandTotal').val(grandTotal);

});

$(document).on('change', '.fe_num', function () {

    var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    row.find('.fe_num').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    row.find('#fe_total').val(total);

    row.find('.total').each(function () {
        var rowTotal = parseFloat($(this).val());
        if (!isNaN(rowTotal)) {
            grandTotal += rowTotal;
        }
    });

    row.find('#grandTotal').val(grandTotal);

});

function removeTableRow() {

    $(document).on('click', '.removeHead', function () {

        $(this).parent().parent().remove();
        reOrderTable();

        if ($('#amount').length == '0') {
            $('#total_amount').text((0).toFixed(2));
        }

        // $('#amount').trigger('change');
        var totalAmount = 0;
        $('#voucher_table > tbody > tr').each(function () {

            var tem_total = $(this).find('#amount').val();

            if (tem_total == undefined || tem_total == null || tem_total == '') tem_total = 0;

            totalAmount += parseFloat(tem_total);

        });

        // console.log("888..", totalAmount);

        if (totalAmount == '' || totalAmount == null || totalAmount == undefined)
            $('#total_amount').text('0.00');
        else
            $('#total_amount').text(totalAmount.toFixed(2));

    });
}

function reOrderTable() {
    var sl = 1;
    $('#voucher_table > tbody > tr').each(function () {
        $(this).find('.sl').html(sl);
        sl++;
    });
    counter = sl - 1;
}



