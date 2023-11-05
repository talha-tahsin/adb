


document.title = 'Accessibility Entry';

$(document).ready(function () {

    console.log("hello talha.."); 

    $('#watershedId').select2();
    $('#para_list').select2();
    $('#community').select2();
  
    $('.select2').css({'border': '2px solid #898AEE', 'border-radius': '5px'});

    $('#para_list').prop('disabled', true);

    $.ajax({
        url: "/get_watershedId",
        type: "GET",
        data: { 'watershed' : 'get_data' },
        dataType: "HTML",
        cache: false,
        success: function (data) {
            // console.log(data);
            $('#watershedId').html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    // $.ajax({
    //     url: "/get_transportation",
    //     type: "GET",
    //     data: { 'latrineList' : 'get_data'},
    //     dataType: "JSON",
    //     cache: false,
    //     success: function (data) {
    //         console.log(data);
    //         if(data.status == 'SUCCESS'){
    //             $('#table_div').removeClass('hide');
    //             $.each(data.message, function (i, v) {
    //                 insertTableRow(v.transportation_name, v.transportation_id);
    //              });
    //         }
    //         else{
    //             $('#myModal').modal({backdrop : 'static', keyboard : false});
    //             $('#error_msg').html('<span style="color: red">ERROR!! <p>'+data.message+'</p></span>');
    //         }  
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //         console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    //     }
    // });

});

$(document).on('change', '#watershedId', function () {

    var watershedId = $('#watershedId option:selected').val();
    // console.log(watershedId);

    if(watershedId)
    {
        $.ajax({
            url: "/get_paraList",
            type: "GET",
            data: { 'watershed_id' : watershedId },
            dataType: "HTML",
            cache: false,
            success: function (data) {
                // console.log(data);
                $('#para_list').prop('disabled', false);
                $('#para_list').html(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

});

$(document).on('click', '#get_entry_form', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();
    $("#voucher_table tbody").empty();

    if(Para_Id == '' || Para_Id == null || Para_Id == undefined)
    {
        alert("Please Select Para...");
    }
    else if(Watershed_Id == '' || Watershed_Id == null || Watershed_Id == undefined)
    {
        alert("Please Select Watershed...");
    }
    else
    { 
        $.ajax({
            url: "/get_transportation",
            type: "GET",
            data: { 'latrineList' : 'get_data'},
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);
                if(data.status == 'SUCCESS'){
                    $('#table_div').removeClass('hide');
                    $.each(data.message, function (i, v) {
                        insertTableRow(v.transportation_name, v.transportation_id);
                     });
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
    }

});

function insertTableRow(center_name, center_id) {

    var appendString = '';
    var rowCount = $('#voucher_table > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr center_id="'+center_id+'" >';

    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td style="width: 500px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="condition" name="condition" class="form-control resetSelect" value="" style="width: 200px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="1">Good</option>';
    appendString += '<option value="2">Bad</option>';
    appendString += '<option value="3">Medium</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="comments" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="Write your comments">';
    appendString += '</td>';

    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    // removeTableRow();
}

$(document).on('click', '#btn_store1', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    xml_data = '<head>';

    $('#voucher_table > tbody > tr').each(function () {

        var transportation_id = $(this).attr('center_id');
        var transportation_name = $(this).find('td:eq(1)').text(); 
        
        var condition = $(this).find('#condition').val();
        var comments = $(this).find('#comments').val();

        // first binding data as xml string
        xml_data += '<row>';

        xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
        xml_data += '<para_id>' + para_id + '</para_id>';
        xml_data += '<para_name>' + para_name + '</para_name>';

        xml_data += '<transportation_id>' + transportation_id + '</transportation_id>';
        xml_data += '<transportation_name>' + transportation_name + '</transportation_name>';

        xml_data += '<condition>' + condition + '</condition>';
        xml_data += '<comments>' + comments + '</comments>';

        xml_data += '<CreatedBy>' + created_by + '</CreatedBy>';

        xml_data += '</row>';
        
    });

    xml_data += '</head>';
    
    console.log(xml_data);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

  

    $.ajax({
        url: "/store_accessibility1_info",
        type: "POST",
        data: { '_token' : token, 'xml_data' : xml_data },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );

                $('#voucher_table td').find('.resetSelect').prop("selectedIndex", 0);
                $('#voucher_table td input[type=text]').val('');
                // alert(data.message);
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

$(document).on('click', '#btn_store2', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    phone_less20 = $('#phone_less20').val();
    phone_20to40 = $('#phone_20to40').val();
    phone_up40 = $('#phone_up40').val();

    anroid_less20 = $('#anroid_less20').val();
    anroid_20to40 = $('#anroid_20to40').val();
    anroid_up40 = $('#anroid_up40').val();

    intertnet_less20 = $('#intertnet_less20').val();
    intertnet_20to40 = $('#intertnet_20to40').val();
    intertnet_up40 = $('#intertnet_up40').val();

    remarks = $('#remarks').val();


    jsonObj = {

        'watershed_id' : watershed_id,
        'para_id' : para_id,
        'para_name' : para_name,
        'phone_less20' : phone_less20,
        'phone_20to40' : phone_20to40,
        'phone_up40' : phone_up40,
        'anroid_less20' : anroid_less20,
        'anroid_20to40' : anroid_20to40,
        'anroid_up40' : anroid_up40,
        'intertnet_less20' : intertnet_less20,
        'intertnet_20to40' : intertnet_20to40,
        'intertnet_up40' : intertnet_up40,
        'remarks' : remarks,
        'created_by' : created_by,

    };
    
    console.log(jsonObj);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_accessibility2_info",
        type: "POST",
        data: { '_token' : token, 'json_data' : JSON.stringify(jsonObj) },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#telecom_table td input[type=text]').val('');
                // alert(data.message);
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

$(document).on('click', '#btn_store3', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    national_highway = $('#national_highway').val();
    regional_highway = $('#regional_highway').val();
    zilla_road = $('#zilla_road').val();
    local_road = $('#local_road').val();

    main_transportation = $('#main_transportation option:selected').val();
    goods_transportation = $('#goods_transportation option:selected').val();

    jsonObj = {

        'watershed_id' : watershed_id,
        'para_id' : para_id,
        'para_name' : para_name,
        'national_highway' : national_highway,
        'regional_highway' : regional_highway,
        'zilla_road' : zilla_road,
        'local_road' : local_road,
        'main_transportation' : main_transportation,
        'goods_transportation' : goods_transportation,
        'created_by' : created_by,

    };
    
    console.log(jsonObj);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_accessibility3_info",
        type: "POST",
        data: { '_token' : token, 'json_data' : JSON.stringify(jsonObj) },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );

                $('#transportation_table td input[type=text]').val('');
                $('#main_transportation').val('').change();
                $('#goods_transportation').val('').change();
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

function clearInput() {

    $('#water_source').val('').change();
    $('#preferred_source').val('');
    $('#drinking_water_number').val('');

}



