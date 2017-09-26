<?php
  session_start();

  require_once "./cls/GoodsSearcher.php";
  require_once "./cls/GoodsWriter.php";

  // 게시글 검색클래스, 수정클래스
  $searcher = new GoodsSearcher();
  $writer = new GoodsWriter();

  // 질문의 글 번호
  $pNum = $_GET['pNum'];

  // 글의 글쓴이인가 재확인 (참 : 삭제, 거짓 : 잘못된 접근)
  if($searcher->getUserIdByPNum($pNum) == $_SESSION['userid']){
      $writer->deleteGoods($pNum);
      $writer->deleteReview($pNum);
      echo ("
        <script>
          alert('글삭제에 성공했습니다.');
          location.href ='./GoodsListFrame.php';
        </script>
      ");

  } else {
    echo ("
      <script>
        alert('잘못된 접근입니다.');
        location.href ='./GoodsListFrame.php';
      </script>
    ");
  }

?>
