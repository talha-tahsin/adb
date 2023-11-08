


document.title = 'Water Entry';

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

    if(Para_Id == '' || Para_Id == null || Para_Id == undefined){
        alert("Please Select Para...");
    }
    else
    { 
        $.ajax({
            url: "/get_water_source",
            type: "GET",
            data: { 'water_source' : 'get_data' },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                if(data.status == 'SUCCESS'){
                    $('#table_div').removeClass('hide');
                    $.each(data.message, function (i, v) {
                        insertTableRow(v.water_source_name, v.water_source_id);
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
    appendString += '<td style="width: 300px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="preferred_source" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="drinking_water_number" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="distance" name="distance" class="form-control resetSelect" value="" style="width: 250px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select Distance</option>';
    appendString += '<option value="Less than 50 (meter)">Less than 50 (meter)</option>';
    appendString += '<option value="50-100 (meter)">50-100 (meter)</option>';
    appendString += '<option value="100-250 (meter)">100-250 (meter)</option>';
    appendString += '<option value="250-500 (meter)">250-500 (meter)</option>';
    appendString += '<option value="Above 500 (meter)">Above 500 (meter)</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="availability" name="availability" class="form-control resetSelect" value="" style="width: 200px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Low">Low</option>';
    appendString += '<option value="Medium">Medium</option>';
    appendString += '<option value="High">High</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="quality" name="quality" class="form-control resetSelect" value="" style="width: 200px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Bad">Bad</option>';
    appendString += '<option value="Medium">Medium</option>';
    appendString += '<option value="Good">Good</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    // removeTableRow();
}

$(document).on('click', '#btn_store', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    xml_data = '<head>';

    $('#voucher_table > tbody > tr').each(function () {

        var source_id = $(this).attr('center_id');
        var source_name = $(this).find('td:eq(1)').text(); 
        
        var preferred_source = $(this).find('#preferred_source').val();
        var drinking_water_number = $(this).find('#drinking_water_number').val();
        var distance = $(this).find('#distance option:selected').val();
        var availability = $(this).find('#availability option:selected').val();
        var quality = $(this).find('#quality option:selected').val();

        // automation set value 0 if any field leave empty or null 
        if(preferred_source == '' || preferred_source == null || preferred_source == undefined) preferred_source = 0;
        if(drinking_water_number == '' || drinking_water_number == null || drinking_water_number == undefined) drinking_water_number = 0;
        if(distance == '' || distance == null || distance == undefined) distance = 0;
        if(availability == '' || availability == null || availability == undefined) availability = 0;

        // first binding data as xml string
        xml_data += '<row>';

        xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
        xml_data += '<para_id>' + para_id + '</para_id>';
        xml_data += '<para_name>' + para_name + '</para_name>';

        xml_data += '<source_id>' + source_id + '</source_id>';
        xml_data += '<source_name>' + source_name + '</source_name>';

        xml_data += '<preferred_source>' + preferred_source + '</preferred_source>';
        xml_data += '<drinking_water_number>' + drinking_water_number + '</drinking_water_number>';
        xml_data += '<distance>' + distance + '</distance>';
        xml_data += '<availability>' + availability + '</availability>';
        xml_data += '<quality>' + quality + '</quality>';

        xml_data += '<created_by>' + created_by + '</created_by>';

        xml_data += '</row>';


    });

    xml_data += '</head>';

    
    console.log(xml_data);
    
    // clear model message value for every ajax call provide single accurate message
    $('#success_msg').html('');
    $('#error_msg').html('');

    $.ajax({
        url: "/store_water_info",
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
                
                $('#voucher_table td input[type=text]').val('');
                $('#voucher_table td').find('.resetSelect').prop("selectedIndex", 0);
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



