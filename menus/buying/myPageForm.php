<?php
  require_once './cls/GoodsViewer.php';

  $viewer = new GoodsViewer();

  $userId = $_SESSION['userid'];
?>
<br>
<div id="buyListWrap">
  <?php
    // 구매항목 출력
    $viewer->showBuyList($userId);
  ?>
</div>
<br>
<div id="wishListWrap">
  <?php

    // 장바구니 출력 ( + 총액 계산, 전부 구매, 장바구니 제거)
    $viewer->showWishList($userId);
  ?>
</div>
<br>
