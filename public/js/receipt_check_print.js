

    document.title = 'Check & Print';

    $(document).ready(function(){

        $(document).on('change', '#start_date', function(){
            $('#start_date').css({ 'background-color' : 'transparent' });
        });
        $(document).on('change', '#end_date', function(){
            $('#end_date').css({ 'background-color' : 'transparent' });
        });

        $('.date').datepicker({ dateFormat: "yy-mm-dd" });

       
        
    });

    $(document).on('click', '#btn_getData', function(){

        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var token = $("meta[name='csrf-token']").attr("content");

        if(startDate == '' || startDate == null || startDate == undefined){
            alert("Please select start date...");
            $("#start_date").css('background-color', '#FFCECE'); 
        }
        else if (endDate == '' || endDate == null || endDate == undefined){
            alert("Please select end date...");
            $("#end_date").css('background-color', '#FFCECE'); 
        }
        else {

            $.ajax({
                url: "/getReceipt_list",
                type: "GET",
                data: { 'start_date' : startDate, 'end_date' : endDate },
                dataType: "html",
                cache: false,
                success: function (data) {
                    // console.log(data);
                    $('#initial_text').addClass('hide');
                    $('#receipt_div').removeClass('hide');

                    $("#tab_body").html(data);
                    $('#tab_user_role').DataTable();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });

        }

       

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

