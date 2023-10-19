

    document.title = 'Population';

    $(document).ready(function () {
    
        console.log("hello talha..");
    
        //var AjaxUrl = '@Url.Action("getCommunityList", "Baseline")';
    
        //$.ajax({
        //    type: "GET",
        //    url: AjaxUrl,
        //    data: { "get_data": "getCommunity" },
        //    contentType: "application/json; charset=utf-8",
        //    dataType: "json",
        //    success: function (data, status, jqXHR) {
        //        console.log(data);
        //        if (data.length > 0) {
        //            var rows = '';
    
        //            $.each(data, function (i, item) {
        //                insertTableRow(item.CommunityName, item.CommunityId);
        //            });
    
        //        }
        //    }, error: function (jqXhr, exception) {
        //        var errorMsg = AjaxErrorHandle(jqXhr, exception);
        //        Notification('Error', errorMsg, 'danger');
        //    }
        //});
    
        var data = {
            "info": {
                "item": [
                    {
                        "comminityName": "Chakma",
                        "communityId": "1"
                    },
                    {
                        "comminityName": "Marma",
                        "communityId": "2"
                    },
                    {
                        "comminityName": "Tripura",
                        "communityId": "3"
                    },
                    {
                        "comminityName": "Mro",
                        "communityId": "4"
                    },
                    {
                        "comminityName": "Tanchangya",
                        "communityId": "5"
                    },
                    {
                        "comminityName": "Bawm",
                        "communityId": "6"
                    },
                    {
                        "comminityName": "Chak",
                        "communityId": "7"
                    },
                    {
                        "comminityName": "Khyang",
                        "communityId": "8"
                    },
                ]
            }
        }
    
        $.each(data.info.item, function (i, v) {
            insertTableRow(v.comminityName, v.communityId);
        });
    
    
    });
    
    $(document).on('click', '#btn_addCommunity', function () {
    
        var community_id = $('#community_id option:selected').val();
        var community_name = $('#community_id option:selected').text();
    
        if (community_id == '' || community_id == null || community_id == undefined) {
            alert("Please Select Community First...");
    
        }
        else
        {
            var valid = true;
    
            $('#voucher_table > tbody > tr').each(function () {
    
                var tr_comntyId = $(this).attr('comnty_id');
                // var row_count = $(this).closest('tr').find('td:eq(0)').text();
    
                if (tr_comntyId == community_id) {
                    alert("Sorry! you have already take this community...");
                    valid = false;
                }
    
            });
    
            if (valid)
            {
                $('#table_row').removeClass('hide');
                insertTableRow(community_name, community_id);
            }
            
            
        }
    
    });
    
    
    $(document).on('click', '#save_CommunityInfo', function () {
    
        var createBy = "talha";
        var createDate = "";
        var v_data = '';
    
        v_data = '<head>';
    
        $('#voucher_table > tbody > tr').each(function () {
    
            var rowCheckbox = $(this).find("#check").prop("checked");
    
            if (rowCheckbox == true)
            {
                var tr_comnty_id = $(this).attr('comnty_id');
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
                v_data += '<row>';
    
                v_data += '<CommunityId>' + tr_comnty_id + '</CommunityId>';
                v_data += '<MaleUnder5>' + m_under_5 + '</MaleUnder5>';
                v_data += '<Male5to14>' + m_5_14 + '</Male5to14>';
                v_data += '<Male15to19>' + m_15_19 + '</Male15to19>';
                v_data += '<Male20to49>' + m_20_49 + '</Male20to49>';
                v_data += '<Male50to65>' + m_50_65 + '</Male50to65>';
                v_data += '<Male65Up>' + m_65_up + '</Male65Up>';
    
                v_data += '<FemaleUnder5>' + fe_under_5 + '</FemaleUnder5>';
                v_data += '<Female5to14>' + fe_5_14 + '</Female5to14>';
                v_data += '<Female15to19>' + fe_15_19 + '</Female15to19>';
                v_data += '<Female20to49>' + fe_20_49 + '</Female20to49>';
                v_data += '<Female50to65>' + fe_50_65 + '</Female50to65>';
                v_data += '<Female65Up>' + fe_65_up + '</Female65Up>';
    
                v_data += '<Totalmale>' + m_total + '</Totalmale>';
                v_data += '<TotalFemale>' + fe_total + '</TotalFemale>';
                v_data += '<TotalPopulation>' + grnd_total + '</TotalPopulation>';
    
                v_data += '<DisbaleMale>' + m_disable + '</DisbaleMale>';
                v_data += '<DisabledFemale>' + fe_disable + '</DisabledFemale>';
    
                v_data += '</row>';
            }
    
        });
    
        v_data += '</head>';
    
        var bind_data = {
            'v_data' : v_data
        }
    
        console.log(v_data);
    
        //const AjaxUrl = '@Url.Action("SavePopulationInfo", "Baseline")'; 
        const AjaxUrl = '/Baseline/SavePopulationInfo';
    
        $.ajax({
            type: "POST",
            url: AjaxUrl,
            data: JSON.stringify({ data : bind_data }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                if (data.status == 'success') {
                    Notification('Success', data.message, 'success');
                }
                else {
                     Notification('Error', data.exception, 'danger');
                }
            }, error: function (jqXhr, exception) {
                var errorMsg = AjaxErrorHandle(jqXhr, exception);
                Notification('Error', errorMsg, 'danger');
            }
         });
    
    
    });
    
    function insertTableRow(comntyName, comuntyId) {
    
        var appendString = '';
        var rowCount = $('#voucher_table > tbody > tr').length;
        rowCount++;
    
        // console.log(accountName);
    
        appendString += '<tr comnty_id="' + comuntyId + '">';
        appendString += '<td class="sl" style="text-align: center;">' + rowCount + '</td>';
        //appendString += '<td>'+ofcName+'</td>';
        appendString += '<td style="width: 100px;text-align: left;">' + comntyName + '</td>';
    
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
        appendString += '<input type="text" id="m_total" class="form-control total" name="m_total" value="" style="width: 70px;text-align: center;" disabled>';
        appendString += '</td>';
    
        appendString += '<td>';
        appendString += '<input type="text" id="fe_total" class="form-control total" name="fe_total" value="" style="width: 80px;text-align: center;" disabled>';
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
    


