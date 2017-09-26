<?php
  require_once "./cls/QnABoardWriter.php";

  $parent     = $_POST['qNum'];       // 답글 대상글
  $title      = $_POST['title'];      // 제목
  $content    = $_POST['content'];    // 내용
  $date       = date("Y-m-d H:i:s");  // 현재 날짜
  $id         = $_POST['userid'];     // 글쓴이
  $nick       = $_POST['nick'];       // 닉네임

  $writer = new QnABoardWriter();
  $writer->writeAnswer([
    "parent"  => $parent,
    "title"   => $title,
    "content" => $content,
    "date"    => $date,
    "id"      => $id,
    "nick"    => $nick
  ]);

  header("location:./showQuestionFrame.php?qNum=$parent");


?>
