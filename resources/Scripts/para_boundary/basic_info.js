


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

    var userNm1 = $('#userName').val();

    $.ajax({
        url: "/get_active_watershed",
        type: "GET",
        data: { 'userNm' : userNm1 },
        dataType: "json",
        cache: false,
        success: function (data) {
            // console.log(data);
            $.each(data.message, function (i, v) {
                $('#watershed_id').val(v.watershed_id);
                var waterShed_id = v.watershed_id;
                console.log(waterShed_id);

                $.ajax({
                    url: "/get_all_para_list",
                    type: "GET",
                    data: { 'watershed_id' : waterShed_id },
                    dataType: "html",
                    cache: false,
                    success: function (data) {
                        // console.log(data);
                        $("#table_body").html(data);
                        $('#my_table').DataTable();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
                
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

    $.ajax({
        url: "/store_basic_info_para_boundary",
        type: "POST",
        data: { '_token' : token, 'dataToSend' : JSON.stringify(jsonObj) },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                // alert(data.message);
                $('#initial').val('');
                $('#btn_close').on('click', function(){
                    window.location.href = '/view_para_list';
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

/*  ======== * ======== * ======== * ======== * ========= * ========= * ========= */


$(document).on('click', '#btn_edit', function(){

    var user_id = $(this).closest('tr').find('td:eq(0)').text();
    
    // console.log(user_id);
    
    if(user_id == '' || user_id == null || user_id == undefined)
    {
        alert("User id not found...");  
    }
    else
    {
        $('#myModal').modal({backdrop : 'static', keyboard : false});

        $("#user_id").val(user_id);

    }
});

$(document).on('click', '#btn_updt', function(){

    var usrId = $("#user_id").val();
    var userStatus = $('#usr_status option:selected').val();
    var usrRole = $('#usr_role option:selected').val();
    var token = $("meta[name='csrf-token']").attr("content");

    // console.log(usrId, userStatus);

    var send_data = {
        'updt_userInfo' : 'info',
        '_token' : token,
        'user_id' : usrId,
        'user_status' : userStatus,
        'user_role' : usrRole 
    };

    var ajaxUrl = "/updt_role";

    $.ajax({
        url: ajaxUrl,
        type: "POST",
        data: send_data,
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            
            if(data.status == "SUCCESS") 
            {
                $('#myModal').modal('hide'); 
                alert(data.message);   
                window.location.reload();
            }
            else 
            {
                alert(data.message);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});

$(document).on('click', '#btn_data_entry', function(){

    var token = $("meta[name='csrf-token']").attr("content");
    // var row_id = $('#btn_data_entry').attr('row_id');
    var userName = $('#userName').val();
    var para_id = $('#btn_data_entry').attr('para_id');
    var para_name = $('#btn_data_entry').attr('para_name');
    console.log(para_id);

    // window.location.href = '/gps-point-of-para-boundary';
    window.open('/gps-point-of-para-boundary', '_blank');

    if(para_id == '' || para_id == null || para_id == undefined){
        alert("User name not found...");  
    }
    else 
    {
        jsonObj = {
            'user_name' : userName,
            'para_id' : para_id,
            'para_name' : para_name
        };
            
        $.ajax({
            url: "/store_para_name_for_entry",
            type: "POST",
            data: { '_token' : token, 'dataToSend' : JSON.stringify(jsonObj) },
            dataType: "json",
            cache: false,
            success: function (data) {
                // console.log(data);
                if(data.status == "SUCCESS") {
                    console.log(data.message);   
                }
                else {
                    alert(data.message);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
        

    
    
});


