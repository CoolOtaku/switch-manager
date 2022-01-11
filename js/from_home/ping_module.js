ping();
function ping(){
    $(".load").each(function() {
        let formData = new FormData();
        var ip = $(this).attr('data-ip');
        var id = $(this).attr('data-id');
        formData.append('ip',ip);
        $.ajax({
            type: "POST",
            url: "../template/modules/ping_module.php",
            contentType: false,processData: false,
            data: formData,
            success: function(response) {
                if(response != 'online'){
                    $('#ds_'+id).attr('class', 'offline');
                }else{
                    $('#ds_'+id).attr('class', 'online');
                }
            }
        });
    });
}