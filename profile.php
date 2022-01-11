<?php 
  require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
  require $_SERVER['DOCUMENT_ROOT'].'/template/modules/verifyUser.php';

  require $_SERVER['DOCUMENT_ROOT'].'/template/f_import.php';
  require $_SERVER['DOCUMENT_ROOT'].'/template/data_text.php';

  $user_id = $_SESSION['login_user_id'];
  $user = mysqli_fetch_assoc(mysqli_query($sql_connect,"SELECT * FROM `users` WHERE `id` = $user_id"));
  $users = mysqli_query($sql_connect,"SELECT * FROM `users`");
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

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

      <div class="container px-5">
        <?php
          if(isset($_GET['response'])) {
            echo $_GET['response'];
          }
        ?>
      </div>
      
      <div class="container bg-item p-4 my-3 rounded-3">

        <div class="row">

          <div class="col-md-6 d-flex justify-content-center">
            <?php 
              $avatar = $user['avatar'];
              if(empty($avatar)){
                $avatar = "/img/avatar.svg";
              }
            ?>
            <div class="text-center">
              <img id="user_avatar" class="img-1-1_general" src="<?php echo $avatar; ?>">
              <h5 class="text-white"><?php echo $user['login']; ?></h5>
            </div>
            <input type="hidden" id="user_id" value="<?php echo base64_encode($user['id']); ?>">
          </div>
          <div class="col-md-6">
            <label for="user_avatar_edit" class="form-label text-butt-1-1_general">Avatar:</label>
            <input class="form-control" type="file" id="user_avatar_edit">
            <label for="user_password" class="form-label text-butt-1-1_general">Password:</label>
            <input type="password" id="user_password" class="form-control" placeholder="Password" value="<?php echo base64_decode($user['password']); ?>">
          </div>
          <div class="col-md-12 mt-3 d-flex justify-content-center">
            <h4 class="text-white">Google Authenticator</h4>
          </div>
          <div class="col-md-6 d-flex justify-content-center">
            <div>
              <h5 class="text-white">QR-Code:</h5>
              <div class="bg-white p-3 rounded-3">
                <img id="user_2af_qr-code" src="<?php echo $user['2fa_url_img']; ?>">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h5 class="text-white">Code:</h5>
            <p id="user_2af_code" class="text-butt-1-1_general"><?php echo $user['2fa_code']; ?></p>
            <div class="form-check form-switch text-white">
              <input class="form-check-input" type="checkbox" role="switch" id="2fa_enable" <?php if($user['2fa_enable'] == 1){ echo 'checked';} ?>>
              <label class="form-check-label" for="2fa_enable">Enable google authenticator</label>
            </div>
          </div>
          <div class="col-md-12 mt-3 d-flex justify-content-center">
              <div id="SaveEditUser" class="button_style button-2-1_general">Seve</div>
          </div>

        </div>

      </div>

      <div class="container bg-item p-4 mb-3 rounded-3">
        <div class="container">
          <div class="mb-3 d-flex justify-content-center">
              <div id="AddNewUser" class="button_style button-1-1_general">Add new user</div>
          </div>
          <table class="table table-dark table-striped">
            <thead>
              <tr>
                <th scope="col">Avatar</th>
                <th scope="col">Login</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              while($user_in_list = mysqli_fetch_array($users)){
              ?>
                <tr>
                  <th class="align-middle">
                    <?php 
                    $img = $user_in_list['avatar'];
                    if(empty($img)){
                      $img = "/img/avatar.svg";
                    }
                    ?>
                    <img src="<?php echo $img; ?>" class="img-1-1_general" style="width: 50px; height: 50px;">
                  </th>
                  <td class="align-middle"><?php echo $user_in_list['login']; ?></td>
                  <td class="align-middle">
                    <div class="d-flex justify-content-end">
                      <?php if($user_in_list['id'] != 1 && $user['id'] != $user_in_list['id']){ ?>
                      <button type="button" class="btn_hiden Edit_User" data-id="<?php echo base64_encode($user_in_list['id']); ?>" data-login="<?php echo $user_in_list['login']; ?>" data-password="<?php echo $user_in_list['password']; ?>"><img src="/img/edit.svg"></button>
                      <button type="button" class="btn_hiden Delete_User" data-id="<?php echo base64_encode($user_in_list['id']); ?>"><img src="/img/trash.svg"></button>
                      <?php } ?>
                    </div>
                  </td>
                </tr>
              <?php } ?>    
            </tbody>

          </table>
        </div>
        
      </div>

    <?php 
      require './template/menu_users.php';
      get_js();
    ?>
    <script src="./js/from_profile/scripts.js"></script>
    
  </body>
</html>