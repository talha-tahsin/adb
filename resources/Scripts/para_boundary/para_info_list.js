

document.title = 'Para List';

$(document).ready(function(){

    $(document).on('keypress', '#user_name', function(){
        $('#user_name').css({ 'background-color' : 'transparent' });
    });
    $(document).on('keypress', '#password', function(){
        $('#password').css({ 'background-color' : 'transparent' });
    });

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


    // $.ajax({
    //     url: "/get_all_para_list",
    //     type: "GET",
    //     data: { 'watershed_id' : water_id },
    //     dataType: "html",
    //     cache: false,
    //     success: function (data) {
    //         // console.log(data);
    //         $("#table_body").html(data);
    //         $('#my_table').DataTable();
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //         console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    //     }
    // });
    
});


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

