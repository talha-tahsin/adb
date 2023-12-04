


// document.title = 'Livelihood Entry';

$(document).ready(function () {

    console.log("hello talha.."); 

    // $('#watershedId').select2();
    // $('#para_list').select2();
    // $('#community').select2();
  
    // $('.select2').css({'border': '2px solid #898AEE', 'border-radius': '5px'});

    // $('#para_list').prop('disabled', true);

   

});

$(document).on('click', '#get_entry_form', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();
    var Community_Id = $('#community option:selected').val();

    if(Para_Id == '' || Para_Id == null || Para_Id == undefined)
    {
        alert("Please Select Para...");
    }
    else if(Community_Id == '' || Community_Id == null || Community_Id == undefined)
    {
        alert("Please Select Community...");
    }
    else
    { 
        $.ajax({
            url: "/check_livelihood_duplicate",
            type: "GET",
            data: { 'watershed_id' : Watershed_Id, 'para_id' : Para_Id, 'community_id' : Community_Id},
            dataType: "JSON",
            cache: false,
            success: function (data) {
                // console.log(data);
                if(data.status == 'SUCCESS'){
                    $('#table_div').removeClass('hide');
                }
                else{
                    $('#myModal').modal({backdrop : 'static', keyboard : false});
                    $('#error_msg').html('<span style="color: red">ERROR!! <p>'+data.message+'</p></span>');
                }  
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

});

$(document).on('click', '#btn_store', function () {

    var token = $("meta[name='csrf-token']").attr("content");
    var created_by = $('#userName').val();

    watershed_id = $('#watershedId option:selected').val();
    para_id = $('#para_list option:selected').val();
    para_name = $('#para_list option:selected').text();
    community_id = $('#community option:selected').val();
    community_name = $('#community option:selected').text();

    jhum_male = $('#jhum_male').val();
    jhum_female = $('#jhum_female').val();
    plain_land_male = $('#plain_land_male').val();
    plain_land_female = $('#plain_land_female').val();
    orchard_male = $('#orchard_male').val();
    orchard_female = $('#orchard_female').val();
    fuel_wood_male = $('#fuel_wood_male').val();
    fuel_wood_female = $('#fuel_wood_female').val();

    wage_labour_male = $('#wage_labour_male').val();
    wage_labour_female = $('#wage_labour_female').val();
    poultry_male = $('#poultry_male').val();
    poultry_female = $('#poultry_female').val();
    livestock_male = $('#livestock_male').val();
    livestock_female = $('#livestock_female').val();
    aquaculture_male = $('#aquaculture_male').val();
    aquaculture_female = $('#aquaculture_female').val();

    service_male = $('#service_male').val();
    service_female = $('#service_female').val();
    business_male = $('#business_male').val();
    business_female = $('#business_female').val();
    handicraft_male = $('#handicraft_male').val();
    handicraft_female = $('#handicraft_female').val();
    other_male = $('#other_male').val();
    other_female = $('#other_female').val();

    jsonObj = {
        'watershed_id' : watershed_id,
        'para_id' : para_id,
        'para_name' : para_name,
        'community_id' : community_id,
        'community_name' : community_name,
        'jhum_male' : jhum_male,
        'jhum_female' : jhum_female,
        'plain_land_male' : plain_land_male,
        'plain_land_female' : plain_land_female,
        'orchard_male' : orchard_male,
        'orchard_female' : orchard_female,
        'fuel_wood_male' : fuel_wood_male,
        'fuel_wood_female' : fuel_wood_female,
        'wage_labour_male' : wage_labour_male,
        'wage_labour_female' : wage_labour_female,
        'poultry_male' : poultry_male,
        'poultry_female' : poultry_female,
        'livestock_male' : livestock_male,
        'livestock_female' : livestock_female,
        'aquaculture_male' : aquaculture_male,
        'aquaculture_female' : aquaculture_female,
        'service_male' : service_male,
        'service_female' : service_female,
        'business_male' : business_male,
        'business_female' : business_female,
        'handicraft_male' : handicraft_male,
        'handicraft_female' : handicraft_female,
        'other_male' : other_male,
        'other_female' : other_female,
        'created_by' : created_by,

    };
    
    console.log(jsonObj);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_livelihood_info",
        type: "POST",
        data: { '_token' : token, 'json_data' : JSON.stringify(jsonObj) },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                // alert(data.message);
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html('<span style="color: red">ERROR!! <p>'+data.message+'</p></span>');
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
    appendString += '<td comnty_name="' + comntyName + '" style="width: 100px;text-align: left;">' + comntyName + '</td>';

    appendString += '<td>';
    appendString += '<input type="checkbox" class="checkbox" id="check" name="check" value="1" style="text-align: center;" >';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="jhum" class="form-control" name="jhum" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="plain_land" class="form-control" name="plain_land" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="orchard" class="form-control" name="orchard" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fuel_wood" class="form-control" name="fuel_wood" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="wage_labour" class="form-control" name="wage_labour" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="poultry" class="form-control" name="poultry" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="livestock" class="form-control" name="livestock" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="aquaculture" class="form-control" name="aquaculture" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="service_holder" class="form-control" name="service_holder" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="business" class="form-control" name="business" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="handicraft" class="form-control" name="handicraft" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="others" class="form-control" name="others" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="jhum" class="form-control" name="jhum" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="plain_land" class="form-control" name="plain_land" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="orchard" class="form-control" name="orchard" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="fuel_wood" class="form-control" name="fuel_wood" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="wage_labour" class="form-control" name="wage_labour" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="poultry" class="form-control" name="poultry" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="livestock" class="form-control" name="livestock" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="aquaculture" class="form-control" name="aquaculture" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="service_holder" class="form-control" name="service_holder" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="business" class="form-control" name="business" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="handicraft" class="form-control" name="handicraft" value="" style="width: 40px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="others" class="form-control" name="others" value="" style="width: 40px;text-align: center;" placeholder="0">';
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


