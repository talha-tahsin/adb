


document.title = 'VCF basic info';

$(document).ready(function () {

    console.log("hello talha.."); 

    $('#watershedId').select2();
    $('#para_list').select2();
    $('#community').select2();
  
    $('.select2').css({'border': '2px solid #898AEE', 'border-radius': '5px'});

    $('#para_list').prop('disabled', true);

    $('.date').datepicker({ dateFormat: "yy-mm-dd" });

    var userNm = $('#userName').val();

    $.ajax({
        url: "/get_active_watershed",
        type: "GET",
        data: { 'userNm' : userNm },
        dataType: "json",
        cache: false,
        success: function (data) {
            // console.log(data);
            $.each(data.message, function (i, v) {
                $('#watershed_id').val(v.watershed_id);
                $('#watershed_name').val(v.watershed_name);
                $('#dependent_para_id').val(v.para_id);
                $('#vcf_dependent_para').val(v.para_name);
            });
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

});

$(document).on('click', '#btn_store', function (event) {

    event.preventDefault();
    var token = $("meta[name='csrf-token']").attr("content");
    var watershed_id = $('#watershed_id').val();
    var watershed_name = $('#watershed_name').val();
    var dependent_para_name = $('#vcf_dependent_para').val();

    var accessilibity = $('#accessilibity option:selected').text();
    var overall_status = $('#overall_status option:selected').text();
    var forest_type = $('#forest_type option:selected').text();

    var form = $('#store_vcf_basic')[0];
    var formdata = new FormData(form);
    formdata.append( "_token", token);
    formdata.append( "watershed_id", watershed_id);
    formdata.append( "watershed_name", watershed_name);
    formdata.append( "dependent_para_name", dependent_para_name);
    formdata.append( "accessilibity", accessilibity);
    formdata.append( "overall_status", overall_status);
    formdata.append( "forest_type", forest_type);
    console.log(formdata);

     // clear model message value for every ajax call provide single accurate message
     $('#success_msg').html('');
     $('#error_msg').html('');
    //  window.location.href = '/gps-point-of-vcf-boundary';

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
                $('#forest_type').val('').change();

                // $('#btn_close').on('click', function(){
                //     window.location.href = '/gps-point-of-vcf-boundary';
                // });
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



