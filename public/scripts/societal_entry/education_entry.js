


document.title = 'Education';

$(document).ready(function () {

    console.log("hello talha.."); 

    // $('#para_list').prop('disabled', true);

    // insertTableRow();
    jsonData = {
        '0011' : 'Literate (can read and write)',
        '0012' : 'Primary',
        '0013' : 'Secondary (SSC)',
        '0014' : 'Higher secondary (HSC)',
        '0015' : 'Graduate',
        '0016' : 'Postgraduate',
    };
    $.each(jsonData, function(key, value) {
        insertTableRow1(value);
    });

    myJson = {
        '001' : 'Para learning centre',
        '002' : 'Primary school',
        '003' : 'High School',
        '004' : 'College',
        '005' : 'Others',
    };
    $.each(myJson, function(key, value) {
        insertTableRow2(value);
    });

});

function insertTableRow1(name) {

    var appendString = '';
    var rowCount = $('#my_table > tbody > tr').length;
    rowCount++;

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';

    appendString += '<td style="width: 400px;text-align: left;">' + name + '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="male" class="form-control maleTot" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="female" class="form-control femaleTot" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    //appendString += '<td style="text-align: center;">';
    //appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>';
    //appendString += '</td>';

    appendString += '</tr>';

    $('#my_table > tbody:last-child').append(appendString);
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
    var dataToSend = '';

    if(watershed_id == '' || watershed_id == null || watershed_id == undefined){
        alert("Please Select watershed id");
    }
    else if (para_id == '' || para_id == null || para_id == undefined){
        alert("Please Select para id...");
    }
    else
    {
        dataToSend = '<head>';

        $('#my_table > tbody > tr').each(function () {

            // var tr_comnty_id = $(this).attr('comnty_id');
            // var tr_comnty_name = $(this).find('td:eq(1)').text(); 
            var level_name = $(this).closest('tr').find('td:eq(1)').text();

            var male = $(this).find('#male').val();
            var female = $(this).find('#female').val();

            if(male == '' || male == null || male == undefined) male = 0;
            if(female == '' || female == null || female == undefined) female = 0;
        
            // first binding data as xml string
            dataToSend += '<row>';

            dataToSend += '<watershed_id>' + watershed_id + '</watershed_id>';
            dataToSend += '<watershed_name>' + watershed_name + '</watershed_name>';
            dataToSend += '<para_id>' + para_id + '</para_id>';
            dataToSend += '<para_name>' + para_name + '</para_name>';

            dataToSend += '<level_name>' + level_name + '</level_name>';
            dataToSend += '<male>' + male + '</male>';
            dataToSend += '<female>' + female + '</female>';

            dataToSend += '<created_by>' + created_by + '</created_by>';

            dataToSend += '</row>';
            
        });

        dataToSend += '</head>';

        console.log(dataToSend);

        // clear model message value for every ajax call provide single accurate message
        $('#success_msg').html('');
        $('#error_msg').html('');

        $.ajax({
            url: "/store_literacy_rate_level",
            type: "POST",
            data: { '_token' : token, 'dataToSend' : dataToSend },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                if(data.status == 'SUCCESS'){
                    $('#myModal').modal({backdrop : 'static', keyboard : false});
                    $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                    $('#my_table td input[type=text]').val('');
                    $('#my_table td').find('.resetSelect').prop("selectedIndex", 0);
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

    }
        
    



});

function insertTableRow2(name) {

    var appendString = '';
    var rowCount = $('#my_table2 > tbody > tr').length;
    rowCount++;

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';

    appendString += '<td style="width: 300px;text-align: left;">' + name + '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="no_of_institution" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="average_distance" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="average_time" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    //appendString += '<td style="text-align: center;">';
    //appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>';
    //appendString += '</td>';

    appendString += '</tr>';

    $('#my_table2 > tbody:last-child').append(appendString);
    removeTableRow();
    // $("#voucher_table tr:last").scrollintoview();
}

$(document).on('click', '#btn_store2', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var dataToSend = '';

    dataToSend = '<head>';

    $('#my_table2 > tbody > tr').each(function () {

        // var tr_comnty_id = $(this).attr('comnty_id');
        // var tr_comnty_name = $(this).find('td:eq(1)').text(); 
        var institution_name = $(this).closest('tr').find('td:eq(1)').text();

        var no_of_institution = $(this).find('#no_of_institution').val();
        var average_distance = $(this).find('#average_distance').val();
        var average_time = $(this).find('#average_time').val();

        if(no_of_institution == '' || no_of_institution == null || no_of_institution == undefined) no_of_institution = 0;
        if(average_distance == '' || average_distance == null || average_distance == undefined) average_distance = 0;
        if(average_time == '' || average_time == null || average_time == undefined) average_time = 0;
    
        // first binding data as xml string
        dataToSend += '<row>';

        dataToSend += '<watershed_id>' + watershed_id + '</watershed_id>';
        dataToSend += '<watershed_name>' + watershed_name + '</watershed_name>';
        dataToSend += '<para_id>' + para_id + '</para_id>';
        dataToSend += '<para_name>' + para_name + '</para_name>';

        dataToSend += '<institution_name>' + institution_name + '</institution_name>';
        dataToSend += '<no_of_institution>' + no_of_institution + '</no_of_institution>';
        dataToSend += '<average_distance>' + average_distance + '</average_distance>';
        dataToSend += '<average_time>' + average_time + '</average_time>';

        dataToSend += '<created_by>' + created_by + '</created_by>';

        dataToSend += '</row>';
        
    });

    dataToSend += '</head>';

    
    console.log(dataToSend);

    // clear model message value for every ajax call provide single accurate message
    $('#success_msg').html('');
    $('#error_msg').html('');

    $.ajax({
        url: "/store_availability_education_institution",
        type: "POST",
        data: { '_token' : token, 'dataToSend' : dataToSend },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#my_table2 td input[type=text]').val('');
                $('#my_table2 td').find('.resetSelect').prop("selectedIndex", 0);
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

$(document).on('change', '.maleTot', function () {

    // var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    $('.maleTot').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#totalMale').val(total);

    // row.find('.total').each(function () {
    //     var rowTotal = parseFloat($(this).val());
    //     if (!isNaN(rowTotal)) {
    //         grandTotal += rowTotal;
    //     }
    // });

    // row.find('#grandTotal').val(grandTotal);

});

$(document).on('change', '.femaleTot', function () {

    // var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    $('.femaleTot').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#totalFemale').val(total);

    // row.find('.total').each(function () {
    //     var rowTotal = parseFloat($(this).val());
    //     if (!isNaN(rowTotal)) {
    //         grandTotal += rowTotal;
    //     }
    // });

    // row.find('#grandTotal').val(grandTotal);

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



