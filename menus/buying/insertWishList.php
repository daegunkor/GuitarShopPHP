<?php
  session_start();

  require_once "./cls/GoodsWriter.php";
  // 구매 상품의 번호
  $pNum = $_GET['pNum'];
  $userId = $_SESSION['userid'];

  $writer = new GoodsWriter();

  // 상품 구매처리
  $writer->insertWishList($userId, $pNum);

  echo("
    <script>
      alert('상품을 장바구니에 담았습니다');
      history.go(-1);
    </script>
  ");
?>
