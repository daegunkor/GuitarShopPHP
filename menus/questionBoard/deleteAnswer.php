<?php
  require_once "./cls/QnABoardWriter.php";

  $writer = new QnABoardWriter();

  $id = $_GET['id'];
  $date = $_GET['date'];

  $writer->cancelAnswer($id,$date);

  echo("
    <script>
      alert('해당 댓글을 삭제하였습니다.');
      history.go(-1);
    </script>
  ");
?>
