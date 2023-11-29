


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
                // console.log(waterShed_id);

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
                $('.initial').val('');
            
                $.ajax({
                    url: "/get_all_para_list",
                    type: "GET",
                    data: { 'watershed_id' : watershed_id },
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

    var row_id = $(this).closest('tr').find('#btn_edit').attr('row_id');
    console.log(row_id);
    
    if(row_id == '' || row_id == null || row_id == undefined){
        alert("Row id not found...");  
    }
    else{
        $('#myModal_edit').modal({backdrop : 'static', keyboard : false});
        $("#row_id").val(row_id);

        $.ajax({
            url: '/get_para_details_for_edit',
            type: "GET",
            data: { 'row_id' : row_id },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                if(data.status == "SUCCESS") {
                    $.each(data.message, function (i, v) {
                        $('#m_para_nm').val(v.para_name);
                        $('#m_para_area').val(v.para_area);
                        $('#m_karbari').val(v.karbari_name);
                        $('#m_chairman').val(v.chairman_name);
                        $('#m_headman').val(v.headman_name);
                        $('#m_mouza').val(v.mouza_name);
                    });
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

$(document).on('click', '#btn_updt', function(){

    var token = $("meta[name='csrf-token']").attr("content");
    var userNme = $('#userName').val();
    var mRowId = $("#row_id").val();
    var m_para_nam = $('#m_para_nm').val();
    var m_para_area = $('#m_para_area').val();
    var m_karbari = $('#m_karbari').val();
    var m_headman = $('#m_headman').val();
    var m_chairman = $('#m_chairman').val();
    var m_mouza = $('#m_mouza').val();

    // console.log(usrId, userStatus);

    var send_data = {
        'row_id' : mRowId,
        'para_name' : m_para_nam,
        'para_area' : m_para_area,
        'karbari_name' : m_karbari,
        'headman_name' : m_headman, 
        'chairman_name' : m_chairman, 
        'mouza_name' : m_mouza, 
    };

    $.ajax({
        url: '/updt_para_basic_info',
        type: "POST",
        data: {'_token' : token, 'dataToSend' : JSON.stringify(send_data)},
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == "SUCCESS") {
                $('#myModal_edit').modal('hide'); 
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                
                
                $.ajax({
                    url: "/get_active_watershed",
                    type: "GET",
                    data: { 'userNm' : userNme },
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        // console.log(data);
                        $.each(data.message, function (i, v) {
                            var waterShed_id = v.watershed_id;
            
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
            }
            else {
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

    var para_id = $(this).closest('tr').find('#btn_data_entry').attr('para_id');
    var para_name = $(this).closest('tr').find('#btn_data_entry').attr('para_name');
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


