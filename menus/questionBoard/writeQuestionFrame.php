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
    <link rel="stylesheet" href="../../css/question.css?var=<?=filemtime('../../css/question.css')?>">
    <link rel="stylesheet" href="../../css/inputForm.css?var=73">
    <style media="screen">

    </style>
  </head>
  <body>
    <div id="wrap">
      <div id="top">
        <?php require_once "../top_menu3.php"; ?>
      </div>
      <div id="main">
        <?php require_once "./writeQuestionForm.php"; ?>
        <br>
      </div>

      <div id="bottom">
        <?php require_once "../bottom_menu.php"; ?>
      </div>

    </div>
  </body>
</html>
