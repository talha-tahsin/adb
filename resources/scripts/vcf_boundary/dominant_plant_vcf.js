

// document.title = 'VCF dominant plants';

$(document).ready(function () {

    // console.log("hello talha..");
    
    // var userNm = $('#userName').val();

    // $.ajax({
    //     url: "/get_active_watershed",
    //     type: "GET",
    //     data: { 'userNm' : userNm },
    //     dataType: "json",
    //     cache: false,
    //     success: function (data) {
    //         // console.log(data);
    //         $.each(data.message, function (i, v) {
    //             $('#watershed_id').val(v.watershed_id);
    //             $('#watershed_name').val(v.watershed_name);
    //             $('#para_id').val(v.para_id);
    //             $('#para_name').val(v.para_name);
    //         });
            
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //         console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    //     }
    // });

    // for (var i = 0; i < 5; i++) {
    //     insertTableRow();
    // }
    // for (var j = 0; j < 5; j++) {
    //     insertTableRow2();
    // }
    // for (var i = 0; i < 5; i++) {
    //     insertTableRow3();
    // }


});

$('#add_row').on('click', function () {
    insertTableRow();
});

$(document).on('click', '#btn_store_plot1', function () {

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
        var species_name1 = $(this).find('#species_name1').val();
        var diameter_height1 = $(this).find('#diameter_height1').val();
        var avg_height1 = $(this).find('#avg_height1').val();
        var dimensions1 = $(this).find('#dimensions1').val();

        // automation set value 0 if any field leave empty or null 
        if(species_name1 == '' || species_name1 == null || species_name1 == undefined) species_name1 = 0;
        if(diameter_height1 == '' || diameter_height1 == null || diameter_height1 == undefined) diameter_height1 = 0;
        if(avg_height1 == '' || avg_height1 == null || avg_height1 == undefined) avg_height1 = 0;
        if(dimensions1 == '' || dimensions1 == null || dimensions1 == undefined) dimensions1 = 0;

        // first binding data as xml string
        sendData += '<row>';

        sendData += '<watershed_id>' + watershed_id + '</watershed_id>';
        sendData += '<watershed_name>' + watershed_name + '</watershed_name>';
        sendData += '<para_id>' + para_id + '</para_id>';
        sendData += '<para_name>' + para_name + '</para_name>';

        sendData += '<species_name1>' + species_name1 + '</species_name1>';
        sendData += '<diameter_height1>' + diameter_height1 + '</diameter_height1>';
        sendData += '<avg_height1>' + avg_height1 + '</avg_height1>';
        sendData += '<dimensions1>' + dimensions1 + '</dimensions1>';

        sendData += '<created_by>' + created_by + '</created_by>';

        sendData += '</row>';
        
    });

    sendData += '</head>';

    
    console.log(sendData);

     // clear model message value for every ajax call provide single accurate message
    $('#success_msg').html('');
    $('#error_msg').html('');
     

    $.ajax({
        url: "/store_plot1_dominant_plants",
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
                //
                $('#div_plot1').addClass('hide'); 
                $('#div_plot2').removeClass('hide');  
                $('#div_plot3').addClass('hide');
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

$('#get_2nd_plot').on('click', function(){
    $('#div_plot1').addClass('hide'); 
    $('#div_plot2').removeClass('hide');  
    $('#div_plot3').addClass('hide');

});

$(document).on('click', '#btn_store_plot2', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var sendData = '';

    sendData = '<head>';

    $('#my_table2 > tbody > tr').each(function () {
        
        // var sample = $(this).closest('tr').find('td:eq(1)').text();
        var species_name2 = $(this).find('#species_name2').val();
        var diameter_height2 = $(this).find('#diameter_height2').val();
        var avg_height2 = $(this).find('#avg_height2').val();
        var dimensions2 = $(this).find('#dimensions2').val();

        // automation set value 0 if any field leave empty or null 
        if(species_name2 == '' || species_name2 == null || species_name2 == undefined) species_name2 = 0;
        if(diameter_height2 == '' || diameter_height2 == null || diameter_height2 == undefined) diameter_height2 = 0;
        if(avg_height2 == '' || avg_height2 == null || avg_height2 == undefined) avg_height2 = 0;
        if(dimensions2 == '' || dimensions2 == null || dimensions2 == undefined) dimensions2 = 0;

        // first binding data as xml string
        sendData += '<row>';

        sendData += '<watershed_id>' + watershed_id + '</watershed_id>';
        sendData += '<watershed_name>' + watershed_name + '</watershed_name>';
        sendData += '<para_id>' + para_id + '</para_id>';
        sendData += '<para_name>' + para_name + '</para_name>';

        sendData += '<species_name2>' + species_name2 + '</species_name2>';
        sendData += '<diameter_height2>' + diameter_height2 + '</diameter_height2>';
        sendData += '<avg_height2>' + avg_height2 + '</avg_height2>';
        sendData += '<dimensions2>' + dimensions2 + '</dimensions2>';

        sendData += '<created_by>' + created_by + '</created_by>';

        sendData += '</row>';
        
    });

    sendData += '</head>';

    
    console.log(sendData);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_plot2_dominant_plants",
        type: "POST",
        data: { '_token' : token, 'dataToSend' : sendData },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == "SUCCESS"){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#my_table2 td input[type=text]').val('');
                $('#voucher_table td input[type=checkbox]').prop('checked', false);
                //
                $('#div_plot1').addClass('hide');
                $('#div_plot2').addClass('hide'); 
                $('#div_plot3').removeClass('hide'); 
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

$('#get_3rd_plot').on('click', function(){
    $('#div_plot1').addClass('hide');
    $('#div_plot2').addClass('hide'); 
    $('#div_plot3').removeClass('hide'); 
});

$(document).on('click', '#btn_store_plot3', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var sendData = '';

    sendData = '<head>';

    $('#my_table3 > tbody > tr').each(function () {
        
        // var sample = $(this).closest('tr').find('td:eq(1)').text();
        var species_name3 = $(this).find('#species_name3').val();
        var diameter_height3 = $(this).find('#diameter_height3').val();
        var avg_height3 = $(this).find('#avg_height3').val();
        var dimensions3 = $(this).find('#dimensions3').val();

        // automation set value 0 if any field leave empty or null 
        if(species_name3 == '' || species_name3 == null || species_name3 == undefined) species_name3 = 0;
        if(diameter_height3 == '' || diameter_height3 == null || diameter_height3 == undefined) diameter_height3 = 0;
        if(avg_height3 == '' || avg_height3 == null || avg_height3 == undefined) avg_height3 = 0;
        if(dimensions3 == '' || dimensions3 == null || dimensions3 == undefined) dimensions3 = 0;

        // first binding data as xml string
        sendData += '<row>';

        sendData += '<watershed_id>' + watershed_id + '</watershed_id>';
        sendData += '<watershed_name>' + watershed_name + '</watershed_name>';
        sendData += '<para_id>' + para_id + '</para_id>';
        sendData += '<para_name>' + para_name + '</para_name>';

        sendData += '<species_name3>' + species_name3 + '</species_name3>';
        sendData += '<diameter_height3>' + diameter_height3 + '</diameter_height3>';
        sendData += '<avg_height3>' + avg_height3 + '</avg_height3>';
        sendData += '<dimensions3>' + dimensions3 + '</dimensions3>';

        sendData += '<created_by>' + created_by + '</created_by>';

        sendData += '</row>';
        
    });

    sendData += '</head>';

    
    console.log(sendData);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_plot3_dominant_plants",
        type: "POST",
        data: { '_token' : token, 'dataToSend' : sendData },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == "SUCCESS"){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                $('#my_table3 td input[type=text]').val('');
                $('#voucher_table td input[type=checkbox]').prop('checked', false);
                //
                $('#btn_close').on('click', function(){
                    window.location.href = '/watershed-dashboard';
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



