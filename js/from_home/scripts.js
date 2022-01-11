//Add switch
$(document).on("click","#Btn_Add_Switch",function (){
    $('#Name').val("");
    $('#IP').val("");
    $('#Login').val("");
    $('#Password').val("");
    $('#Image').val("");

    $('#Add_or_edit').val('Add');
    $('#modal_switch_title').text('Add new Switch');
    $('#modal_add_edit_switch').modal('show');
})
//Edit switch
$(document).on("click",".button_edit_general",function (){
    $('#Image').val("");
    $('#Add_or_edit').val('Edit');
    $('#modal_switch_title').text('Edit Switch');
    var id = $(this).attr('data-id');
    $('#Id1').val(id);
    let formData = new FormData();
    formData.append("id", id);
    $.ajax({
        type: "POST",
        url: "../template/action_req/get_data_switch.php",
        contentType: false,processData: false,
        data: formData,
        success: function(response) {
            if(response != "null"){
                var obj = jQuery.parseJSON(response);
                $('#Name').val(obj.name);
                $('#IP').val(obj.ip);
                $('#Login').val(obj.login);
                $('#Password').val(obj.password);
                $('#modal_add_edit_switch').modal('show');
            }else{
                console.log('Error');
            }
        }
    });
})
//module save button
$(document).on("click","#Btn_Save_SWitch",function (){
    let formData = new FormData();

    var Name = $('#Name').val();
    var IP = $('#IP').val();
    var Login = $('#Login').val();
    var Password = $('#Password').val();
    var Image = $('#Image')[0].files[0];

    if (!IP || !Login || !Password){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You have not filled in all the fields !',
        })
        return false;
    }

    formData.append("Name", Name);
    formData.append("IP", IP);
    formData.append("Login", Login);
    formData.append("Password", Password);
    formData.append("file", Image);

    var type = $('#Add_or_edit').val();
    if(type == "Add"){
        $.ajax({
            type: "POST",
            url: "../template/action_req/add_switch.php",
            contentType: false,processData: false,
            data: formData,
            success: function(response) {
                window.location.href = window.location.pathname + "?response="+encodeURI(response);
            }
        });
    }else{
        var id = $('#Id1').val();
        formData.append("id", id);
        $.ajax({
            type: "POST",
            url: "../template/action_req/edit_switch.php",
            contentType: false,processData: false,
            data: formData,
            success: function(response) {
                window.location.href = window.location.pathname + "?response="+encodeURI(response);
            }
        });
    }
})
//delet switch 
$(document).on("click",".button_delet_general",function (){
    var num_s_d = $(this).attr("data-id");
    $('#Id2').val(num_s_d);
    $('#delete_modal').modal('show');
})
$(document).on("click","#Btn_Delete_SWitch",function (){
    let formData = new FormData();
    var id = $('#Id2').val();
    formData.append("id", id);
    $.ajax({
        type: "POST",
        url: '../template/action_req/delete_switch.php',
        contentType: false,processData: false,
        data:formData,
        success: function(response) {
            window.location.href = window.location.pathname + "?response="+encodeURI(response);
        }
    });
})
//Log in Swich Admin
$(document).on("click",".Btn-log-in",function (){
    var id = $(this).attr('data-id');
    var status = $('#ds_'+id).attr('class');
    if(status == 'online'){
        var ip = $(this).attr('data-ip');
        $('#admin_panel').attr('src', 'http://'+ip+"/?random='"+(new Date()).getTime() + Math.floor(Math.random() * 1000000));
        var login = $(this).attr('data-login');
        var pass = $(this).attr('data-pass');
        $('#LoginCopyInput').text(login);
        $('#PasswordCopyInput').text(atob(pass));
    }else{
        $('#admin_panel').attr('src', 'error_load.html?random='+(new Date()).getTime() + Math.floor(Math.random() * 1000000));
    }
    var myOffcanvas = $('#switch_panel');
    var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
    bsOffcanvas.show();
})
//Switch panel Fullscreen
$(document).on("click","#Btn-switch_panel-Fullscreen",function (){
    var w = $('#switch_panel').css('width');
    var dw = $( document ).width();
    if(w == dw+"px"){
        OutFullScreen();
        $('.offcanvas-header').off('mouseenter mouseleave');
    }else{
        InFullScreen();
        $('.offcanvas-header').hover(
            function() {
                $('#Btn-switch_panel-Clouse').css("display", "inline-block");
                $('#Btn-switch_panel-Fullscreen').css("display", "inline-block");
            }, function(){
                $('#Btn-switch_panel-Clouse').css("display", "none");
                $('#Btn-switch_panel-Fullscreen').css("display", "none");
            }
        );
    }
    function InFullScreen(){
        $('#switch_panel').css('width', '100%');
        $('.offcanvas-header').css('padding', '1px');
        $('#Btn-switch_panel-Clouse').css("display", "none");
        $('#Btn-switch_panel-Fullscreen').css("display", "none");
        $('#LoginCopyInput').css("display", "none");
        $('#PasswordCopyInput').css("display", "none");
    }
    function OutFullScreen(){
        $('#switch_panel').css('width', '70%');
        $('.offcanvas-header').css('padding', '1rem 1rem');
        $('#Btn-switch_panel-Clouse').css("display", "inline-block");
        $('#Btn-switch_panel-Fullscreen').css("display", "inline-block");
        $('#LoginCopyInput').css("display", "inline-block");
        $('#PasswordCopyInput').css("display", "inline-block");
    }
})
//Search-Btn - Search Switch
$(document).on("click","#Search-Btn",function (){
    var searchText = $('#Search-Input').val();
    window.location.href = window.location.pathname + "?search="+encodeURI(searchText);
})