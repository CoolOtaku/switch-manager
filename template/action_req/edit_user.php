<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

    $id = base64_decode($_POST['id']);
    $password = $_POST['password'];
    $ga_enable = $_POST['ga_enable'];
    $fileType = $_FILES['file']['type'];

    $data = mysqli_fetch_array(mysqli_query($sql_connect,"SELECT `login`, `avatar` FROM `users` WHERE `id` = $id"));
    $img_data = $data['avatar'];

    if(!empty($fileType) && strrchr($fileType, "image/") != false){
        $nameFile = str_replace("image/", $id.'.', $fileType);
        $pathToFile = $_SERVER['DOCUMENT_ROOT'].'/upload/avatars/'.$nameFile;

        if(!empty($img_data)){
            unlink($_SERVER['DOCUMENT_ROOT'].$img_data);
        }

        if(move_uploaded_file($_FILES['file']['tmp_name'], $pathToFile)){
            $img_data = '/upload/avatars/'.$nameFile;
        }
    }

    $password = base64_encode($password);
    $res = mysqli_query($sql_connect,"UPDATE `users` SET `password` = '$password', `avatar` = '$img_data', `2fa_enable` = '$ga_enable' WHERE `id` = $id;");

    if($res){
        $login = $data['login'];
        $Audit->log("User: $login, is modified.");
        exit(buildAlerts('This User has been successfully modified.', true));
    }else{
        exit(buildAlerts('An error has occurred.', false));
    }

?>