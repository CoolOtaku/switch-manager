<?php 
if(isset($_POST['deletefile'])) {
    unlink($_POST['deletefile']);
}
?>