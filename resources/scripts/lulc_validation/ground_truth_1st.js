


document.title = 'map-wise: first ground truth';

$(document).ready(function () {

    console.log("hello talha23..");
    
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

    for (var i = 0; i < 3; i++) {
        insertTableRow();
    }


});

$('#add_row').on('click', function () {
    insertTableRow();
});

function insertTableRow() {

    var appendString = '';
    var rowCount = $('#my_table > tbody > tr').length;
    rowCount++;

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="map_code_unit" name="map_code_unit" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="longitude_east" name="longitude_east" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="longitude_north" name="longitude_north" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="elevation" name="elevation" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="map_code" name="map_code" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="observed_code" name="observed_code" class="form-control" value="" style="width: 180px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="gcp_type" name="gcp_type" class="form-control resetSelect" value="" style="width: 150px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Mandatory">Mandatory</option>';
    appendString += '<option value="Shifted">Shifted</option>';
    appendString += '<option value="Accuracy">Accuracy </option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="photo_id" name="photo_id" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="photo_aspect" name="photo_aspect" class="form-control resetSelect" value="" style="width: 150px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="East">East</option>';
    appendString += '<option value="West">West</option>';
    appendString += '<option value="North">North</option>';
    appendString += '<option value="South">South</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td style="text-align: center;">';
    appendString += '<button type="button" class="btn btn-xs btn-danger removeHead"><i class="fa fa-remove"></i>Remove</button>';
    appendString += '</td>';

    appendString += '</tr>';


    $('#my_table > tbody:last-child').append(appendString);
    // $("#my_table tr:last").scrollintoview();
    removeTableRow();
}

$(document).on('click', '#btn_store', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var sendData = '';

    sendData = '<head>';

    $('#my_table > tbody > tr').each(function () {
        
        // var sample = $(this).closest('tr').find('td:eq(1)').text();
        var map_code_unit = $(this).find('#map_code_unit').val();
        var longitude_east = $(this).find('#longitude_east').val();
        var longitude_north = $(this).find('#longitude_north').val();
        var elevation = $(this).find('#elevation').val();
        var map_code = $(this).find('#map_code').val();
        var observed_code = $(this).find('#observed_code').val();
        var gcp_type = $(this).find('#gcp_type option:selected').val();
        var photo_id = $(this).find('#photo_id').val();
        var photo_aspect = $(this).find('#photo_aspect option:selected').val();

        // automation set value 0 if any field leave empty or null 
        if(map_code_unit == '' || map_code_unit == null || map_code_unit == undefined) map_code_unit = 0;
        if(longitude_east == '' || longitude_east == null || longitude_east == undefined) longitude_east = 0;
        if(longitude_north == '' || longitude_north == null || longitude_north == undefined) longitude_north = 0;
        if(elevation == '' || elevation == null || elevation == undefined) elevation = 0;
        if(map_code == '' || map_code == null || map_code == undefined) map_code = 0;
        if(observed_code == '' || observed_code == null || observed_code == undefined) observed_code = 0;
        if(gcp_type == '' || gcp_type == null || gcp_type == undefined) gcp_type = 0;
        if(photo_id == '' || photo_id == null || photo_id == undefined) photo_id = 0;
        if(photo_aspect == '' || photo_aspect == null || photo_aspect == undefined) photo_aspect = 0;

        // first binding data as xml string
        sendData += '<row>';

        sendData += '<watershed_id>' + watershed_id + '</watershed_id>';
        sendData += '<watershed_name>' + watershed_name + '</watershed_name>';
        sendData += '<para_id>' + para_id + '</para_id>';
        sendData += '<para_name>' + para_name + '</para_name>';

        sendData += '<map_code_unit>' + map_code_unit + '</map_code_unit>';
        sendData += '<longitude_east>' + longitude_east + '</longitude_east>';
        sendData += '<longitude_north>' + longitude_north + '</longitude_north>';
        sendData += '<elevation>' + elevation + '</elevation>';
        sendData += '<map_code>' + map_code + '</map_code>';
        sendData += '<observed_code>' + observed_code + '</observed_code>';
        sendData += '<gcp_type>' + gcp_type + '</gcp_type>';
        sendData += '<photo_id>' + photo_id + '</photo_id>';
        sendData += '<photo_aspect>' + photo_aspect + '</photo_aspect>';

        sendData += '<created_by>' + created_by + '</created_by>';

        sendData += '</row>';
        
    });

    sendData += '</head>';

    
    console.log(sendData);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_first_ground_truth",
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
                $('#my_table td').find('.resetSelect').prop("selectedIndex", 0);
                // alert(data.message);
                $('#btn_close').on('click', function(){
                    window.location.href = '/show-ground-truth-second';
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



