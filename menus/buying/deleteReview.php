<?php
  require_once "./cls/GoodsWriter.php";

  $writer = new GoodsWriter();

  $id = $_GET['id'];
  $date = $_GET['date'];

  $writer->cancelReview($id,$date);

  echo("
    <script>
      alert('해당 댓글을 삭제하였습니다.');
      history.go(-1);
    </script>
  ");
?>
