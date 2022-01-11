<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

    if(isset($_POST['id'])){
        $num_s_d = $_POST['id'];
        $res = mysqli_query($sql_connect,"SELECT `img`,`ip` FROM `switch` WHERE `id` = $num_s_d");
        $res = mysqli_fetch_array($res);
        $img = $res['img'];
        $ip = $res['ip'];

        $delet_req = mysqli_query($sql_connect,"DELETE FROM `switch` WHERE `id` = $num_s_d");

        if($delet_req){
            if(!empty($img)){
                unlink($_SERVER['DOCUMENT_ROOT'].$img);
            }
            $Audit->log("Switch the IP: $ip, is deleted!");
            exit(buildAlerts("Switch the IP: $ip, is deleted!", true));
        }else{
            exit(buildAlerts('An error has occurred.', false));
        }
    }else{
        exit(buildAlerts('An error has occurred.', false));
    }

?>