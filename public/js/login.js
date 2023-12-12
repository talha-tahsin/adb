

    document.title = 'login';

    $(document).ready(function(){

        $(document).on('keypress', '#user_name', function(){
            $('#user_name').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#password', function(){
            $('#password').css({ 'background-color' : 'transparent' });
        });
        

    });

    $(document).on('click', '#btn_reg', function(){

        var user_nm = $("#user_name").val();
        var password = $("#password").val();
        

        var ajaxUrl = "../utilServices/login_util.php";

        // console.log(user_nm, password);

        if(user_nm == '' || user_nm == null || user_nm == undefined)
        {
            alert("Please enter login user name...");  
            $("#user_name").css('background-color', '#FFCECE');
        }
        else if(password == '' || password == null || password == undefined)
        {
            alert("Please enter login password..."); 
            $("#password").css('background-color', '#FFCECE');
        }
        else
        {
            $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {'login' : 'check','userNm' : user_nm, 'password' : password },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);
                
                if(data.status == "SUCCESS") 
                {
                    $("#user_name").val('');
                    $("#password").val('');
                    // alert(data.message);
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
        }
    });