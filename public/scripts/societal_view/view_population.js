



document.title = 'View Population ';

$(document).ready(function () {

    console.log("hello talha.."); 

    $('#para_list').prop('disabled', true);

    $.ajax({
        url: "/get_watershedId",
        type: "GET",
        data: { 'watershed' : 'get_data' },
        dataType: "HTML",
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
                insertTableRow(v.community_name, v.id);
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

$(document).on('click', '#viewPopulation', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();
    // console.log(Watershed_Id);

    if(Watershed_Id && Para_Id)
    {
        $.ajax({
            url: "/get_population_list",
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
    
    $.ajax({
        url: "/get_population_details",
        type: "GET",
        data: { 'row_id' : row_id},
        dataType: "json",
        cache: false,
        success: function (data) {
            console.log(data);
            
            $('#myModal').modal({backdrop : 'static', keyboard : false});

            if(typeof data.message.MaleUnder5 == 'undefined')
            {
                $.each(data.message, function(i, v)
                { 
                    $('#cum_name').html(v.CommunityName);
                    $('#row_id').val(v.id);

                    $('#maleUnder5').val(v.MaleUnder5);
                    $('#male5to14').val(v.Male5to14);
                    $('#male15to19').val(v.Male15to19);
                    $('#male20to49').val(v.Male20to49);
                    $('#male50to65').val(v.Male50to65);
                    $('#male65Up').val(v.Male65Up);

                    $('#femaleUnder5').val(v.FemaleUnder5);
                    $('#female5to14').val(v.Female5to14);
                    $('#female15to19').val(v.Female15to19);
                    $('#female20to49').val(v.Female20to49);
                    $('#female50to65').val(v.Female50to65);
                    $('#female65Up').val(v.Female65Up);

                    $('#totalMale').val(v.Totalmale);
                    $('#totalFemale').val(v.TotalFemale);
                    $('#grndTotal').val(v.TotalPopulation);

                    $('#disableMale').val(v.DisbaleMale);
                    $('#disableFemale').val(v.DisabledFemale);
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

    var user_id = $(this).attr('row_id');
    var token = $("meta[name='csrf-token']").attr("content");
    console.log(user_id);

    //var confirm = confirm('Are you sure ? '); 

    if(user_id )
    {
        $.ajax({
            url: "/delete_population",
            type: "POST",
            data: { '_token' : token, 'user_id' : user_id },
            dataType: "json",
            cache: false,
            success: function (data) {
                // console.log(data);
                alert(data.message);
                $('#viewPopulation').click();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

        
    }

});


$(document).on('click', '#updatePopulation', function () {

    var update_by = $('#userName').val();
    var rowId = $('#row_id').val();
    var token = $("meta[name='csrf-token']").attr("content");

    var xml_data = '';

    var m_under_5 = $('#maleUnder5').val();
    var m_5_14 = $('#male5to14').val();
    var m_15_19 = $('#male15to19').val();
    var m_20_49 = $('#male20to49').val();
    var m_50_65 = $('#male50to65').val();
    var m_65_up = $('#male65Up').val();

    var fe_under_5 = $('#femaleUnder5').val();
    var fe_5_14 = $('#female5to14').val();
    var fe_15_19 = $('#female15to19').val();
    var fe_20_49 = $('#female20to49').val();
    var fe_50_65 = $('#female50to65').val();
    var fe_65_up = $('#female65Up').val();

    var m_total = $('#totalMale').val();
    var fe_total = $('#totalFemale').val();
    var grnd_total = $('#grndTotal').val();

    var m_disable = $('#disableMale').val();
    var fe_disable = $('#disableFemale').val();
        

    // first binding data as xml string
    xml_data += '<row>';

    xml_data += '<MaleUnder5>' + m_under_5 + '</MaleUnder5>';
    xml_data += '<Male5to14>' + m_5_14 + '</Male5to14>';
    xml_data += '<Male15to19>' + m_15_19 + '</Male15to19>';
    xml_data += '<Male20to49>' + m_20_49 + '</Male20to49>';
    xml_data += '<Male50to65>' + m_50_65 + '</Male50to65>';
    xml_data += '<Male65Up>' + m_65_up + '</Male65Up>';

    xml_data += '<FemaleUnder5>' + fe_under_5 + '</FemaleUnder5>';
    xml_data += '<Female5to14>' + fe_5_14 + '</Female5to14>';
    xml_data += '<Female15to19>' + fe_15_19 + '</Female15to19>';
    xml_data += '<Female20to49>' + fe_20_49 + '</Female20to49>';
    xml_data += '<Female50to65>' + fe_50_65 + '</Female50to65>';
    xml_data += '<Female65Up>' + fe_65_up + '</Female65Up>';

    xml_data += '<Totalmale>' + m_total + '</Totalmale>';
    xml_data += '<TotalFemale>' + fe_total + '</TotalFemale>';
    xml_data += '<TotalPopulation>' + grnd_total + '</TotalPopulation>';

    xml_data += '<DisbaleMale>' + m_disable + '</DisbaleMale>';
    xml_data += '<DisabledFemale>' + fe_disable + '</DisabledFemale>';

    xml_data += '<UpdateBy>' + update_by + '</UpdateBy>';

    xml_data += '</row>';
        
    
    console.log(rowId, xml_data);

    $.ajax({
        url: "/update_population_details",
        type: "POST",
        data: { '_token' : token, 'row_id' : rowId, 'xml_data' : xml_data },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            $('#myModal').modal('hide');
            $('#viewPopulation').click();
            alert(data.message);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});


$(document).on('change', '.m_num', function () {

    var row = $(this).val(); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    $('.m_num').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#totalMale').val(total);

    $('.total').each(function () {
        var rowTotal = parseFloat($(this).val());
        if (!isNaN(rowTotal)) {
            grandTotal += rowTotal;
        }
    });

    $('#grndTotal').val(grandTotal);

});

$(document).on('change', '.fe_num', function () {

    var row = $(this).val(); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    $('.fe_num').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#totalFemale').val(total);

    $('.total').each(function () {
        var rowTotal = parseFloat($(this).val());
        if (!isNaN(rowTotal)) {
            grandTotal += rowTotal;
        }
    });

    $('#grndTotal').val(grandTotal);

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



