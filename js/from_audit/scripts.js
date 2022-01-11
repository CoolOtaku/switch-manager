$(document).on("click",".Delete_Log",function (){
    Swal.fire({
        title: 'Delete the audit',
        text: "You really want to delete this file ?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            var file = $(this).attr('data-file');

            let formData = new FormData();
            formData.append("deletefile", file);
            $.ajax({
                type: "POST",
                url: '../template/action_req/delete_log.php',
                contentType: false,processData: false,
                data:formData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Delete file',
                        text: 'Logs is deleted!',
                    }).then((result) => {
                        window.location.href = window.location.pathname;
                    })
                }
            });
        }
    })
    
})