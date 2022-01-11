<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/libraries/GoogleAuthenticator.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

$Login = $_POST['Login'];
$Password = $_POST['Password'];

$res = mysqli_query($sql_connect,"SELECT `login` FROM `users` WHERE `login` LIKE '$Login'");
if(!empty(mysqli_fetch_array($res))){
    exit(buildAlerts('Such an User with such an address already exists!', false));
}

$ga = new PHPGangsta_GoogleAuthenticator();
$se = $ga->createSecret();
$img = $ga->getQRCodeGoogleUrl($Login, $se);

$Password = base64_encode($Password);
$res = mysqli_query($sql_connect,"INSERT INTO `users` (`login`, `password`, `2fa_code`, `2fa_url_img`) 
VALUES ('$Login', '$Password', '$se', 'null');");

$res = mysqli_fetch_array(mysqli_query($sql_connect,"SELECT `id` FROM `users` ORDER BY `id` DESC LIMIT 1"));
$id = $res['id'];

$ch = curl_init($img);
$nameImg = "/upload/qr_code/$id.png";
$fp = fopen($_SERVER['DOCUMENT_ROOT'].$nameImg, 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);

$res = mysqli_query($sql_connect,"UPDATE `users` SET `2fa_url_img` = '$nameImg' WHERE `id` = $id;");

if($res){
    $Audit->log("Add new User the Login: $Login");
    exit(buildAlerts("New User the Login: $Login, successfully added.", true));
}else{
    exit(buildAlerts('An error has occurred.', false));
}

?>