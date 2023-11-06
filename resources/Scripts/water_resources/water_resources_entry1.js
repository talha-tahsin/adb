


document.title = 'Water Resources Entry- 1';

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

$(document).on('change', '#para_list', function () {

    $('#type').prop('disabled', false);

});

$(document).on('click', '#get_entry_form', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();
    // $("#water_table tbody").empty();

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
        $('#table_div').removeClass('hide'); 
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

$(document).on('click', '#btn_store', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    catname = $('#name').val();
    location_north = $('#location_north').val();
    location_south = $('#location_south').val();
    source = $('#source').val();
    outlet = $('#outlet').val();
    distance = $('#distance').val();

    availability_mam = $('#availability_mam').val();
    availability_jjas = $('#availability_jjas').val();
    availability_on = $('#availability_on').val();
    availability_djf = $('#availability_djf').val();

    depth_mam = $('#depth_mam').val();
    depth_jjas = $('#depth_jjas').val();
    depth_on = $('#depth_on').val();
    depth_djf = $('#depth_djf').val();

    var xml = '<purpose>';
        if( $('#drinking').prop('checked') ) xml += '<drinking>'+ $('#drinking:checked').val() +'</drinking>';
        if( $('#domestic').prop('checked') ) xml += '<domestic>'+ $('#domestic:checked').val() +'</domestic>';
        if( $('#irrigation').prop('checked') ) xml += '<irrigation>'+ $('#irrigation:checked').val() +'</irrigation>';
        if( $('#cattle').prop('checked') ) xml += '<cattle>'+ $('#cattle:checked').val() +'</cattle>';
        if( $('#other').prop('checked') ) xml += '<other>'+ $('#other:checked').val() +'</other>';
    xml += '</purpose>';

    // var xmlDoc = $.parseXML(xml);

    console.log(xml);

    jsonObj = {
        'watershed_id' : watershed_id,
        'para_id' : para_id,
        'para_name' : para_name,
        'catname' : catname,
        'location_north' : location_north,
        'location_south' : location_south,
        'source' : source,
        'outlet' : outlet,
        'distance' : distance,
        'availability_mam' : availability_mam,
        'availability_jjas' : availability_jjas,
        'availability_on' : availability_on,
        'availability_djf' : availability_djf,
        'depth_mam' : depth_mam,
        'depth_jjas' : depth_jjas,
        'depth_on' : depth_on,
        'depth_djf' : depth_djf,
        'created_by' : created_by,
    };
    
    console.log(jsonObj);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_resources_entry1",
        type: "POST",
        data: { '_token' : token, 'json_data' : JSON.stringify(jsonObj), 'xml_data' : xml },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#water_table td input[type=text]').val('');
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



