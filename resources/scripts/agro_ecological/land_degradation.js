


document.title = 'land degradation';

$(document).ready(function () {

    console.log("hello talha23..");
    
    var userNm = $('#userName').val();

    $.ajax({
        url: "/getindicator1List",
        type: "GET",
        data: { 'userNm' : 'get_data' },
        dataType: "json",
        cache: false,
        success: function (data) {
            // console.log(data);
            $.each(data.message, function (i, v) {
                insertTableRow(v.indicator);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    $.ajax({
        url: "/getindicator2List",
        type: "GET",
        data: { 'userNm' : 'get_data' },
        dataType: "json",
        cache: false,
        success: function (data) {
            // console.log(data);
            $.each(data.message, function (i, v) {
                insertTableRow2(v.indicator);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    $.ajax({
        url: "/getindicator3List",
        type: "GET",
        data: { 'userNm' : 'get_data' },
        dataType: "json",
        cache: false,
        success: function (data) {
            // console.log(data);
            $.each(data.message, function (i, v) {
                insertTableRow3(v.indicator);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});

$('#add_row').on('click', function () {
    insertTableRow();
});

function insertTableRow(indicator_nm) {

    var appendString = '';
    var rowCount = $('#my_table > tbody > tr').length;
    rowCount++;
    // console.log(accountName);

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';

    // appendString += '<td id="item" name="item" style="width: 80px;text-align: left;">Degradation</td>';

    appendString += '<td style="width: 200px;text-align: left;">' + indicator_nm + '</td>';

    /* 1 */
    appendString += '<td>';
    appendString += '<input type="text" id="forest" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="herb" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="orchard" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="shifting" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="crop_land" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    /* 6 */
    appendString += '<td>';
    appendString += '<input type="text" id="lake" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="baor" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="rivers" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="ponds" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="aquaculture" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    /* 11 */
    appendString += '<td>';
    appendString += '<input type="text" id="rural" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="brickfield" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="helipad" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="road" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="sand" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="remark" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    // appendString += '<td style="text-align: center;">';
    // appendString += '<button type="button" class="btn btn-xs btn-danger removeHead"><i class="fa fa-remove"></i>Remove</button>';
    // appendString += '</td>';

    appendString += '</tr>';


    $('#my_table > tbody:last-child').append(appendString);
    // $("#my_table tr:last").scrollintoview();
    removeTableRow();
}

function insertTableRow2(indicator_nm) {

    var appendString = '';
    var rowCount = $('#my_table2 > tbody > tr').length;
    rowCount++;
    // console.log(accountName);

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';

    appendString += '<td style="width: 200px;text-align: left;">' + indicator_nm + '</td>';

    /* 1 */
    appendString += '<td>';
    appendString += '<input type="text" id="forest" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="herb" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="orchard" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="shifting" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="crop_land" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    /* 6 */
    appendString += '<td>';
    appendString += '<input type="text" id="lake" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="baor" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="rivers" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="ponds" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="aquaculture" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    /* 11 */
    appendString += '<td>';
    appendString += '<input type="text" id="rural" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="brickfield" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="helipad" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="road" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="sand" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="remark" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    // appendString += '<td style="text-align: center;">';
    // appendString += '<button type="button" class="btn btn-xs btn-danger removeHead"><i class="fa fa-remove"></i>Remove</button>';
    // appendString += '</td>';

    appendString += '</tr>';


    $('#my_table2 > tbody:last-child').append(appendString);
    // $("#my_table tr:last").scrollintoview();
    removeTableRow();
}

function insertTableRow3(indicator_nm) {

    var appendString = '';
    var rowCount = $('#my_table3 > tbody > tr').length;
    rowCount++;
    // console.log(accountName);

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';

    appendString += '<td style="width: 200px;text-align: left;">' + indicator_nm + '</td>';

    /* 1 */
    appendString += '<td>';
    appendString += '<input type="text" id="forest" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="herb" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="orchard" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="shifting" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="crop_land" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    /* 6 */
    appendString += '<td>';
    appendString += '<input type="text" id="lake" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="baor" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="rivers" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="ponds" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="aquaculture" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    /* 11 */
    appendString += '<td>';
    appendString += '<input type="text" id="rural" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="brickfield" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="helipad" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="road" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="sand" class="form-control" value="" style="width: 60px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="remark" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    // appendString += '<td style="text-align: center;">';
    // appendString += '<button type="button" class="btn btn-xs btn-danger removeHead"><i class="fa fa-remove"></i>Remove</button>';
    // appendString += '</td>';

    appendString += '</tr>';


    $('#my_table3 > tbody:last-child').append(appendString);
    removeTableRow();
    // $("#my_table tr:last").scrollintoview();
}

$(document).on('click', '#btn_store1', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var map_unit = $('#map_unit').val();
    var area_map_unit = $('#area_map_unit').val();

    var sendData = '';

    sendData = '<head>';

    $('#my_table > tbody > tr').each(function () {
        
        var indicator = $(this).closest('tr').find('td:eq(2)').text();
        var forest = $(this).find('#forest').val();
        var herb = $(this).find('#herb').val();
        var orchard = $(this).find('#orchard').val();
        var shifting = $(this).find('#shifting').val();
        var crop_land = $(this).find('#crop_land').val();
        var lake = $(this).find('#lake').val();
        var baor = $(this).find('#baor').val();
        var rivers = $(this).find('#rivers').val();
        var ponds = $(this).find('#ponds').val();
        var aquaculture = $(this).find('#aquaculture').val();
        var rural = $(this).find('#rural').val();
        var brickfield = $(this).find('#brickfield').val();
        var helipad = $(this).find('#helipad').val();
        var road = $(this).find('#road').val();
        var sand = $(this).find('#sand').val();
        var remark = $(this).find('#remark').val();
        

        // automation set value 0 if any field leave empty or null 
        if(forest == '' || forest == null || forest == undefined) forest = 0;
        if(herb == '' || herb == null || herb == undefined) herb = 0;
        if(orchard == '' || orchard == null || orchard == undefined) orchard = 0;
        if(shifting == '' || shifting == null || shifting == undefined) shifting = 0;
        if(crop_land == '' || crop_land == null || crop_land == undefined) crop_land = 0;
        if(lake == '' || lake == null || lake == undefined) lake = 0;
        if(baor == '' || baor == null || baor == undefined) baor = 0;

        // first binding data as xml string
        sendData += '<row>';

        sendData += '<watershed_id>' + watershed_id + '</watershed_id>';
        sendData += '<watershed_name>' + watershed_name + '</watershed_name>';
        sendData += '<para_id>' + para_id + '</para_id>';
        sendData += '<para_name>' + para_name + '</para_name>';

        sendData += '<map_unit>' + map_unit + '</map_unit>';
        sendData += '<area_map_unit>' + area_map_unit + '</area_map_unit>';

        sendData += '<indicator>' + indicator + '</indicator>';
        sendData += '<forest>' + forest + '</forest>';
        sendData += '<herb>' + herb + '</herb>';
        sendData += '<orchard>' + orchard + '</orchard>';
        sendData += '<shifting>' + shifting + '</shifting>';
        sendData += '<crop_land>' + crop_land + '</crop_land>';
        sendData += '<lake>' + lake + '</lake>';
        sendData += '<baor>' + baor + '</baor>';
        sendData += '<rivers>' + rivers + '</rivers>';
        sendData += '<ponds>' + ponds + '</ponds>';
        sendData += '<aquaculture>' + aquaculture + '</aquaculture>';
        sendData += '<rural>' + rural + '</rural>';
        sendData += '<brickfield>' + brickfield + '</brickfield>';
        sendData += '<helipad>' + helipad + '</helipad>';
        sendData += '<road>' + road + '</road>';
        sendData += '<sand>' + sand + '</sand>';
        sendData += '<remark>' + remark + '</remark>';

        sendData += '<created_by>' + created_by + '</created_by>';

        sendData += '</row>';
        
    });

    sendData += '</head>';

    
    console.log(sendData);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_degradation_info",
        type: "POST",
        data: { '_token' : token, 'dataToSend' : sendData },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == "SUCCESS"){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#my_table td input[type=text]').val('');
                
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html(data.message);
            }
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});

$(document).on('click', '#btn_store2', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var map_unit = $('#map_unit').val();
    var area_map_unit = $('#area_map_unit').val();

    var sendData = '';

    sendData = '<head>';

    $('#my_table2 > tbody > tr').each(function () {
        
        var indicator = $(this).closest('tr').find('td:eq(2)').text();
        var forest = $(this).find('#forest').val();
        var herb = $(this).find('#herb').val();
        var orchard = $(this).find('#orchard').val();
        var shifting = $(this).find('#shifting').val();
        var crop_land = $(this).find('#crop_land').val();
        var lake = $(this).find('#lake').val();
        var baor = $(this).find('#baor').val();
        var rivers = $(this).find('#rivers').val();
        var ponds = $(this).find('#ponds').val();
        var aquaculture = $(this).find('#aquaculture').val();
        var rural = $(this).find('#rural').val();
        var brickfield = $(this).find('#brickfield').val();
        var helipad = $(this).find('#helipad').val();
        var road = $(this).find('#road').val();
        var sand = $(this).find('#sand').val();
        var remark = $(this).find('#remark').val();
        

        // automation set value 0 if any field leave empty or null 
        if(forest == '' || forest == null || forest == undefined) forest = 0;
        if(herb == '' || herb == null || herb == undefined) herb = 0;
        if(orchard == '' || orchard == null || orchard == undefined) orchard = 0;
        if(shifting == '' || shifting == null || shifting == undefined) shifting = 0;
        if(crop_land == '' || crop_land == null || crop_land == undefined) crop_land = 0;
        if(lake == '' || lake == null || lake == undefined) lake = 0;
        if(baor == '' || baor == null || baor == undefined) baor = 0;
        if(rivers == '' || rivers == null || rivers == undefined) rivers = '';
        if(ponds == '' || ponds == null || ponds == undefined) ponds = '';
        if(aquaculture == '' || aquaculture == null || aquaculture == undefined) aquaculture = '';
        if(rural == '' || rural == null || rural == undefined) rural = '';
        if(brickfield == '' || brickfield == null || brickfield == undefined) brickfield = '';
        if(helipad == '' || helipad == null || helipad == undefined) helipad = '';
        if(road == '' || road == null || road == undefined) road = '';
        if(sand == '' || sand == null || sand == undefined) sand = '';

        // first binding data as xml string
        sendData += '<row>';

        sendData += '<watershed_id>' + watershed_id + '</watershed_id>';
        sendData += '<watershed_name>' + watershed_name + '</watershed_name>';
        sendData += '<para_id>' + para_id + '</para_id>';
        sendData += '<para_name>' + para_name + '</para_name>';

        sendData += '<map_unit>' + map_unit + '</map_unit>';
        sendData += '<area_map_unit>' + area_map_unit + '</area_map_unit>';

        sendData += '<indicator>' + indicator + '</indicator>';
        sendData += '<forest>' + forest + '</forest>';
        sendData += '<herb>' + herb + '</herb>';
        sendData += '<orchard>' + orchard + '</orchard>';
        sendData += '<shifting>' + shifting + '</shifting>';
        sendData += '<crop_land>' + crop_land + '</crop_land>';
        sendData += '<lake>' + lake + '</lake>';
        sendData += '<baor>' + baor + '</baor>';
        sendData += '<rivers>' + rivers + '</rivers>';
        sendData += '<ponds>' + ponds + '</ponds>';
        sendData += '<aquaculture>' + aquaculture + '</aquaculture>';
        sendData += '<rural>' + rural + '</rural>';
        sendData += '<brickfield>' + brickfield + '</brickfield>';
        sendData += '<helipad>' + helipad + '</helipad>';
        sendData += '<road>' + road + '</road>';
        sendData += '<sand>' + sand + '</sand>';
        sendData += '<remark>' + remark + '</remark>';

        sendData += '<created_by>' + created_by + '</created_by>';

        sendData += '</row>';
        
    });

    sendData += '</head>';

    
    console.log(sendData);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    // $.ajax({
    //     url: "/store_existing_conversation",
    //     type: "POST",
    //     data: { '_token' : token, 'dataToSend' : sendData },
    //     dataType: "JSON",
    //     cache: false,
    //     success: function (data) {
    //         // console.log(data);
    //         if(data.status == "SUCCESS"){
    //             $('#myModal').modal({backdrop : 'static', keyboard : false});
    //             $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
    //             $('#my_table td input[type=text]').val('');
    //         }
    //         else{
    //             $('#myModal').modal({backdrop : 'static', keyboard : false});
    //             $('#error_msg').html(data.message);
    //         }
            
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //         console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    //     }
    // });



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
        $('#my_table > tbody > tr').each(function () {

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
    $('#my_table > tbody > tr').each(function () {
        $(this).find('.sl').html(sl);
        sl++;
    });
    counter = sl - 1;
}



