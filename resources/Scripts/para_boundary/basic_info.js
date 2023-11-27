


document.title = 'basic info';

$(document).ready(function () {

    console.log("hello talha.."); 

    // $('#watershedId').select2();
    // $('#para_list').select2();
    // $('#community').select2();
  
    // $('.select2').css({'border': '2px solid #898AEE', 'border-radius': '5px'});

    // $('#para_list').prop('disabled', true);

    $('.date').datepicker({ dateFormat: "yy-mm-dd" });

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
            });
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

});

$(document).on('change', '#para_list', function () {

    var para_list = $('#para_list option:selected').val();
    // console.log(watershedId);

    if(para_list)
    {
        $.ajax({
            url: "/get_community_list",
            type: "GET",
            data: { 'get_community' : 'get_data' },
            dataType: "html",
            cache: false,
            success: function (data) {
                // console.log(data);
                $('#community').prop('disabled', false);
                $('#community').html(data);
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
    var Community_Id = $('#community option:selected').val();

    if(Para_Id == '' || Para_Id == null || Para_Id == undefined)
    {
        alert("Please Select Para...");
    }
    else if(Community_Id == '' || Community_Id == null || Community_Id == undefined)
    {
        alert("Please Select Community...");
    }
    else
    { 
        $.ajax({
            url: "/check_livelihood_duplicate",
            type: "GET",
            data: { 'watershed_id' : Watershed_Id, 'para_id' : Para_Id, 'community_id' : Community_Id},
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

    survey_date = $('#survey_date').val();
    watershed_id = $('#watershed_id').val();
    watershed_name = $('#watershed_name').val();
    para_name = $('#para_name').val();
    mouza_name = $('#mouza_name').val();
    union = $('#union').val();
    upozila = $('#upozila').val();
    district = $('#district').val();
    headman_name = $('#headman_name').val();
    karbari_name = $('#karbari_name').val();
    chairman_name = $('#chairman_name').val();
    para_area = $('#para_area').val();
    any_remarks = $('#any_remarks').val();

    jsonObj = {
        'survey_date' : survey_date,
        'watershed_id' : watershed_id,
        'watershed_name' : watershed_name,
        'para_name' : para_name,
        'mouza_name' : mouza_name,
        'union' : union,
        'upozila' : upozila,
        'district' : district,
        'headman_name' : headman_name,
        'karbari_name' : karbari_name,
        'chairman_name' : chairman_name,
        'para_area' : para_area,
        'any_remarks' : any_remarks,
        'created_by' : created_by,
    };
    
    console.log(jsonObj);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');
    //  window.location.href = '/view_para_list';

    // $.ajax({
    //     url: "/store_basic_info_para_boundary",
    //     type: "POST",
    //     data: { '_token' : token, 'dataToSend' : JSON.stringify(jsonObj) },
    //     dataType: "JSON",
    //     cache: false,
    //     success: function (data) {
    //         // console.log(data);
    //         if(data.status == 'SUCCESS'){
    //             $('#myModal').modal({backdrop : 'static', keyboard : false});
    //             $('#success_msg').html(data.message);
    //             $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
    //             // alert(data.message);
    //             $('#initial').val('');
    //             $('#btn_close').on('click', function(){
    //                 window.location.href = '/view_para_list';
    //             });
                
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



