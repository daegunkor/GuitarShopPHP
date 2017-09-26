<link rel="stylesheet" href="../../css/checkDupli.css?var=<?=filemtime('../../css/checkDupli.css')?>">
<div class="checkDupliDiv">
<?php
  session_start();
  require_once "../cls/idChecker.php";
  $nick = $_GET['nick'];
  $idChecker = new idChecker();
  if($nick == ''){
    echo "닉네임 입력란이 빈칸입니다";
    unset($_SESSION['nickDupliCheck']);
  }
  else if($idChecker->nickDupliCheck($nick)){
    echo "이미 존재하는 닉네임입니다.";
    unset($_SESSION['nickDupliCheck']);
  } else {
    echo "해당 닉네임을 사용하셔도 좋습니다.";
    $_SESSION['nickDupliCheck'] = $nick;
  }
?>

</div>
