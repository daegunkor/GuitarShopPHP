<?php

  require_once './cls/GoodsWriter.php';
  $pNum     = $_POST['pNum'];       // 상품 번호
  $content  = $_POST['content'];    // 리뷰 내용
  $date     = date("Y-m-d H:i:s");  // 게시날짜
  $userId   = $_POST['userid'];     // 사용자 아이디
  $nick     = $_POST['nick'];       // 사용자 닉네임

  $writer = new GoodsWriter();

  $writer->writeReview([
    "parent"  => $pNum,
    "content" => $content,
    "date"    => $date,
    "id"      => $userId,
    "nick"    => $nick
  ]);


  echo("
    <script>
      alert('리뷰가 작성되었습니다.');
      history.go(-1);
    </script>
  ");

?>
