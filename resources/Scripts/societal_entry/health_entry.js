


document.title = 'Health Entry';

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

$('#radioDiv input[type=radio]').change(function(){
    if($(this).val() == '0'){
        $('#alt_income_trainig').prop('disabled', true);
    }
    else {
        $('#alt_income_trainig').prop('disabled', false);
    }

});

$(document).on('click', '#get_entry_form', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();

    if(Watershed_Id && Para_Id)
    { 
        $.ajax({
            url: "/get_health_center_list",
            type: "GET",
            data: { 'center_list' : 'get_data' },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                $('#table_div').removeClass('hide');
                insertDiseasesTable();
                $.each(data.message, function (i, v) {
                    insertTableRow(v.center_name, v.center_id);
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

       

    }

});

$(document).on('click', '#btn_store', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershedId option:selected').val();
    var paraId = $('#para_list option:selected').val();
    var paraName = $('#para_list option:selected').text();
    var xml_data = '';

    xml_data = '<head>';

    $('#voucher_table > tbody > tr').each(function () {

            
        var center_id = $(this).attr('center_id');
        var center_name = $(this).find('td:eq(0)').text(); //$(this).closest('tr').find('td:eq(1)').text();
        
        var people_percentage = $(this).find('#people_percentage').val();
        var distance = $(this).find('#distance').val();
        var service_reason = $(this).find('#service_reason').val();

        // first binding data as xml string
        xml_data += '<row>';

        xml_data += '<WatershedId>' + watershed_id + '</WatershedId>';
        xml_data += '<ParaId>' + paraId + '</ParaId>';
        xml_data += '<paraName>' + paraName + '</paraName>';
        xml_data += '<center_id>' + center_id + '</center_id>';
        xml_data += '<center_name>' + center_name + '</center_name>';

        xml_data += '<people_percentage>' + people_percentage + '</people_percentage>';
        xml_data += '<distance>' + distance + '</distance>';
        xml_data += '<service_reason>' + service_reason + '</service_reason>';

        xml_data += '<CreatedBy>' + created_by + '</CreatedBy>';

        xml_data += '</row>';
        

    });

    xml_data += '</head>';

    // var diseases_id = $('#diseases_table > tbody > tr').find('td:eq(0)').text();
    // var diseases_name = $('#diseases_table > tbody > tr').find('td:eq(1)').text();

    var diarrhoeal = $('#diseases_table > tbody > tr').find("#diarrhoeal").val();
    var heat_stroke = $('#diseases_table > tbody > tr').find('#heat_stroke').val();
    var malaria = $('#diseases_table > tbody > tr').find('#malaria').val();
    var dengue = $('#diseases_table > tbody > tr').find('#dengue').val();

    var typhoid = $('#diseases_table > tbody > tr').find('#typhoid').val();
    var zika_fever = $('#diseases_table > tbody > tr').find('#zika_fever').val();
    var skin_diseases = $('#diseases_table > tbody > tr').find('#skin_diseases').val();
    var others = $('#diseases_table > tbody > tr').find('#others').val();

    var taking_medicine = $('#tendency_of_medicine').val();

    var row = {
        'WatershedId' : watershed_id,
        'ParaId' : paraId,
        'ParaName' : paraName,
        'diarrhoeal' : diarrhoeal,
        'heat_stroke' : heat_stroke,
        'malaria' : malaria,
        'dengue' : dengue,
        'typhoid' : typhoid,
        'zika_fever' : zika_fever,
        'skin_diseases' : skin_diseases,
        'others' : others,
        'taking_medicine' : taking_medicine,
        'CreatedBy' : created_by

    };

    
    console.log(xml_data);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_health_info",
        type: "POST",
        data: { '_token' : token, 'xml_data' : xml_data, 'ranking' : JSON.stringify(row) },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: green;">Congratulation '+created_by+' ! Data store Succesfully.</span><p>'+ data.message+'</p>' );
                $('#voucher_table td input[type=text]').val('');
                $('#voucher_table td input[type=checkbox]').prop('checked', false);
                // alert(data.message);
            }
            else if (data.status == 'EXIST'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html('<span style="color: red;">Sorry '+created_by+' ! Data not possible to store. </span><p>'+ data.message+'</p>' );
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html('<span style="color: red;">'+data.message+'</span>');
            }
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});

function insertTableRow(center_name, center_id) {

    var appendString = '';
    var rowCount = $('#voucher_table > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr center_id="'+center_id+'" >';
    appendString += '<td style="width: 400px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="people_percentage" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="distance" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="service_reason" class="form-control" value="" style="width: 250px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    removeTableRow();
}

function insertDiseasesTable() {

    var appendString = '';
    var rowCount = $('#voucher_table > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">1</td>';
    appendString += '<td style="width: 400px;text-align: left;">Diarrhoeal</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="diarrhoeal" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">2</td>';
    appendString += '<td style="width: 400px;text-align: left;">Heat Stroke</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="heat_stroke" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">3</td>';
    appendString += '<td style="width: 400px;text-align: left;">Malaria</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="malaria" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">4</td>';
    appendString += '<td style="width: 400px;text-align: left;">Dengue </td>';
    appendString += '<td>';
    appendString += '<input type="text" id="dengue" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">5</td>';
    appendString += '<td style="width: 400px;text-align: left;">Typhoid</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="typhoid" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">6</td>';
    appendString += '<td style="width: 400px;text-align: left;">Zika Fever</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="zika_fever" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">7</td>';
    appendString += '<td style="width: 400px;text-align: left;">Skin Diseases</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="skin_diseases" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td style="width: 100px;text-align: center;">8</td>';
    appendString += '<td style="width: 400px;text-align: left;">Others</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="others" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';


    $('#diseases_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    removeTableRow();
}

$(document).on('change', '.m_num', function () {

    var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    row.find('.m_num').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    row.find('#m_total').val(total);

    row.find('.total').each(function () {
        var rowTotal = parseFloat($(this).val());
        if (!isNaN(rowTotal)) {
            grandTotal += rowTotal;
        }
    });

    row.find('#grandTotal').val(grandTotal);

});

$(document).on('change', '.fe_num', function () {

    var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    row.find('.fe_num').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    row.find('#fe_total').val(total);

    row.find('.total').each(function () {
        var rowTotal = parseFloat($(this).val());
        if (!isNaN(rowTotal)) {
            grandTotal += rowTotal;
        }
    });

    row.find('#grandTotal').val(grandTotal);

});

function removeTableRow() {

    $(document).on('click', '.removeHead', function () {

        $(this).parent().parent().remove();
        reOrderTable();

        if ($('#amount').length == '0') {
            $('#total_amount').text((0).toFixed(2));
        }

        // $('#amount').trigger('change');
        var totalAmount = 0;
        $('#voucher_table > tbody > tr').each(function () {

            var tem_total = $(this).find('#amount').val();

            if (tem_total == undefined || tem_total == null || tem_total == '') tem_total = 0;

            totalAmount += parseFloat(tem_total);

        });

        // console.log("888..", totalAmount);

        if (totalAmount == '' || totalAmount == null || totalAmount == undefined)
            $('#total_amount').text('0.00');
        else
            $('#total_amount').text(totalAmount.toFixed(2));

    });
}

function reOrderTable() {
    var sl = 1;
    $('#voucher_table > tbody > tr').each(function () {
        $(this).find('.sl').html(sl);
        sl++;
    });
    counter = sl - 1;
}

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

// Function to convert XML to JSON
function xmlToJson(xml) {
  try {
    var obj = {};
    if (xml.children.length > 0) {
      for (var i = 0; i < xml.children.length; i++) {
        var item = xml.children.item(i);
        var nodeName = item.nodeName;

        if (typeof (obj[nodeName]) == "undefined") {
          obj[nodeName] = xml2json(item);
        } else {
          if (typeof (obj[nodeName].push) == "undefined") {
            var old = obj[nodeName];

            obj[nodeName] = [];
            obj[nodeName].push(old);
          }
          obj[nodeName].push(xml2json(item));
        }
      }
    } else {
      obj = xml.textContent;
    }
    return obj;
  } catch (e) {
      console.log(e.message);
  }
}


