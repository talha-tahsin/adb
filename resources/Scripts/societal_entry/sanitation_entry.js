


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
    var water_source_id = $('#water_source option:selected').val();

    if(Para_Id == '' || Para_Id == null || Para_Id == undefined)
    {
        alert("Please Select Para...");
    }
    else if(water_source_id == '' || water_source_id == null || water_source_id == undefined)
    {
        alert("Please Select Community...");
    }
    else
    { 
        $.ajax({
            url: "/get_water_duplicate",
            type: "GET",
            data: { 'watershed_id' : Watershed_Id, 'para_id' : Para_Id, 'water_source_id' : water_source_id },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                if(data.status == 'SUCCESS'){
                    $('#table_div').removeClass('hide');
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

$(document).on('click', '#btn_store', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();

    source_id = $('#water_source option:selected').val();
    source_name = $('#water_source option:selected').text();

    preferred_source = $('#preferred_source').val();
    drinking_water_number = $('#drinking_water_number').val();

    distance = $('#distance option:selected').val();
    availability = $('#availability option:selected').val();
    quality = $('#quality option:selected').val();
    

    jsonObj = {
        'watershed_id' : watershed_id,
        'para_id' : para_id,
        'para_name' : para_name,
        'source_id' : source_id,
        'source_name' : source_name,
        'preferred_source' : preferred_source,
        'drinking_water_number' : drinking_water_number,
        'distance' : distance,
        'availability' : availability,
        'quality' : quality,
        'created_by' : created_by,

    };
    
    console.log(jsonObj);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_water_info",
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



