


document.title = 'second ground truth';

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

    for (var i = 0; i < 5; i++) {
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
    // console.log(accountName);

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="east_degree" name="east_degree" class="form-control" value="" style="width: 80px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="east_minute" name="east_minute" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="east_second" name="east_second" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="north_degree" name="norht_degree" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="north_minute" name="north_minute" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="north_second" name="north_second" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="north_second" name="north_second" class="form-control" value="" style="width: 80px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="north_second" name="north_second" class="form-control" value="" style="width: 80px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="north_second" name="north_second" class="form-control" value="" style="width: 80px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="north_second" name="north_second" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
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
        var east_degree = $(this).find('#east_degree').val();
        var east_minute = $(this).find('#east_minute').val();
        var east_second = $(this).find('#east_second').val();
        var north_degree = $(this).find('#north_degree').val();
        var north_minute = $(this).find('#north_minute').val();
        var north_second = $(this).find('#north_second').val();

        // automation set value 0 if any field leave empty or null 
        if(east_degree == '' || east_degree == null || east_degree == undefined) east_degree = 0;
        if(east_minute == '' || east_minute == null || east_minute == undefined) east_minute = 0;
        if(east_second == '' || east_second == null || east_second == undefined) east_second = 0;
        if(north_degree == '' || north_degree == null || north_degree == undefined) north_degree = 0;
        if(north_minute == '' || north_minute == null || north_minute == undefined) north_minute = 0;
        if(north_second == '' || north_second == null || north_second == undefined) north_second = 0;

        // first binding data as xml string
        sendData += '<row>';

        sendData += '<watershed_id>' + watershed_id + '</watershed_id>';
        sendData += '<watershed_name>' + watershed_name + '</watershed_name>';
        sendData += '<para_id>' + para_id + '</para_id>';
        sendData += '<para_name>' + para_name + '</para_name>';

        sendData += '<east_degree>' + east_degree + '</east_degree>';
        sendData += '<east_minute>' + east_minute + '</east_minute>';
        sendData += '<east_second>' + east_second + '</east_second>';
        sendData += '<north_degree>' + north_degree + '</north_degree>';
        sendData += '<north_minute>' + north_minute + '</north_minute>';
        sendData += '<north_second>' + north_second + '</north_second>';

        sendData += '<created_by>' + created_by + '</created_by>';

        sendData += '</row>';
        
    });

    sendData += '</head>';

    
    console.log(sendData);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_gps_point_vcf",
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
                $('#voucher_table td input[type=checkbox]').prop('checked', false);
                // alert(data.message);
                $('#btn_close').on('click', function(){
                    window.location.href = '/dominant-plant-vcf-boundary';
                });
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



