<?php
  session_start();

  require_once "./cls/GoodsWriter.php";
  // 구매 상품의 번호
  $pNum = $_GET['pNum'];
  $userId = $_SESSION['userid'];

  $writer = new GoodsWriter();

  // 상품 구매처리
  if($writer->buyGoods($userId, $pNum))
    echo("
      <script>
        alert('상품을 구매하셨습니다.');
        history.go(-1);
      </script>
    ");
  else
  echo("
    <script>
      alert('상품이 0개 이하입니다');
      history.go(-1);
    </script>
  ");
?>
