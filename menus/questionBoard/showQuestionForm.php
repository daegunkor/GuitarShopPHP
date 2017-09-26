<?php
  require_once "./cls/QnABoardViewer.php";
  require_once "./cls/QnABoardSearcher.php";
  require_once "./cls/QnABoardWriter.php";
  // 게시글 번호
  $qNum = $_GET['qNum'];

  // 게시글 출력,검색 클래스
  $writer = new QnABoardWriter();
  $viewer = new QnABoardViewer();
  $searcher = new QnABoardSearcher();
  // 게시글 조회수 증가
  $writer->hitUpper($qNum);
  // 게시글 컨텐츠 출력
  $viewer->showQuestionContents($qNum);

  // 글쓴이
  $writer = $searcher->getUserIdByQNum($qNum);
  // 답변 컨텐츠 출력4
  $viewer->showAnswerContents($qNum);
  // 목록, 수정, 삭제(댓글 함께 삭제), 답변달기<<<<구현중>>>>>>>
?>
