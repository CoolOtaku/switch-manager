<?php 
  require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
  require $_SERVER['DOCUMENT_ROOT'].'/template/modules/verifyUser.php';

  require $_SERVER['DOCUMENT_ROOT'].'/template/f_import.php';
  require $_SERVER['DOCUMENT_ROOT'].'/template/data_text.php';
  require $_SERVER['DOCUMENT_ROOT'].'/template/svg_pack.php';

  $query = "SELECT * FROM `switch`";
  if(isset($_GET['search'])) {
    $text = $_GET['search'];
    $query.=" WHERE `ip` LIKE '%$text%' OR `name` LIKE '%$text%'";
  }
  $switchs = mysqli_query($sql_connect,$query);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Icon -->
    <link rel="apple-touch-icon" href="/img/switch.png" sizes="180x180">
    <link rel="icon" href="/img/switch.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/img/switch.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="/img/switch.png" color="#7952b3">
    <link rel="icon" href="/img/switch.png">

    <?php get_css(); ?>
      
  </head>
  <body class="">
      <?php require './template/header.php';?>

      <div class="pid-box-2-3_general"></div>

      <div class="container container-1_general rounded-3">
        <div class="row d-flex justify-content-center">
          <div class="box-1-1_general">
            <div class="button_style button-1-1_general text-butt-1-1_general" id="Btn_Add_Switch">Add - Switch</div>
          </div>

          <div class="box-1-2_general">
            <input id="Search-Input" class="form-control search-1-1_general" type="text" placeholder="Enter text to search">
            <div class="button_style button-1-2_general" id="Search-Btn">
              <p class="text-butt-1-2_general">Search</p>
            </div>
          </div>
        </div>

      </div>
      <div class="container px-5">
        <?php
        if(isset($_GET['response'])) {
          echo $_GET['response'];
        }
        ?>
      </div>
      
      <div class="container container-2_general mb-3">
        <div class="row row-box-center_general">

         <?php
            while($data = mysqli_fetch_array($switchs)){
              $img = $data['img'];
              if(empty($img)){
                $img = "/img/switch.png";
              }
              echo'
                <div class="gen-box-2-1_general">
                  <div class="box-2-1_general">
              
                    <div class="pid-box-2-1_general">
                      <img class="img-1-1_general" src="'.$img.'">
                      <div id="switch-name_general" class="text-sw-name_general">'. $data['name'] .'</div>
                    </div>
              
                    <div class="pid-box-2-2_general">
                      <div class="text-sw-name_general">IP: '. $data['ip'] .'</div>
                      <div class="text-sw-name_general">Status: <span id="ds_'.$data['id'].'" data-id="'.$data['id'].'" data-ip="'.$data['ip'].'" class="load"></span></div>
                      <div class="gen-button-box-2-1_general ">
                        <div class="button_style button-2-1_general Btn-log-in" data-ip="'.$data['ip'].'" data-login="'.$data['login'].'" data-pass="'.$data['password'].'" data-id="'.$data['id'].'">Log in</div>
                      </div>
                    </div>

                    <div class="pid-box-2-3_general">

                      <div class="button_edit_general" data-id="'.$data['id'].'">
                        <div class="box_svg">
                          <svg name="" class="icon_edit" viewBox="0 0 8 8">
                            <use xlink:href="#edit"></use>
                          </svg>
                        </div>
                      </div>

                      <div class="button_delet_general" data-id="'.$data['id'].'">
                        <div class="box_svg">
                          <svg name="" class="icon_delet" viewBox="0 0 8 8">
                            <use xlink:href="#delet"></use>
                          </svg>
                        </div>
                      </div>
 
                    </div>
                  
                  </div>
                </div>
              ';
            }
         ?>

        </div>
      </div>

    <?php 
      require './template/switch_panel.php';
      require './template/menu_switch.php';
      get_js();
    ?>
    <script src="./js/from_home/scripts.js"></script>
    <script src="./js/from_home/ping_module.js"></script>
    
  </body>
</html>