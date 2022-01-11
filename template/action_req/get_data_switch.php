<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';

$id = $_POST['id'];

$array = array();
$data = mysqli_fetch_array(mysqli_query($sql_connect,"SELECT * FROM `switch` WHERE `id` = $id"));
$password = base64_decode($data['password']);
$array = array(
    "name" => $data['name'],
    "ip" => $data['ip'],
    "login" => $data['login'],
    "password" => $password
);

if(!empty($array)){
    $data = json_encode($array);
    exit($data);
}else{
    exit("null");
}
?>