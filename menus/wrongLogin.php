<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>asdf</title>
    <link rel="stylesheet" href="../css/menus.css?var=<?=filemtime('../../css/menus.css')?>">
    <link rel="stylesheet" href="../css/loginPop.css?var=<?=filemtime('../../css/loginPop.css')?>">
  </head>
  <body>
      <div id="loginBoxDiv">
        <form action='../menus/login/windowLogin.php' method='post'>
          ID <input type='text' name='userid' size='8' value=''>
          PW <input type='password' name='userpass' size='8' value=''>
          <input type='submit' value='로그인'>
        </form>
        <br>
        다시 로그인하세요
        <br>
        <a href='./searchIdPass/searchIdForm.php'>아이디 찾기</a>
        <a href='./searchIdPass/searchPassForm.php'>비밀번호 찾기</a>
      </div>
  </body>
</html>
