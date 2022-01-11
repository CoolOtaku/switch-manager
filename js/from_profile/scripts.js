$(document).on("click","#SaveEditUser",function (){
    var id = $('#user_id').val();
    var avatar = $('#user_avatar_edit')[0].files[0];
    var password = $('#user_password').val();
    var ga_enable = 0;
    if ($('#2fa_enable').is(":checked")){
        ga_enable = 1;
    }

    if (!password){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You have not filled in all the fields !',
        })
        return false;
    }

    let formData = new FormData();
    formData.append("id", id);
    formData.append("password", password);
    formData.append("ga_enable", ga_enable);
    formData.append("file", avatar);
    $.ajax({
        type: "POST",
        url: '../template/action_req/edit_user.php',
        contentType: false,processData: false,
        data:formData,
        success: function(response) {
            window.location.href = window.location.pathname + "?response="+encodeURI(response);
        }
    });
})

$(document).on("click","#AddNewUser",function (){
    $('#Login-Edit-Add').val("");
    $('#Password-Edit-Add').val("");

    $('#Add_or_edit').val('Add');
    $('#modal_user_title').text('Add new User');
    $('#modal_add_edit_user').modal('show');
})

$(document).on("click",".Edit_User",function (){
    $('#Login-Edit-Add').val($(this).attr('data-login'));
    $('#Password-Edit-Add').val(atob($(this).attr('data-password')));
    $('#Add_or_edit').val('Edit');
    $('#modal_user_title').text('Edit User');
    var id = $(this).attr('data-id');
    $('#Id').val(id);
    $('#modal_add_edit_user').modal('show');
})
//module save button
$(document).on("click","#Btn_Save_Add_Edit",function (){
    let formData = new FormData();

    var Login = $('#Login-Edit-Add').val();
    var Password = $('#Password-Edit-Add').val();

    if (!Login || !Password){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You have not filled in all the fields !',
        })
        return false;
    }

    formData.append("Login", Login);
    formData.append("Password", Password);

    var type = $('#Add_or_edit').val();
    if(type == "Add"){
        $.ajax({
            type: "POST",
            url: "../template/action_req/add_user.php",
            contentType: false,processData: false,
            data: formData,
            success: function(response) {
                window.location.href = window.location.pathname + "?response="+encodeURI(response);
            }
        });
    }else{
        var id = $('#Id').val();
        formData.append("id", id);
        $.ajax({
            type: "POST",
            url: "../template/action_req/edit_users.php",
            contentType: false,processData: false,
            data: formData,
            success: function(response) {
                window.location.href = window.location.pathname + "?response="+encodeURI(response);
            }
        });
    }
})
//delet user
$(document).on("click",".Delete_User",function (){
    var id = $(this).attr("data-id");
    $('#IdDelete').val(id);
    $('#delete_modal').modal('show');
})
$(document).on("click","#Btn_Delete_User",function (){
    let formData = new FormData();
    var id = $('#IdDelete').val();
    formData.append("id", id);
    $.ajax({
        type: "POST",
        url: '../template/action_req/delete_user.php',
        contentType: false,processData: false,
        data:formData,
        success: function(response) {
            window.location.href = window.location.pathname + "?response="+encodeURI(response);
        }
    });
})