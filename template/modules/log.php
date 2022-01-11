<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
    $Audit = new Audit($sql_connect);
    class Audit{
        private $db = null;
        public function __construct($sql) {
            $this->db = $sql;
        }
        public function log($message){
            $today = date("d.m.Y H:i:s");
            $user_id = $_SESSION['login_user_id'];
            if(!$user_id){
                $user_id = $_SESSION['user_id'];
            }
            $user = mysqli_fetch_assoc(mysqli_query($this->db,"SELECT `login` FROM `users` WHERE `id` = $user_id"));
            $login = $user['login'];
            $ip = $_SERVER['REMOTE_ADDR'];
        
            $array = array(
                "date" => $today,
                "user" => $login,
                "ip" => $ip,
                "message" => $message
            );
            $data = json_encode($array);
        
            $fileName = date("Y.m").".json";
            $path = $_SERVER['DOCUMENT_ROOT'].'/logs/'.$fileName;
            $file= fopen($path, "c+");
            $s = file_get_contents($path);
            if (!$s){
                fwrite($file, "[\n".$data."\n]");
            }else{
                if(substr($s,-1,1)==']'){
                    file_put_contents($path,substr($s,0,-1));
                }
                if(substr($s,-1,1)==','){
                    file_put_contents($path,substr($s,0,-1));
                }
                $file= fopen($path, "a");
                fwrite($file, ",".$data."\n]");
            }
            fclose($file); 
        }
    }
?>