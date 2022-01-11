<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

$id = $_POST['id'];
$Name = $_POST['Name'];
$IP = $_POST['IP'];
$Login = $_POST['Login'];
$Password = $_POST['Password'];
$fileType = $_FILES['file']['type'];

$res1 = mysqli_fetch_array(mysqli_query($sql_connect,"SELECT `ip` FROM `switch` WHERE `ip` LIKE '$IP'"));
$data = mysqli_fetch_array(mysqli_query($sql_connect,"SELECT `ip`, `img` FROM `switch` WHERE `id` = $id"));
$old_img = $data['img'];
$old_ip = $data['ip'];

if(!empty($res1)){
    $res1 = $res1['ip'];
    if($res1 != $old_ip){
        exit(buildAlerts('Such an Switch with such an address already exists!', false));
    }
}

if(!empty($old_img)){
    if($old_ip != $IP){
        $old_path = $_SERVER['DOCUMENT_ROOT'].$old_img;
        $img_data = str_replace($old_ip, $IP, $old_img);
        rename($old_path, "../..".$img_data);
    }else{
        $img_data = $old_img;
    }
}

if(empty($Name)){
    $Name = "Switch";
}
if(!empty($fileType) && strrchr($fileType, "image/") != false){
    $nameFile = str_replace("image/", $IP.'.', $fileType);
    $pathToFile = $_SERVER['DOCUMENT_ROOT'].'/upload/img/'.$nameFile;

    if(!empty($img_data)){
        unlink($_SERVER['DOCUMENT_ROOT'].$img_data);
    }

    if(move_uploaded_file($_FILES['file']['tmp_name'], $pathToFile)){
        $img_data = '/upload/img/'.$nameFile;
    }
}

$Password = base64_encode($Password);
$res = mysqli_query($sql_connect,"UPDATE `switch` SET `name` = '$Name', `ip` = '$IP', `login` = '$Login', 
`password` = '$Password', `img` = '$img_data' WHERE `id` = $id;");

if($res){
    $Audit->log("Switch the IP: $IP, is modified.");
    exit(buildAlerts('This Switch has been successfully modified.', true));
}else{
    exit(buildAlerts('An error has occurred.', false));
}

?>