//clouse alert
$(document).on("click","#close_alert",function (){
    window.location.href = window.location.pathname + "";
})
//Log out
$(document).on("click","#log_out_header-button",function (){
    let formData = new FormData();
    formData.append("logout", "logout");
    $.ajax({
        type: "POST",
        url: '../template/action_req/login.php',
        contentType: false,processData: false,
        data:formData,
        success: function(response) {
            if(response){
                window.location.href = window.location.pathname;
            }
        }
    });
})
//Home
$(document).on("click","#home_header-button",function (){
    window.location.href = "/";
})
//Audit
$(document).on("click","#audit_header-button",function (){
    window.location.href = "audit.php";
})
//Profile
$(document).on("click","#profile_header-button",function (){
    window.location.href = "profile.php";
})