<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/libraries/GoogleAuthenticator.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/buildAlerts.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/template/modules/log.php';

if($_POST['login']){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user = mysqli_fetch_assoc(mysqli_query($sql_connect,"SELECT * FROM `users` WHERE `login` LIKE '$login'"));
    if(!$user){
        exit(buildAlerts('Such User does not exist!', false));
    }else{
        $res = pass_ver($password, $user);
        if($res){
            $_SESSION['user_id'] = $user['id'];
            if($user['2fa_enable'] == 1){
                $_SESSION['2fa_code'] = $user['2fa_code'];
                exit("2fa");
            }else{
                $Audit->log("Login simple.");
                log_in();
            }
        }else{
            exit(buildAlerts('The password was entered incorrectly!', false)); 
        }
    }
}
if($_POST['code']){
    $ga = new PHPGangsta_GoogleAuthenticator();
    $result = $ga->verifyCode($_SESSION['2fa_code'],$_POST['code'], 2);
    if($result){
        $Audit->log("Login with double authorization.");
        log_in();
    }else {
        exit(buildAlerts('Not the correct code!', false)); 
    }
}
if($_POST['logout']){
    $_SESSION['login_user_id'] = '';
    exit('logout');
}

function pass_ver($password, $user){
    $ver_pass = base64_decode($user['password']);
    if($password == $ver_pass){
        return true;
    }
    return false;
}
function log_in(){
    $_SESSION['login_user_id'] = $_SESSION['user_id'];
    $_SESSION['user_id'] = '';
    $_SESSION['2fa_code'] = '';
    exit("isLogin");
}

?>