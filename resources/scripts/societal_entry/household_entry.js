


// document.title = 'Entry Household';

$(document).ready(function () {

    console.log("hello talha.."); 

    // $('#para_list').prop('disabled', true);

   

    

});

$(document).on('click', '#entryPopulation', function () {

    var Watershed_Id = $('#watershedId option:selected').val();
    var Para_Id = $('#para_list option:selected').val();

    if(Watershed_Id && Para_Id)
    {
        $('#table_div').removeClass('hide');
    }

});

$(document).on('click', '#btn_household_entry', function () {

    var created_by = $('#userName').val();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var para_id = $('#para_id').val();
    var para_name = $('#para_name').val();
    var xml_data = '';

    xml_data = '<head>';

    $('#voucher_table > tbody > tr').each(function () {

        var rowCheckbox = $(this).find("#check").prop("checked");

        if (rowCheckbox == true)
        {
            var tr_comnty_id = $(this).attr('comnty_id');
            var tr_comnty_name = $(this).find('td:eq(1)').text(); 
            
            var jhupri_type = $(this).find('#jhupri_type').val();
            var kacha_type = $(this).find('#kacha_type').val();
            var semi_pacca = $(this).find('#semi_pacca').val();
            var pacca_type = $(this).find('#pacca_type').val();
            var numOfHouse = $(this).find('#numOfHouse').val();

            // automation set value 0 if any field leave empty or null 
            if(jhupri_type == '' || jhupri_type == null || jhupri_type == undefined) jhupri_type = 0;
            if(kacha_type == '' || kacha_type == null || kacha_type == undefined) kacha_type = 0;
            if(semi_pacca == '' || semi_pacca == null || semi_pacca == undefined) semi_pacca = 0;
            if(pacca_type == '' || pacca_type == null || pacca_type == undefined) pacca_type = 0;

            // first binding data as xml string
            xml_data += '<row>';

            xml_data += '<WatershedId>' + watershed_id + '</WatershedId>';
            xml_data += '<watershed_name>' + watershed_name + '</watershed_name>';
            xml_data += '<para_id>' + para_id + '</para_id>';
            xml_data += '<para_name>' + para_name + '</para_name>';

            xml_data += '<CommunityId>' + tr_comnty_id + '</CommunityId>';
            xml_data += '<CommunityName>' + tr_comnty_name + '</CommunityName>';
            xml_data += '<JhupriType>' + jhupri_type + '</JhupriType>';
            xml_data += '<KachaType>' + kacha_type + '</KachaType>';
            xml_data += '<SemiPaccaType>' + semi_pacca + '</SemiPaccaType>';
            xml_data += '<PaccaType>' + pacca_type + '</PaccaType>';
            xml_data += '<TotalHouse>' + numOfHouse + '</TotalHouse>';

            xml_data += '<CreatedBy>' + created_by + '</CreatedBy>';

            xml_data += '</row>';
        }

    });

    xml_data += '</head>';

    
    console.log(xml_data);

    // clear model message value for every ajax call provide single accurate message
    $('#success_msg').html('');
    $('#error_msg').html('');

    $.ajax({
        url: "/entry_household_info",
        type: "POST",
        data: { '_token' : token, 'xml_data' : xml_data },
        dataType: "JSON",
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#voucher_table td input[type=text]').val('');
                $('#voucher_table td input[type=checkbox]').prop('checked', false);
                // alert(data.message);
            }
            else{
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#error_msg').html(data.message);
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
    appendString += '<td comnty_name="' + comntyName + '" style="width: 300px;text-align: left;">' + comntyName + '</td>';

    appendString += '<td>';
    appendString += '<input type="checkbox" class="checkbox" id="check" name="check" value="1" style="width: 100px;text-align: center;" >';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="jhupri_type" class="form-control count" name="jhupri_type" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="kacha_type" class="form-control count" name="kacha_type" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="semi_pacca" class="form-control count" name="semi_pacca" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="pacca_type" class="form-control count" name="pacca_type" value="" style="width: 200px;text-align: center;" placeholder="0">';
    appendString += '</td>';

    appendString += '<td>';
    appendString += '<input type="text" id="numOfHouse" class="form-control " name="numOfHouse" value="" style="width: 200px;text-align: center;" placeholder="0" disabled>';
    appendString += '</td>';


    //appendString += '<td style="text-align: center;">';
    //appendString += '<button type="button" class="btn btn-xs btn-danger btn-info removeHead"><i class="fa fa-remove"></i></button>';
    //appendString += '</td>';

    appendString += '</tr>';


    $('#voucher_table > tbody:last-child').append(appendString);
    // $("#voucher_table tr:last").scrollintoview();
    removeTableRow();
}

$(document).on('change', '.count', function () {

    var row = $(this).closest('tr'); 
    var total = 0;
    var grandTotal = 0;

    // current row and calculate the total
    row.find('.count').each(function () {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });

    row.find('#numOfHouse').val(total);

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


