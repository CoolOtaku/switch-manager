<?php
    session_start();
    $par_ip = "localhost";
    $par_name = "root";
    $par_pass = "";
    $par_db = "switch_manager";
    
    $sql_connect = mysqli_connect($par_ip, $par_name, $par_pass, $par_db);
    mysqli_set_charset($sql_connect, "utf8mb4");
    
    if(!$sql_connect){
        die ("ПОМИЛКА підключення SQL");
    }

    date_default_timezone_set('Europe/Kiev');

?>