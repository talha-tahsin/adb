


document.title = 'Land Entry';

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

$(document).on('click', '#entryPopulation', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();

    if(Watershed_Id && Para_Id)
    {
        $('#table_div').removeClass('hide');
    }

});

$(document).on('click', '#save_CommunityInfo', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershedId option:selected').val();
    var paraId = $('#para_list option:selected').val();
    var xml_data = '';

    xml_data = '<head>';

    $('#voucher_table > tbody > tr').each(function () {

        var rowCheckbox = $(this).find("#check").prop("checked");

        if (rowCheckbox == true)
        {
            var tr_comnty_id = $(this).attr('comnty_id');
            var tr_comnty_name = $(this).find('td:eq(1)').text(); //$(this).closest('tr').find('td:eq(1)').text();
            var m_under_5 = $(this).find('#m_under_5').val();
            var m_5_14 = $(this).find('#m_5_14').val();
            var m_15_19 = $(this).find('#m_15_19').val();
            var m_20_49 = $(this).find('#m_20_49').val();
            var m_50_65 = $(this).find('#m_50_65').val();
            var m_65_up = $(this).find('#m_65_up').val();

            var fe_under_5 = $(this).find('#fe_under_5').val();
            var fe_5_14 = $(this).find('#fe_5_14').val();
            var fe_15_19 = $(this).find('#fe_15_19').val();
            var fe_20_49 = $(this).find('#fe_20_49').val();
            var fe_50_65 = $(this).find('#fe_50_65').val();
            var fe_65_up = $(this).find('#fe_65_up').val();

            var m_total = $(this).find('#m_total').val();
            var fe_total = $(this).find('#fe_total').val();
            var grnd_total = $(this).find('#grandTotal').val();

            var m_disable = $(this).find('#m_disable').val();
            var fe_disable = $(this).find('#fe_disable').val();


            // first binding data as xml string
            xml_data += '<row>';

            xml_data += '<WatershedId>' + watershed_id + '</WatershedId>';
            xml_data += '<ParaId>' + paraId + '</ParaId>';

            xml_data += '<CommunityId>' + tr_comnty_id + '</CommunityId>';
            xml_data += '<CommunityName>' + tr_comnty_name + '</CommunityName>';
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

            xml_data += '<CreatedBy>' + created_by + '</CreatedBy>';

            xml_data += '</row>';
        }

    });

    xml_data += '</head>';

    
    console.log(xml_data);

    $.ajax({
        url: "/insert_populatioin_entry",
        type: "POST",
        data: { '_token' : token, 'xml_data' : xml_data },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status){
                $('#voucher_table td input[type=text]').val('');
                $('#voucher_table td input[type=checkbox]').prop('checked', false);
                alert(data.message);
            }
            else{
                alert(data.message);
            }
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });



});

function insertTableRow(comntyName, comuntyId) {

    var appendString = '';
    var rowCount = $('#voucher_table > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr comnty_id="' + comuntyId + '">';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    //appendString += '<td>'+ofcName+'</td>';
    appendString += '<td comnty_name="' + comntyName + '" style="width: 60px;text-align: left;">' + comntyName + '</td>';

    appendString += '<td>';
    appendString += '<input type="checkbox" class="checkbox" id="check" name="check" value="1" style="text-align: center;" >';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_under_5" class="form-control m_num" name="m_under_5" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_5_14" class="form-control m_num" name="m_5_14" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_15_19" class="form-control m_num" name="m_15_19" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_20_49" class="form-control m_num" name="m_20_49" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_50_65" class="form-control m_num" name="m_50_65" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_65_up" class="form-control m_num" name="m_65_up" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_under_5" class="form-control fe_num" name="fe_under_5" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_5_14" class="form-control fe_num" name="fe_5_14" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_15_19" class="form-control fe_num" name="fe_15_19" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_20_49" class="form-control fe_num" name="fe_20_49" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_50_65" class="form-control fe_num" name="fe_50_65" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_65_up" class="form-control fe_num" name="fe_65_up" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_total" class="form-control total" name="m_total" value="" style="width: 50px;text-align: center;" disabled>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_total" class="form-control total" name="fe_total" value="" style="width: 50px;text-align: center;" disabled>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="grandTotal" class="form-control " name="grandTotal" value="" style="width: 50px;text-align: center;" disabled>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="m_disable" class="form-control " name="m_disable" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fe_disable" class="form-control " name="fe_disable" value="" style="width: 50px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    //appendString += '<td style="text-align: center;">';
    //appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>';
    //appendString += '</td>';

    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
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


