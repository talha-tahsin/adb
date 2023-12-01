


document.title = 'Livestock Entry';

$(document).ready(function () {

    console.log("hello talha..");
    
    $(document).on('change', '#watershedId', function(){
        $("#watershedId").siblings().children().children().css('background-color', 'transparent');
    });

    $(document).on('change', '#para_list', function(){
        $("#para_list").siblings().children().children().css('background-color', 'transparent');
    });

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

    $.ajax({
        url: "/get_livestock_type",
        type: "GET",
        data: { 'latrineList' : 'get_data'},
        dataType: "JSON",
        cache: false,
        success: function (data) {
            console.log(data);
            if(data.status == 'SUCCESS'){
                $('#table_div').removeClass('hide');
                $.each(data.message, function (i, v) {
                    insertTableRow(v.livestock_name, v.livestock_id);
                    insertTableRow2(v.livestock_name, v.livestock_id);
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

    $.ajax({
        url: "/get_farm_item",
        type: "GET",
        data: { 'latrineList' : 'get_data'},
        dataType: "JSON",
        cache: false,
        success: function (data) {
            console.log(data);
            if(data.status == 'SUCCESS'){
                $('#table_div').removeClass('hide');
                $.each(data.message, function (i, v) {
                    insertTableRow3(v.item_name, v.item_id);
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
            url: "/get_livestock_type",
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
    appendString += '<td style="width: 200px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="nos" class="form-control" value="" style="width: 200px;text-align: left;" placeholder="Please fill up this field...">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="unit_value" class="form-control" value="" style="width: 250px;text-align: left;" placeholder="Please fill up this field...">';
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

    if(watershed_id == '' || watershed_id == null || watershed_id == undefined){
        alert("Please Select Watershed id first....");
        $("#watershedId").siblings().children().children().css('background-color', '#FFCECE');
    }
    else if(para_id == '' || para_id == null || para_id == undefined){
        alert("Please Select Para first....");
        $("#para_list").siblings().children().children().css('background-color', '#FFCECE');
    }
    else
    {

        xml_data = '<head>';

        $('#voucher_table > tbody > tr').each(function () {

            var livestock_id = $(this).attr('center_id');
            var livestock_name = $(this).find('td:eq(1)').text(); 
            
            var nos = $(this).find('#nos').val();
            var unit_value = $(this).find('#unit_value').val();

            // first binding data as xml string
            xml_data += '<row>';

            xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
            xml_data += '<para_id>' + para_id + '</para_id>';
            xml_data += '<para_name>' + para_name + '</para_name>';

            xml_data += '<livestock_id>' + livestock_id + '</livestock_id>';
            xml_data += '<livestock_name>' + livestock_name + '</livestock_name>';
            xml_data += '<nos>' + nos + '</nos>';
            xml_data += '<unit_value>' + unit_value + '</unit_value>';

            xml_data += '<created_by>' + created_by + '</created_by>';

            xml_data += '</row>';
            
        });

        xml_data += '</head>';
        
        console.log(xml_data);

        // clear model message value for every ajax call provide single accurate message
        $('#success_msg').html('');
        $('#error_msg').html('');

        $.ajax({
            url: "/store_livestock_entry1",
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
                    // Initial values
                    $('#voucher_table td').find('.resetSelect').prop("selectedIndex", 0);
                    $('#voucher_table td input[type=text]').val('');
                    window.location.reload(true);
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

function insertTableRow2(center_name, center_id) {

    var appendString = '';
    var rowCount = $('#diseases_table > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr center_id="'+center_id+'" >';

    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td style="width: 200px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="diseases_name" class="form-control" value="" style="width: 200px;text-align: left;" placeholder="Please fill up this field...">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="mechanism" class="form-control" value="" style="width: 250px;text-align: left;" placeholder="Please fill up this field...">';
    appendString += '</td>';

    appendString += '</tr>';


    $('#diseases_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    // removeTableRow();
}

$(document).on('click', '#btn_store2', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    if(watershed_id == '' || watershed_id == null || watershed_id == undefined){
        alert("Please Select Watershed id first....");
        $("#watershedId").siblings().children().children().css('background-color', '#FFCECE');
    }
    else if(para_id == '' || para_id == null || para_id == undefined){
        alert("Please Select Para first....");
        $("#para_list").siblings().children().children().css('background-color', '#FFCECE');
    }
    else
    {

        xml_data = '<head>';

        $('#diseases_table > tbody > tr').each(function () {

            var livestock_id = $(this).attr('center_id');
            var livestock_name = $(this).find('td:eq(1)').text(); 
            
            var diseases_name = $(this).find('#diseases_name').val();
            var mechanism = $(this).find('#mechanism').val();

            // first binding data as xml string
            xml_data += '<row>';

            xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
            xml_data += '<para_id>' + para_id + '</para_id>';
            xml_data += '<para_name>' + para_name + '</para_name>';

            xml_data += '<livestock_id>' + livestock_id + '</livestock_id>';
            xml_data += '<livestock_name>' + livestock_name + '</livestock_name>';
            xml_data += '<diseases_name>' + diseases_name + '</diseases_name>';
            xml_data += '<mechanism>' + mechanism + '</mechanism>';

            xml_data += '<created_by>' + created_by + '</created_by>';

            xml_data += '</row>';
            
        });

        xml_data += '</head>';
        
        console.log(xml_data);

        // clear model message value for every ajax call provide single accurate message
        $('#success_msg').html('');
        $('#error_msg').html('');

        $.ajax({
            url: "/store_livestock_entry2",
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
                    $('#diseases_table td input[type=text]').val('');
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
    }   



});

function insertTableRow3(center_name, center_id) {

    var appendString = '';
    var rowCount = $('#farm_house_cost > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr center_id="'+center_id+'" >';

    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td style="width: 200px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="unit_cost" class="form-control" value="" style="width: 200px;text-align: left;" placeholder="Please fill up this field">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="total_cost" class="form-control" value="" style="width: 250px;text-align: left;" placeholder="Please fill up this field">';
    appendString += '</td>';

    appendString += '</tr>';


    $('#farm_house_cost > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    // removeTableRow();
}

$(document).on('click', '#btn_store3', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    if(watershed_id == '' || watershed_id == null || watershed_id == undefined){
        alert("Please Select Watershed id first....");
        $("#watershedId").siblings().children().children().css('background-color', '#FFCECE');
    }
    else if(para_id == '' || para_id == null || para_id == undefined){
        alert("Please Select Para first....");
        $("#para_list").siblings().children().children().css('background-color', '#FFCECE');
    }
    else
    {
        xml_data = '<head>';

        $('#farm_house_cost > tbody > tr').each(function () {

            var farm_item_id = $(this).attr('center_id');
            var farm_item_name = $(this).find('td:eq(1)').text(); 
            
            var unit_cost = $(this).find('#unit_cost').val();
            var total_cost = $(this).find('#total_cost').val();

            // first binding data as xml string
            xml_data += '<row>';

            xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
            xml_data += '<para_id>' + para_id + '</para_id>';
            xml_data += '<para_name>' + para_name + '</para_name>';

            xml_data += '<farm_item_id>' + farm_item_id + '</farm_item_id>';
            xml_data += '<farm_item_name>' + farm_item_name + '</farm_item_name>';
            xml_data += '<unit_cost>' + unit_cost + '</unit_cost>';
            xml_data += '<total_cost>' + total_cost + '</total_cost>';

            xml_data += '<created_by>' + created_by + '</created_by>';

            xml_data += '</row>';
            
        });

        xml_data += '</head>';
        
        console.log(xml_data);

        // clear model message value for every ajax call provide single accurate message
        $('#success_msg').html('');
        $('#error_msg').html('');

        $.ajax({
            url: "/store_livestock_entry3",
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
                    $('#farm_house_cost td input[type=text]').val('');
                    // window.location.reload(true);
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

function clearInput() {

    $('#water_source').val('').change();
    $('#preferred_source').val('');
    $('#drinking_water_number').val('');

}



