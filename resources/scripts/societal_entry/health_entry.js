


document.title = 'Health Entry';

$(document).ready(function () {

    console.log("hello talha.."); 

    // $('#para_list').prop('disabled', true);

    $.ajax({
        url: "/get_health_center_list",
        type: "GET",
        data: { 'center_list' : 'get_data' },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            $('#table_div').removeClass('hide');
            $.each(data.message, function (i, v) {
                insertTableRow(v.center_name, v.center_id);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    myJson = {
        '001' : 'Diarrhoeal',
        '002' : 'Malaria',
        '003' : 'Dengue',
        '004' : 'Typhoid',
        '005' : 'Zika Fever',
        '006' : 'Skin Diseases',
        '007' : 'Heat Stroke',
        '008' : 'Mental diseases',
        '009' : 'Others',
    };
    $.each(myJson, function(key, value) {
        insertDiseasesTable(value);
    });


});

$('#radioDiv input[type=radio]').change(function(){
    if($(this).val() == '0'){
        $('#alt_income_trainig').prop('disabled', true);
    }
    else {
        $('#alt_income_trainig').prop('disabled', false);
    }

});

function insertTableRow(center_name, center_id) {

    var appendString = '';
    var rowCount = $('#voucher_table > tbody > tr').length;
    rowCount++;

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td style="width: 400px;text-align: left;">'+center_name+'</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="people_percentage" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="distance" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="service_reason" class="form-control" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
    removeTableRow();
    // $("#voucher_table tr:last").scrollintoview();
}

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

function insertDiseasesTable(name) {

    var appendString = '';
    var rowCount = $('#diseases_table > tbody > tr').length;
    rowCount++;

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';

    appendString += '<td style="width: 300px;text-align: left;">' + name + '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="sand" name="sand" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="slit" name="slit" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="clay" name="clay" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="clay" name="clay" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="clay" name="clay" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    //appendString += '<td style="text-align: center;">';
    //appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>';
    //appendString += '</td>';
    
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


