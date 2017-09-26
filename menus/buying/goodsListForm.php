<?php
  if(!isset($_SESSION['userid'])){
    echo("
      <script>
        alert('로그인 후에 이용가능합니다.');
        history.go(-1);
      </script>
    ");
  }
  require_once "./cls/GoodsSearcher.php";
  require_once "./cls/GoodsViewer.php";

  $viewer = new GoodsViewer();      // 상품 출력 클래스
  $searcher = new GoodsSearcher();  // 상품 검색 클래스

  if(!isset($_GET['page']))
    $curPage = 1;
  else
    $curPage = $_GET['page'];

  // 한페이지에 6개씩 출력
  $maxQCnt = 6;
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
    <div id="goodsTopBar">
      &nbsp;&nbsp;기타 장터
    </div>
    <div id="goodsList">
      <?php
        // 게시물 표시(테이블)
        $viewer->showGoodsList($startCnt,$lastCnt);
        echo "";
      ?>
      <br>
      <div id="goodsRegistDiv">
          <a href='./registGoodsFrame.php' id='goodsRegistBtn'>상품등록</a>
      </div>
    </div>
    <div id="goodsPageDiv">
        <?php
          // 게시물 페이지(인덱스)
          $viewer->showGoodsIndex(1,$curPage,$totalPageCnt);
        ?>
    </div>
  </body>
</html>
