<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

    if(isset($_POST['id'])){
        $id = base64_decode($_POST['id']);
        $res = mysqli_query($sql_connect,"SELECT `login`, `avatar`, `2fa_url_img` FROM `users` WHERE `id` = $id");
        $res = mysqli_fetch_array($res);
        $login = $res['login'];
        $img = $res['avatar'];
        $qr = $res['2fa_url_img'];

        $delete_req = mysqli_query($sql_connect,"DELETE FROM `users` WHERE `id` = $id");

        if($delete_req){
            unlink($_SERVER['DOCUMENT_ROOT'].$qr);
            if(!empty($img)){
                unlink($_SERVER['DOCUMENT_ROOT'].$img);
            }
            $Audit->log("User the Login: $login, is deleted!");
            exit(buildAlerts("User the Login: $login, is deleted!", true));
        }else{
            exit(buildAlerts('An error has occurred.', false));
        }
    }else{
        exit(buildAlerts('An error has occurred.', false));
    }

?>