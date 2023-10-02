

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
                console.log(data);

                $("#user_role_body").html(data);
                $('#tab_user_role').DataTable();

                // if(data.status == 'SUCCESS'){ 
                //     var table = $('#tab_user_role').DataTable({ 
                //         retrieve: true,
                //         "columnDefs": [
                //             { "className": "text-center", "width": "3%", "targets": 0 },
                //             { "className": "text-left", "width": "8%", "targets": 1 },
                //             { "className": "text-left", "width": "12%", "targets": 2 },
                            
                //             { "className": "text-center", "width": "5%", "targets": 3 },
                //             { "className": "text-center", "width": "5%", "targets": 4 },
                //             { "className": "text-center", "width": "8%", "targets": 5 },
                //             { "className": "text-center", "width": "8%", "targets": 6 },
                //             { "className": "text-center", "width": "8%", "targets": 7 }
                //         ] 
                //     });
                //     table.clear().draw();

                //     $.each(data.message, function(index, v){
                //         // SL = SL + 1;
                //         var v_id = v.id;
                //         var v_name = v.name; 
                //         var v_email = v.email; 
                //         var v_status = v.status; 
                //         var v_role = v.role;
                //         var v_date = v.created_at;

                //         var btn_edit = '<button type="submit" class="btn btn-primary" id="btn_edit" user_id="'+v_id+'">Edit</button>';
                //         var btn_delete = '<button type="submit" class="btn btn-warning" id="btn_edit" user_id="'+v_id+'">Delete</button>';

                //         table.row.add([ v_id, v_name, v_email, v_status, v_role, v_date, btn_edit, btn_delete ]).draw();
                //     });
                // }

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

