


document.title = 'Education Part 1 Entry';

$(document).ready(function () {

    console.log("hello talha.."); 

    $('#para_list').prop('disabled', true);

    insertTableRow();

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

// $(document).on('click', '#get_communities', function () {

//     var Watershed_Id = $('#watershedId option:selected').val();
//     var Para_Id = $('#para_list option:selected').val();

//     if(Watershed_Id && Para_Id)
//     { 
//         $.ajax({
//             url: "/CommunityList",
//             type: "GET",
//             data: { 'community_list' : 'get_data' },
//             dataType: "JSON",
//             cache: false,
//             success: function (data) {
//                 // console.log(data);
//                 $('#table_div').removeClass('hide');
//                  $.each(data.message, function (i, v) {
//                     insertTableRow(v.community_name, v.community_id);
//                  });
//             },
//             error: function(xhr, ajaxOptions, thrownError) {
//                 console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//             }
//         });
//     }

// });

$(document).on('click', '#btn_store', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershedId option:selected').val();
    var paraId = $('#para_list option:selected').val();
    var paraName = $('#para_list option:selected').text();
    var xml_data = '';

    if(watershed_id == '' || watershed_id == null || watershed_id == undefined){
        alert("Please Select watershed id");
    }
    else if (paraId == '' || paraId == null || paraId == undefined){
        alert("Please Select para id...");
    }
    else
    {

        var maleReadWrite = $('#voucher_table > tbody > tr').find("#maleReadWrite").val();
        var femaleReadWrite = $('#voucher_table > tbody > tr').find('#femaleReadWrite').val();
        var malePrimary = $('#voucher_table > tbody > tr').find('#malePrimary').val();
        var femalePrimary = $('#voucher_table > tbody > tr').find('#femalePrimary').val();

        var maleSsc = $('#voucher_table > tbody > tr').find('#maleSsc').val();
        var femaleSsc = $('#voucher_table > tbody > tr').find('#femaleSsc').val();
        var maleHsc = $('#voucher_table > tbody > tr').find('#maleHsc').val();
        var femaleHsc = $('#voucher_table > tbody > tr').find('#femaleHsc').val();

        var maleGraduate = $('#voucher_table > tbody > tr').find('#maleGraduate').val();
        var femaleGraduate = $('#voucher_table > tbody > tr').find('#femaleGraduate').val();
        var malePost = $('#voucher_table > tbody > tr').find('#malePost').val();
        var femalePost = $('#voucher_table > tbody > tr').find('#femalePost').val();

        var totalMale = $('#voucher_table > tbody > tr').find('#totalMale').val();
        var totalFemale = $('#voucher_table > tbody > tr').find('#totalFemale').val();



        // first binding data as xml string
        xml_data += '<row>';

        xml_data += '<WatershedId>' + watershed_id + '</WatershedId>';
        xml_data += '<ParaId>' + paraId + '</ParaId>';
        xml_data += '<ParaName>' + paraName + '</ParaName>';

        xml_data += '<maleReadWrite>' + maleReadWrite + '</maleReadWrite>';
        xml_data += '<femaleReadWrite>' + femaleReadWrite + '</femaleReadWrite>';
        xml_data += '<malePrimary>' + malePrimary + '</malePrimary>';
        xml_data += '<femalePrimary>' + femalePrimary + '</femalePrimary>';


        xml_data += '<maleSsc>' + maleSsc + '</maleSsc>';
        xml_data += '<femaleSsc>' + femaleSsc + '</femaleSsc>';
        xml_data += '<maleHsc>' + maleHsc + '</maleHsc>';
        xml_data += '<femaleHsc>' + femaleHsc + '</femaleHsc>';

        xml_data += '<maleGraduate>' + maleGraduate + '</maleGraduate>';
        xml_data += '<femaleGraduate>' + femaleGraduate + '</femaleGraduate>';
        xml_data += '<malePost>' + malePost + '</malePost>';
        xml_data += '<femalePost>' + femalePost + '</femalePost>';

        xml_data += '<totalMale>' + totalMale + '</totalMale>';
        xml_data += '<totalFemale>' + totalFemale + '</totalFemale>';

        xml_data += '<CreatedBy>' + created_by + '</CreatedBy>';

        xml_data += '</row>';

        
        console.log(xml_data);

        // clear model message value for every ajax call provide single accurate message
        $('#success_msg').html('');
        $('#error_msg').html('');

        $.ajax({
            url: "/store_education_part1_info",
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

function insertTableRow() {

    var appendString = '';
    var rowCount = $('#voucher_table > tbody > tr').length;
    rowCount++;

    // console.log(accountName);

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 50px;text-align: center;">1</td>';
    appendString += '<td comnty_name="" style="width: 400px;text-align: left;">Literate (can read & write) </td>';
    appendString += '<td>';
    appendString += '<input type="text" id="maleReadWrite" class="form-control maleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="femaleReadWrite" class="form-control femaleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 50px;text-align: center;">2</td>';
    appendString += '<td comnty_name="" style="width: 400px;text-align: left;">Primary </td>';
    appendString += '<td>';
    appendString += '<input type="text" id="malePrimary" class="form-control maleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="femalePrimary" class="form-control femaleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 50px;text-align: center;">3</td>';
    appendString += '<td comnty_name="" style="width: 400px;text-align: left;">Secondary (SSC) </td>';
    appendString += '<td>';
    appendString += '<input type="text" id="maleSsc" class="form-control maleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="femaleSsc" class="form-control femaleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 50px;text-align: center;">4</td>';
    appendString += '<td comnty_name="" style="width: 400px;text-align: left;">Higher secondary (HSC)</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="maleHsc" class="form-control maleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="femaleHsc" class="form-control femaleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 50px;text-align: center;">5</td>';
    appendString += '<td comnty_name="" style="width: 400px;text-align: left;">Graduate </td>';
    appendString += '<td>';
    appendString += '<input type="text" id="maleGraduate" class="form-control maleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="femaleGraduate" class="form-control femaleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 50px;text-align: center;">6</td>';
    appendString += '<td comnty_name="" style="width: 400px;text-align: left;">Postgraduate </td>';
    appendString += '<td>';
    appendString += '<input type="text" id="malePost" class="form-control maleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="femalePost" class="form-control femaleTot" value="" style="width: 150px;text-align: center;" placeholder="0">';
    appendString += '</td>';
    appendString += '</tr>';

    appendString += '<tr>';
    appendString += '<td class="sl" style="width: 50px;text-align: center;">6</td>';
    appendString += '<td comnty_name="" style="width: 400px;text-align: left;">Total </td>';
    appendString += '<td>';
    appendString += '<input type="text" id="totalMale" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0" disabled>';
    appendString += '</td>';
    appendString += '<td>';
    appendString += '<input type="text" id="totalFemale" class="form-control" value="" style="width: 150px;text-align: center;" placeholder="0" disabled>';
    appendString += '</td>';
    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    removeTableRow();
}

$(document).on('change', '.maleTot', function () {

    // var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    $('.maleTot').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#totalMale').val(total);

    // row.find('.total').each(function () {
    //     var rowTotal = parseFloat($(this).val());
    //     if (!isNaN(rowTotal)) {
    //         grandTotal += rowTotal;
    //     }
    // });

    // row.find('#grandTotal').val(grandTotal);

});

$(document).on('change', '.femaleTot', function () {

    // var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    $('.femaleTot').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#totalFemale').val(total);

    // row.find('.total').each(function () {
    //     var rowTotal = parseFloat($(this).val());
    //     if (!isNaN(rowTotal)) {
    //         grandTotal += rowTotal;
    //     }
    // });

    // row.find('#grandTotal').val(grandTotal);

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


