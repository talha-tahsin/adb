

    document.title = 'Receipt View Print';

    $(document).ready(function(){

        $(document).on('keypress', '#start_date', function(){
            $('#start_date').css({ 'background-color' : 'transparent' });
        });
        $(document).on('keypress', '#end_date', function(){
            $('#end_date').css({ 'background-color' : 'transparent' });
        });

        $('.set_date').datepicker({ dateFormat: "yy-mm-dd" });

        // date picker
        // $('.set_date').daterangepicker();

        // $(".set_date").datepicker({
        //     format: "yyyy-mm-dd",
        //     setDate : null,
        //     autocomplete: "off",
        //     startDate: new Date(2019, 06, 01, 10, 33),
        //     endDate: new Date()
        //     }).on('change', function(){ $('.datepicker').hide(); 
        // });

        // let table = new DataTable('#voucher_table');



    });


    $(document).on('click', '#btn_show', function(){

        startDate = $("#start_date").val();
        endDate = $("#end_date").val();
        
        // console.log("here..", startDate, endDate);
        
        if(startDate == '' || startDate == null || startDate == undefined)
        {
            alert("Please enter start date...");
            $("#start_date").css('background-color', '#FFCECE');  
        }
        else if(endDate == '' || endDate == null || endDate == undefined)
        {
            alert("Please enter end date...");
            $("#end_date").css('background-color', '#FFCECE');  
        }
        else
        {
            
            $('#iniText').addClass('hide');
            $('#table_row').removeClass('hide');

            var ajaxUrl = "../../utilServices/receipt_view_utils.php";

            $.ajax({
                url: ajaxUrl,
                type: "POST",
                data: { 'receipt_view' : 'data', 'start_date' : startDate, 'end_date' : endDate },
                dataType: "html",
                cache: false,
                success: function (data) {
                    // console.log(data);
                    
                    $("#table_body").html(data);
                    $('#voucher_table').DataTable();

                    // $('#voucher_table').DataTable({
                    //     "paging": true,
                    //     "lengthChange": false,
                    //     "searching": false,
                    //     "ordering": true,
                    //     "info": true,
                    //     "autoWidth": false,
                    //     "responsive": true,
                    // });

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });

        }

    });


    $(document).on('click', '#btn_view', function(){

        var receiptNo = $(this).closest('tr').find('td:eq(1)').text();
        
        // console.log(receiptNo);

        gotoUrl("../reportPdf/receipt_pdf.php", { 'receipt_pdf' : 'data', 'receipt_no' : receiptNo }, '', '_blank');

    });


    function gotoUrl(path, params, method, target = ''){

        method = method || "post";
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);
        form.setAttribute("target", target);
        if (typeof params === 'string') {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", 'data');
            hiddenField.setAttribute("value", params);
            form.appendChild(hiddenField);
        }
        else {
            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    if(typeof params[key] === 'object'){
                        hiddenField.setAttribute("value", JSON.stringify(params[key]));
                    }
                    else{
                        hiddenField.setAttribute("value", params[key]);
                    }
                    form.appendChild(hiddenField);
                }
            }
        }

        document.body.appendChild(form);
        form.submit();
    }
    



