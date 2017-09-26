<link rel="stylesheet" href="../../css/checkDupli.css?var=<?=filemtime('../../css/checkDupli.css')?>">
<div class="checkDupliDiv">
<?php
  session_start();
  require_once "../cls/idChecker.php";
  $id = $_GET['id'];
  $idChecker = new idChecker();
  if($id == ''){
    echo "아이디 입력란이 빈칸입니다.";
    unset($_SESSION['idDupliCheck']);
  }
  else if($idChecker->idDupliCheck($id)){
    echo "이미 존재하는 아이디입니다.";
    unset($_SESSION['idDupliCheck']);
  } else {
    echo "해당 아이디를 사용하셔도 좋습니다.";
    $_SESSION['idDupliCheck'] = $id;
  }
?>
</div>
