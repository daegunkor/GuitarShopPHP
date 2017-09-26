<?php


  if(!isset($_SESSION['userid'])){
    echo("
      <script>
        alert('로그인 후에 이용가능합니다.');
        history.go(-1);
      </script>
    ");
  }
  require_once "./cls/QnABoardSearcher.php";
  require_once "./cls/QnABoardViewer.php";


  $viewer = new QnABoardViewer();// 게시판 출력 클래스
  $searcher = new QnABoardSearcher();// 게시판 검색 클래스

  if(!isset($_GET['page']))
    $curPage = 1;
  else
    $curPage = $_GET['page'];

  // 한페이지에 10개씩 출력
  $maxQCnt = 10;
  // 전체 페이지 갯수
  $totalPageCnt = $searcher->getTotalPageCnt($maxQCnt);
  // 현 페이지 시작 글 카운트
  $startCnt = ($curPage-1) * $maxQCnt;
  // 현 페이지 끝 글 카운트
  $lastCnt = $curPage * $maxQCnt - 1;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="QnATopBar">
      &nbsp;&nbsp;묻고 답하기
    </div>
    <div id="QnABoard">
      <?php
        // 게시물 표시(테이블)
        $viewer->showQnATable($startCnt,$lastCnt);
        // 게시물 페이지(인덱스)
      ?>
      <div id="QnAWriteDiv">
        <a href='./writeQuestionFrame.php' id='questionWriteBtn'>글쓰기</a>
      </div>
    </div>
    <div id="QnAPageDiv">
      <?php
        $viewer->showQnaPageIndex(1,$curPage,$totalPageCnt);
      ?>
    </div>
  </body>
</html>
