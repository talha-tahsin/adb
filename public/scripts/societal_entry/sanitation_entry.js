


document.title = 'Sanitation Entry';

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

$(document).on('change', '#para_list', function () {

    var para_list = $('#para_list option:selected').val();
    // console.log(watershedId);

    if(para_list)
    {
        $('#water_source').prop('disabled', false);
        
    }

});

$(document).on('click', '#get_entry_form', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();
    $("#voucher_table > tbody").empty();

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
            url: "/get_latrine_type",
            type: "GET",
            data: { 'latrineList' : 'get_data'},
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);
                if(data.status == 'SUCCESS'){
                    $('#table_div').removeClass('hide');
                    $.each(data.message, function (i, v) {
                        insertTableRow(v.latrine_type_name, v.latrine_type_id);
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
    appendString += '<input type="text" id="own" class="form-control count" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="shared" class="form-control count" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="total" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0" disabled>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="comments" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="Write Comments">';
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

        var latrineType_id = $(this).attr('center_id');
        var latrineType_name = $(this).find('td:eq(1)').text(); //$(this).closest('tr').find('td:eq(1)').text();
        
        var own = $(this).find('#own').val();
        var shared = $(this).find('#shared').val();
        var total = $(this).find('#total').val();
        var comments = $(this).find('#comments').val();

        // first binding data as xml string
        xml_data += '<row>';

        xml_data += '<watershed_id>' + watershed_id + '</watershed_id>';
        xml_data += '<para_id>' + para_id + '</para_id>';
        xml_data += '<para_name>' + para_name + '</para_name>';

        xml_data += '<latrineType_id>' + latrineType_id + '</latrineType_id>';
        xml_data += '<latrineType_name>' + latrineType_name + '</latrineType_name>';

        xml_data += '<own>' + own + '</own>';
        xml_data += '<shared>' + shared + '</shared>';
        xml_data += '<total>' + total + '</total>';
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
        url: "/store_sanitation1_info",
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

    per_latrine_user = $('#per_latrine_user').val();
    male_awareness = $('#male_awareness option:selected').val();
    female_awareness = $('#female_awareness option:selected').val();
    

    jsonObj = {

        'watershed_id' : watershed_id,
        'para_id' : para_id,
        'para_name' : para_name,
        'per_latrine_user' : per_latrine_user,
        'male_awareness' : male_awareness,
        'female_awareness' : female_awareness,
        'created_by' : created_by,

    };
    
    console.log(jsonObj);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_sanitation2_info",
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

                $('#per_latrine_user').val('');
                $('#male_awareness').val('').change();
                $('#female_awareness').val('').change();
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


function clearInput() {

    $('#water_source').val('').change();
    $('#preferred_source').val('');
    $('#drinking_water_number').val('');

}

$(document).on('change', '.count', function () {

    var row = $(this).closest('tr'); 
    var total = 0;

    // current row and calculate the total
    row.find('.count').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    row.find('#total').val(total);


});



