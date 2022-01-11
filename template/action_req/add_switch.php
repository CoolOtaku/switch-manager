<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

$Name = $_POST['Name'];
$IP = $_POST['IP'];
$Login = $_POST['Login'];
$Password = $_POST['Password'];
$fileType = $_FILES['file']['type'];

$res = mysqli_query($sql_connect,"SELECT `ip` FROM `switch` WHERE `ip` LIKE '$IP'");
if(!empty(mysqli_fetch_array($res))){
    exit(buildAlerts('Such an Switch with such an address already exists!', false));
}

if(empty($Name)){
    $Name = "Switch";
}
if(!empty($fileType) && strrchr($fileType, "image/") != false){
    $nameFile = str_replace("image/", $IP.'.', $fileType);
    $pathToFile = $_SERVER['DOCUMENT_ROOT'].'/upload/img/'.$nameFile;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $pathToFile)){
        $img_data = '/upload/img/'.$nameFile;
    }else{
        $img_data = "";
    }
}

$Password = base64_encode($password);
$res = mysqli_query($sql_connect,"INSERT INTO `switch` (`name`, `ip`, `login`, `password`, `img`) 
VALUES ('$Name', '$IP', '$Login', '$Password', '$img_data');");

if($res){
    $Audit->log("Add new Switch the IP:$IP");
    exit(buildAlerts("New Switch the IP: $IP, successfully added.", true));
}else{
    exit(buildAlerts('An error has occurred.', false));
}

?>