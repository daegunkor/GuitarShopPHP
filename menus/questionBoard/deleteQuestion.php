<?php
  session_start();
  require_once "./cls/QnABoardSearcher.php";
  require_once "./cls/QnABoardWriter.php";

  // 게시글 검색클래스, 수정클래스
  $searcher = new QnABoardSearcher();
  $writer = new QnABoardWriter();
  // 질문의 글 번호
  $qNum = $_GET['qNum'];
  // 글의 글쓴이인가 재확인 (참 : 삭제, 거짓 : 잘못된 접근)
  if($searcher->getUserIdByQNum($qNum) == $_SESSION['userid']){
      $writer->deleteQuestion($qNum);
      $writer->deleteAnswer($qNum);
      echo ("
        <script>
          alert('글삭제에 성공했습니다.');
          location.href ='./questionBoardFrame.php';
        </script>
      ");
  } else {
    echo ("
      <script>
        alert('잘못된 접근입니다.');
        location.href ='./questionBoardFrame.php';
      </script>
    ");
  }
?>
