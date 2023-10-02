

    document.title = 'registration';

    $(document).ready(function(){

        $(document).on('keypress', '#user_name', function(){
            $('#user_name').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#password', function(){
            $('#password').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#email', function(){
            $('#email').css({ 'background-color' : 'transparent' });
        });

    });

    $(document).on('click', '#btn_reg', function(){

        var user_nm = $("#user_name").val();
        var password = $("#password").val();
        var email = $("#email").val();

        var ajaxUrl = "../utilServices/registration_util.php";

        // console.log(user_nm, password);

        if(user_nm == '' || user_nm == null || user_nm == undefined)
        {
          $("#user_name").css('background-color', '#FFCECE');
        }
        else if(password == '' || password == null || password == undefined)
        {
          $("#password").css('background-color', '#FFCECE');
        }
        else if(email == '' || email == null || email == undefined)
        {
          $("#email").css('background-color', '#FFCECE');
        }
        else
        {
            $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {'user_registration' : 'insert','userNm' : user_nm, 'password' : password, 'email' : email},
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);
                
                if(data.status == "SUCCESS") 
                {
                    $("#user_name").val('');
                    $("#password").val('');
                    $("#email").val('');
                    alert(data.message);
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