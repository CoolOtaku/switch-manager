// Login btn
$(document).on("click","#login",function (){
    var action = $('#action').val();
    if(action == "login"){
        var login = $('#login_text').val();
        var password = $('#password_text').val();
        
        let formData = new FormData();
        formData.append("login", login);
        formData.append("password", password);
        $.ajax({
            type: "POST",
            url: '../template/action_req/login.php',
            contentType: false,processData: false,
            data:formData,
            success: function(response) {
                if(response == 'isLogin'){
                    window.location.href = "/";
                }else if(response == '2fa'){
                    $('#login-form').empty();
                    $('#login-form').append("<div class=\"form-group\"><label class=\"form-control-label\">Google Authenticator code</label><input type=\"text\" class=\"form-control\" name=\"2fa_code\" id=\"2fa_code\"></div>");
                    $('#action').val("2fa");
                }else{
                    window.location.href = window.location.pathname + "?response="+encodeURI(response);
                }
            }
        });
    } else if(action == "2fa"){
        var code = $('#2fa_code').val();
        
        let formData = new FormData();
        formData.append("code", code);
        $.ajax({
            type: "POST",
            url: '../template/action_req/login.php',
            contentType: false,processData: false,
            data:formData,
            success: function(response) {
                if(response == 'isLogin'){
                    window.location.href = "/";
                }else{
                    window.location.href = window.location.pathname + "?response="+encodeURI(response);
                }
            }
        });
    }
})
//clouse alert
$(document).on("click","#close_alert",function (){
    window.location.href = window.location.pathname + "";
})