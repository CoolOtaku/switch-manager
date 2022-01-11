<?php 
if(!$_SESSION['login_user_id']){
    header( 'Location: /login.php');
}
?>