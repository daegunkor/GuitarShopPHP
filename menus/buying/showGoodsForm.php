<?php
  require_once "./cls/GoodsViewer.php";
  require_once "./cls/GoodsSearcher.php";
  require_once "./cls/GoodsWriter.php";
  // 상품글 번호
  $pNum = $_GET['pNum'];

  // 상품글 출력 클래스
  $viewer = new GoodsViewer();
?>
<div id='goodsContentDiv'>
  <?php
    // 게시글 컨텐츠 출력
    $viewer->showGoodsContents($pNum);
  ?>
</div>
<div id='ReviewContentDiv'>
  <?php
    // 답변 입력
    require_once "./writeReviewForm.php";
    // 답변 컨텐츠 출력
    $viewer->showReviewContents($pNum);
  ?>
</div>
