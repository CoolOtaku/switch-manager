<?php 
function buildAlerts($text, $is_ok){
    if($is_ok){
        return '<div class="alert alert-success mx-5 mt-4" role="alert"><div class="row"><div class="col"><h4 class="alert-heading">Success !</h4></div><div class="col"><div class="d-flex justify-content-end"><button class="btn_hiden" id="close_alert"><img src="img/exit.svg"></button></div></div></div>
        <p>'.$text.'</p></div>';
    }else{
        return '<div class="alert alert-danger mx-5 mt-4" role="alert"><div class="row"><div class="col"><h4 class="alert-heading">Error !</h4></div><div class="col"><div class="d-flex justify-content-end"><button class="btn_hiden" id="close_alert"><img src="img/exit.svg"></button></div></div></div>
        <p>'.$text.'</p></div>';
    }
}
?>