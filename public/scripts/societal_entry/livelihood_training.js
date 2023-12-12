


document.title = 'Education Part 2 Entry';

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

// $('#radioDiv input[type=radio]').change(function(){
//     if($(this).val() == '0'){
//         $('#alt_income_trainig').prop('disabled', true);
//     }
//     else {
//         $('#alt_income_trainig').prop('disabled', false);
//     }

// });

$(document).on('click', '#get_communities', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();

    if(Watershed_Id && Para_Id)
    { 
        $.ajax({
            url: "/get_training_list",
            type: "GET",
            data: { 'training_list' : 'get_data' },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);
                $('#table_div').removeClass('hide');
                $.each(data.message, function (i, v) {
                    insertTableRow(v.training_name, v.training_id);
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

});

$('#radioDiv input[type=radio]').change(function(){
    if($(this).val() == '0'){
        $('#alt_income_training').prop('disabled', true);
    }
    else {
        $('#alt_income_training').prop('disabled', false);
    }

});


$(document).on('click', '#btn_store', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershedId option:selected').val();
    var paraId = $('#para_list option:selected').val();
    var xml_data = '';
    var count = 0;

    xml_data = '<head>';

    $('#training_table > tbody > tr').each(function () {

        var rowCheckbox = $(this).find("#check").prop("checked");

        if (rowCheckbox == true)
        {
            
            var tr_training_id = $(this).attr('comnty_id');
            var tr_training_name = $(this).find('td:eq(1)').text(); //$(this).closest('tr').find('td:eq(1)').text();
           
            var training_receive = $(this).find('#training_receive').val();
            var is_useful = $(this).find('#is_useful option:selected').val();
            var is_future = $(this).find('#is_future option:selected').val();
            var women_percentage = $(this).find('#women_percentage').val();

            var govt = $(this).find('#govt option:selected').val();
            var ngo = $(this).find('#ngo option:selected').val();
            var developer = $(this).find('#developer option:selected').val();

            if(training_receive == '' || is_useful == '' || is_future == '' || women_percentage == '')
            {
                alert("Please fill up all the field...");
                count++;
            }
            else if (govt == '' || ngo == '' || developer == '')
            {
                alert("Please fill up all the field...");
                count++;
            }
            else
            {
                count = 0;
                // first binding data as xml string
                xml_data += '<row>';

                xml_data += '<WatershedId>' + watershed_id + '</WatershedId>';
                xml_data += '<ParaId>' + paraId + '</ParaId>';
                xml_data += '<training_id>' + tr_training_id + '</training_id>';
                xml_data += '<training_name>' + tr_training_name + '</training_name>';

                xml_data += '<training_receive>' + training_receive + '</training_receive>';
                xml_data += '<is_useful>' + is_useful + '</is_useful>';
                xml_data += '<is_future>' + is_future + '</is_future>';
                xml_data += '<women_percentage>' + women_percentage + '</women_percentage>';

                xml_data += '<govt>' + govt + '</govt>';
                xml_data += '<ngo>' + ngo + '</ngo>';
                xml_data += '<developer>' + developer + '</developer>';

                xml_data += '<CreatedBy>' + created_by + '</CreatedBy>';

                xml_data += '</row>';
            }

            
        }

    });

    xml_data += '</head>';

    
    console.log(xml_data);

    if(count == 0)
    {
        // clear model message value for every ajax call provide single accurate message
        $('#success_msg').html('');
        $('#error_msg').html('');

        $.ajax({
            url: "/store_education_part2_info",
            type: "POST",
            data: { '_token' : token, 'xml_data' : xml_data },
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
    }
     


});

function insertTableRow(comntyName, comuntyId) {

    var appendString = '';
    var rowCount = $('#training_table > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr comnty_id="' + comuntyId + '">';
    appendString += '<td class="sl" style="width: 20px;text-align: center;">' + rowCount + '</td>';
    appendString += '<td comnty_name="' + comntyName + '" style="width: 400px;text-align: left;">' + comntyName + '</td>';

    appendString += '<td>';
    appendString += '<input type="checkbox" class="checkbox" id="check" name="check" value="1" style="text-align: center;" >';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="training_receive" class="form-control" value="" style="width: 100px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="is_useful" name="is_useful" class="form-control" value="" style="width: 150px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Yes">Yes</option>';
    appendString += '<option value="No">No</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="is_future" name="is_future" class="form-control" value="" style="width: 150px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Yes">Yes</option>';
    appendString += '<option value="No">No</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="women_percentage" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="govt" name="govt" class="form-control" value="" style="width: 150px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Yes">Yes</option>';
    appendString += '<option value="No">No</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="ngo" name="ngo" class="form-control" value="" style="width: 150px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Yes">Yes</option>';
    appendString += '<option value="No">No</option>';
    appendString += '</select>';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<select type="text" id="developer" name="developer" class="form-control" value="" style="width: 150px;text-align: center;border-radius: 5px;">';
    appendString += '<option value="" selected disabled> Select </option>';
    appendString += '<option value="Yes">Yes</option>';
    appendString += '<option value="No">No</option>';
    appendString += '</select>';
    appendString += '</td>';

    //appendString += '<td style="text-align: center;">';
    //appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>';
    //appendString += '</td>';

    appendString += '</tr>';


    $('#training_table > tbody:last-child').append(appendString);
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


