<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>asdf</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css">
    <link rel="stylesheet" href="../../css/menus.css?var=<?=filemtime('./css/menus.css')?>">
  </head>
  <body>
    <div id="wrap">
      <div id="top">
        <?php require_once "../top_menu3.php"; ?>
      </div>
      <div id="main">
        <?php require_once "./siteIntroForm.php"; ?>
      </div>
      <div id="bottom">
        <?php require_once "../bottom_menu.php"; ?>
      </div>
    </div>
  </body>
</html>
