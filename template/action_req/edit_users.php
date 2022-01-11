<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

$id = base64_decode($_POST['id']);
$Login = $_POST['Login'];
$Password = $_POST['Password'];

$res1 = mysqli_fetch_array(mysqli_query($sql_connect,"SELECT `login` FROM `users` WHERE `login` LIKE '$Login'"));
$data = mysqli_fetch_array(mysqli_query($sql_connect,"SELECT `login` FROM `users` WHERE `id` = $id"));
$old_login = $data['login'];

if(!empty($res1)){
    $res1 = $res1['login'];
    if($res1 != $old_login){
        exit(buildAlerts('Such a User with such a login already exists!', false));
    }
}

$Password = base64_encode($Password);
$res = mysqli_query($sql_connect,"UPDATE `users` SET `login` = '$Login', `password` = '$Password' WHERE `id` = $id;");

if($res){
    $Audit->log("User: $Login, is modified.");
    exit(buildAlerts("User: $Login has been successfully modified.", true));
}else{
    exit(buildAlerts('An error has occurred.', false));
}

?>