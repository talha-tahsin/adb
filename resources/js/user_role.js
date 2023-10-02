

    document.title = 'User Role';

    $(document).ready(function(){

        $(document).on('keypress', '#user_name', function(){
            $('#user_name').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#password', function(){
            $('#password').css({ 'background-color' : 'transparent' });
        });

        $.ajax({
            url: "/user_role",
            type: "GET",
            data: { 'user_role' : 'all_data' },
            dataType: "html",
            cache: false,
            success: function (data) {
                // console.log(data);
                $("#user_role_body").html(data);
                $('#tab_user_role').DataTable();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        
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

    $(document).on('click', '#btn_delte', function(){

        var user_id = $(this).closest('tr').find('td:eq(0)').text();
        var token = $("meta[name='csrf-token']").attr("content");

        if(user_id == '' || user_id == null || user_id == undefined)
        {
            alert("User id not found...");  
        }
        else {

            $confirmMsg = confirm("Are you sure this delete action ?");

            if ($confirmMsg) {
                
                $.ajax({
                    url: "/delte_role",
                    type: "POST",
                    data: { 'user_id' : user_id, '_token' : token },
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        // console.log(data);
                        if(data.status == "SUCCESS") {
                            alert(data.message);   
                            window.location.reload();
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
            
        }
        
        
    });

