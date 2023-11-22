


document.title = 'VCF basic info';

$(document).ready(function () {

    console.log("hello talha.."); 

    $('#watershedId').select2();
    $('#para_list').select2();
    $('#community').select2();
  
    $('.select2').css({'border': '2px solid #898AEE', 'border-radius': '5px'});

    $('#para_list').prop('disabled', true);

    $('.date').datepicker({ dateFormat: "yy-mm-dd" });

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

$('#accessilibity').change(function() {
    var selectedText = $('#accessilibity option:selected').text();
    $('#accessilibity_name').val(selectedText);
});

$('#overall_status').change(function() {
    var selectedText2 = $('#overall_status option:selected').text();
    $('#overall_status_name').val(selectedText2);
});

$(document).on('click', '#btn_store', function (event) {

    // var token = $("meta[name='csrf-token']").attr("content");
    // var created_by = $('#userName').val();

    event.preventDefault();
    var token = $("meta[name='csrf-token']").attr("content");
    var form = $('#store_vcf_basic')[0];
    var formdata = new FormData(form);
    formdata.append( "_token", token);
    console.log(formdata);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');

    $.ajax({
        url: "/store_basic_info_vcf_boundary",
        type: "POST",
        enctype: 'multipart/form-data',
        dataType: 'json',
        data: formdata,
        processData: false,  // Important when file upload!
        contentType: false,
        cache: false,
        success: function (data) {
            // console.log(data);
            if(data.status == 'SUCCESS'){
                $('#myModal').modal({backdrop : 'static', keyboard : false});
                $('#success_msg').html(data.message);
                $('#success_msg').html('<span style="color: green;">SUCCESS !! <p>'+ data.message+'</p></span>' );
                // initial all value after success
                $('.initialval').val('');
                $('#accessilibity').val('').change();
                $('#overall_status').val('').change();
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



