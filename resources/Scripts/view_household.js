



document.title = 'View Household ';

$(document).ready(function () {

    console.log("hello talha.."); 

    $('#para_list').prop('disabled', true);

    $.ajax({
        url: "/get_watershedId",
        type: "GET",
        data: { 'watershed' : 'get_data' },
        dataType: "html",
        cache: false,
        success: function (data) {
            // console.log(data);
            $('#watershedId').html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    $.ajax({
        url: "/CommunityList",
        type: "GET",
        data: { 'community_list' : 'get_data' },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
             $.each(data.message, function (i, v) {
                insertTableRow(v.community_name, v.community_id);
             });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

});

$(document).on('change', '#watershedId', function () {

    var watershedId = $('#watershedId option:selected').val();
    // console.log(watershedId);

    if(watershedId)
    {
        $.ajax({
            url: "/get_paraList",
            type: "GET",
            data: { 'watershed_id' : watershedId },
            dataType: "HTML",
            cache: false,
            success: function (data) {
                // console.log(data);
                $('#para_list').prop('disabled', false);
                $('#para_list').html(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

});

$(document).on('click', '#btn_household_list', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();
    // console.log(Watershed_Id);

    if(Watershed_Id && Para_Id)
    {
        $.ajax({
            url: "/get_household_info_list",
            type: "GET",
            data: { 'watershed_id' : Watershed_Id, 'para_id' : Para_Id },
            dataType: "html",
            cache: false,
            success: function (data) {
                // console.log(data);
                $('#table_div').removeClass('hide');
                $('#table_body').html(data);
                $('#voucher_table').DataTable();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

        
    }

});

$(document).on('click', '#btn_edit', function () {

    var row_id = $(this).attr('row_id');
    $('#myModal').modal({backdrop : 'static', keyboard : false});

    
    $.ajax({
        url: "/get_household_info_edit",
        type: "GET",
        data: { 'row_id' : row_id},
        dataType: "json",
        cache: false,
        success: function (data) {
            console.log(data.message.length);

            if(data.message.length == 1)
            {
                $.each(data.message, function(i, v)
                { 
                    $('#cum_name').html(v.community_name);
                    $('#row_id').val(v.id);

                    $('#jhupriType').val(v.jhupri_house);
                    $('#kachaType').val(v.kacha_house);
                    $('#semiPacca').val(v.semi_pacca_house);
                    $('#paccaType').val(v.pacca_house);
                    $('#totalHouse').val(v.total_house);

                });
                
            }
            else
            {
                console.log("Nothing...");
            }
           
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

});

$(document).on('click', '#btn_delte', function () {

    var row_id = $(this).attr('row_id');
    var token = $("meta[name='csrf-token']").attr("content");
    console.log(row_id);

    //var confirm = confirm('Are you sure ? '); 

    if(row_id )
    {
        $.ajax({
            url: "/delete_household_info",
            type: "POST",
            data: { '_token' : token, 'row_id' : row_id },
            dataType: "json",
            cache: false,
            success: function (data) {
                // console.log(data);
                alert(data.message);
                $('#btn_household_list').click();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

        
    }

});


$(document).on('click', '#update_info', function () {

    var update_by = $('#userName').val();
    var rowId = $('#row_id').val();
    var token = $("meta[name='csrf-token']").attr("content");

    var xml_data = '';

    var jhupriType = $('#jhupriType').val();
    var kachaType = $('#kachaType').val();
    var semiPacca = $('#semiPacca').val();
    var paccaType = $('#paccaType').val();
    var totalHouse = $('#totalHouse').val();
        
    // first binding data as xml string
    xml_data += '<row>';

    xml_data += '<jhupriType>' + jhupriType + '</jhupriType>';
    xml_data += '<kachaType>' + kachaType + '</kachaType>';
    xml_data += '<semiPacca>' + semiPacca + '</semiPacca>';
    xml_data += '<paccaType>' + paccaType + '</paccaType>';
    xml_data += '<totalHouse>' + totalHouse + '</totalHouse>';

    xml_data += '<UpdateBy>' + update_by + '</UpdateBy>';

    xml_data += '</row>';
        
    
    console.log(rowId, xml_data);

    $.ajax({
        url: "/update_household_info",
        type: "POST",
        data: { '_token' : token, 'row_id' : rowId, 'xml_data' : xml_data },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            $('#myModal').modal('hide');
            $('#btn_household_list').click();
            alert(data.message);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});


$(document).on('change', '.count', function () {

    var row = $(this).val(); 
    var total = 0;

    // current row and calculate the total
    $('.count').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#totalHouse').val(total);

});




