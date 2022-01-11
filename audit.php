<?php 
  require_once $_SERVER['DOCUMENT_ROOT'].'/template/SQL_Connect.php';
  require $_SERVER['DOCUMENT_ROOT'].'/template/modules/verifyUser.php';

  require $_SERVER['DOCUMENT_ROOT'].'/template/f_import.php';
  require $_SERVER['DOCUMENT_ROOT'].'/template/data_text.php';
  
  $dir = $_SERVER['DOCUMENT_ROOT'].'/logs';
  $files = scandir($dir);
  unset($files[0]);
  unset($files[1]);
  rsort($files);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit</title>

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
        <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">User</th>
            <th scope="col">IP</th>
            <th scope="col">Message</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($files as $value){ 
            $file = $_SERVER['DOCUMENT_ROOT']."/logs/".$value;
            $json = json_decode(file_get_contents($file)); 
          ?>
          <tr>
            <th colspan="3" scope="row" class="text-center">
              Audit for such period of time: <?php echo str_replace(".json", "", $value); ?>
            </th>
            <td>
              <button type="button" class="btn_hiden Delete_Log" data-file="<?php echo $file; ?>">
                <img src="/img/trash.svg">
              </button>
            </td>
          </tr>
          <?php
            if($json){
            foreach ($json as $item){
          ?>
            <tr>
              <th scope="row" class="align-middle"><?php echo $item->date; ?></th>
              <td class="align-middle"><?php echo $item->user; ?></td>
              <td class="align-middle"><?php echo $item->ip; ?></td>
              <td class="align-middle"><?php echo $item->message; ?></td>
            </tr>
          <?php }}else{ 
            echo "<tr><th colspan=\"4\" scope=\"row\" class=\"text-center\">No information available !</tr>";
          }} ?>
        </tbody>

        </table>
      </div>

    <?php
      get_js();
    ?>
    <script src="./js/from_audit/scripts.js"></script>
    
  </body>
</html>