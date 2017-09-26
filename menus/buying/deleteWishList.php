<?php
  session_start();

  require_once "./cls/GoodsWriter.php";

  $writer = new GoodsWriter();
  $userId = $_SESSION['userid'];
  $pNum = $_GET['pNum'];

  $writer->deleteWishList($userId,$pNum);

  echo("
    <script>
      alert('해당 항목이 제거되었습니다.');
      history.go(-1);
    </script>
  ");


?>
