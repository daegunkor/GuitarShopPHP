<?php
  require_once "../cls/DBManager.php";
  class GoodsViewer{
    var $dbm;

    function __construct(){
      $this->dbm = new DBManager();
    }

    // 상품 리스트 테이블을 출력
    function showGoodsList($start, $number){
      $sql = "SELECT num, title, price, mainImg ";
      $sql.= "FROM goods ORDER BY num DESC";
      $this->dbm->useSql($sql,[]);
      $data = $this->dbm->sttFetchAllAssoc();
      $dataDir = "./uploads/goodsData/";

      for($i = $start; $i <= $number; $i++){
        $width = 300;
        $height = 450;
        $brLine = 4;
        if(isset($data[$i])){
          $imgDir = $dataDir.$data[$i]['num']."/data/".$data[$i]['mainImg'];
          echo("
            <div class='goodsListDiv'>
              <a href='./showGoodsFrame.php?pNum={$data[$i]['num']}'><img src='{$imgDir}' width='100%' height='80%'></a>
              <div class='goodsTitle'>
                {$data[$i]['title']}
              </div>
              <div class='goodsPrice'>
              {$data[$i]['price']}원
              </div>
            </div>
          ");
        }
      }
    }
    // 페이지 인덱스 생성
    function showGoodsIndex($startPage, $curPage, $endPage){
      // ◀이전 12<b><u>3</u></b>45다음▶
      $frontArea = 2;
      $backArea = 2;
      // 이전 페이지가 2개를 초과하지 않으면 이전 버튼 없음 1..
      if($curPage > $startPage){
        $goFront = $curPage-1;
        echo "<a href='goodsListFrame.php?page={$goFront}'>◀이전 </a>";
      }

      // 현재 페이지로부터 앞뒤로 2개씩 번호 출력
      for($i = $startPage; $i <= $endPage; $i++){
        if($i == $curPage)
          echo "<b><u>$i</u></b>";
        else if(($curPage-$frontArea) <= $i && $i <= ($curPage+$backArea))
          echo "<a href='goodsListFrame.php?page={$i}'>{$i}</a>";
      }
      // 다음 페에지가 2개를 초과하지 않으면 다음 버튼 없음 ..endPage
      if($endPage > $curPage){
        $goBack = $curPage+1;
        echo "<a href='goodsListFrame.php?page={$goBack}'> 다음▶</a>";
      }

    }
    // 해당 번호의 상품의 컨텐츠 보여줌
    function showGoodsContents($pNum){

      $sql = "SELECT num, title, name, content, price,quantity, regist_day, id, nick, mainImg ";
      $sql.= "FROM goods WHERE num = :num";
      $this->dbm->useSql($sql,[":num" => $pNum]);
      $data = $this->dbm->sttFetchAssoc();
      $pNum = $data['num'];

      // 이미지경로
      $dataDir = "./uploads/goodsData/";
      $imgDir = $dataDir.$data['num']."/data/".$data['mainImg'];

      echo ("
        <div id='goodsTitleDiv'>
          {$data['title']}
        </div>
        <div id='goodsPurchaseDiv'>
          <div id='mainImgDiv' >
            <img src='{$imgDir}' width='100%' height='100%'>
          </div>
          <div id='purchaseDiv'>
            <table id='purchaseTable' align='center' height='100%''>
              <tr>
                <td class='goodsContentfirstTd'>판매자</td>
                <td class='goodsSubjectTd'>{$data['id']}[{$data['nick']}]</td>
              </tr>
              <tr>
                <td class='goodsContentfirstTd'>가격</td>
                <td class='goodsSubjectTd'>{$data['price']}</td>
              </tr>
              <tr>
                <td class='goodsContentfirstTd'>수량</td>
                <td class='goodsSubjectTd'>{$data['quantity']}</td>
              </tr>
              <tr>
                <td colspan='2'>
                  <a class='purchaseFunc' href='buyGoods.php?pNum={$data['num']}'>바로구매</a>
                  <a class='purchaseFunc' href='insertWishList.php?pNum={$data['num']}'>장바구니</a>
                </td>
              </tr>
            </table>
          </div>
        </div>

      ");
      echo ("<div id='funcBtn'>");
      if($_SESSION['userid'] == $data['id']){
        //수정 삭제

        echo ("<a class='purchaseFunc' href='./modifyGoodsFrame.php?pNum={$pNum}'>수정</a>");
        echo ("<a class='purchaseFunc' href='./deleteGoods.php?pNum={$pNum}'>삭제</a>");
      }
      echo ("<a class='purchaseFunc' href='./goodsListFrame.php'>목록</a>");
      echo ("
        <div id='goodsContentDiv'>
          {$data['content']}
        </div>
      </div>");

      }
    // 상품글의 번호로 해당글의 리뷰를 보여줌
    function showReviewContents($pNum){
      $sql = "SELECT parent,content,regist_day,id,nick ";
      $sql.= "FROM goodsReview WHERE parent = :parent";
      $this->dbm->useSql($sql,[":parent" => $pNum]);
      $allData = $this->dbm->sttFetchAllAssoc();
      foreach($allData as $data){
        echo ("
          <table align='center' id='reviewTable'>
            <tr>
              <td class='reviewContentfirstTd'>항목</td>
              <td>글쓴이 : {$data['id']}[{$data['nick']}] | 날짜 : {$data['regist_day']}
        ");
        if($data['id'] == $_SESSION['userid'])
          echo(" | <a href='./deleteReview.php?id={$data['id']}&date={$data['regist_day']}'>삭제</a>");
        echo("
              </td>
            </tr>
            <tr>
              <td class='reviewContentfirstTd'>내용</td>
              <td>{$data['content']}<td>
            </tr>
          </table>
        ");
      }

    }
    // 구매 상품 출력
    function showBuyList($userId){

      // 구매 상품 정보
      $sql = "SELECT b.id as buyer, b.num, g.title, g.price, g.mainImg FROM buyList b,goods g WHERE b.num = g.num AND b.id=:id";
      $this->dbm->useSql($sql,[":id" => $userId]);
      $data = $this->dbm->sttFetchAllAssoc();

      // 구매 상품 리스트 출력
      echo("
        <div id='buyListHeader'>
          구매 상품
        </div>
        <div id='buyListDiv'>
      ");
      foreach($data as $row){
        $imgDir = "./uploads/goodsData/".$row['num']."/data/".$row['mainImg'];  // 이미지 경로
        echo("
          <div class='buyInfoDiv'>
            <a href='./showGoodsFrame.php?pNum={$row['num']}' class='buyListLink'>
              <div class='buyInfoImg'><img src='{$imgDir}' width='100%' height='100%'></div>
              <div class='buyInfoContent'>상품명 : {$row['title']} <br> 가격 : {$row['price']}</div>
            </a>
          </div>
        ");
      }
      echo("
        </div>
      ");

    }
    // 장바구니 출력
    function showWishList($userId){
      // 장바구니 정보
      $sql = "SELECT w.id as buyer, w.num, g.title, g.price, g.mainImg FROM wishList w, goods g WHERE w.num = g.num AND w.id=:id";
      $this->dbm->useSql($sql,[":id" => $userId]);
      $data = $this->dbm->sttFetchAllAssoc();


      // 장바구니 리스트 출력
      echo("
        <div id='wishListHeader'>
          장바구니
        </div>
        <div id='wishListDiv'>
      ");
      foreach($data as $row){
        $imgDir = "./uploads/goodsData/".$row['num']."/data/".$row['mainImg'];  // 이미지 경로
        echo("
          <div class='wishInfoDiv'>
            <a href='./showGoodsFrame.php?pNum={$row['num']}' class='wishListLink'>
              <div class='wishListInfoImgDiv'><img src='{$imgDir}' height='100%' width='100%'></div>
              <div class='wishListInfoContentDiv'>상품명 : {$row['title']} <br> 가격 : {$row['price']} | <a class='wishListCancel' href='deleteWishList.php?pNum={$row['num']}'>취소</a></div>
            </a>
          </div>
        ");
      }
      // 총 금액
      $priceSum = 0;
      foreach($data as $row){
          $priceSum += $row['price'];
      }
      echo("
        </div>
        <div class='buyWishListDiv'>
          총 금액 : {$priceSum}
        </div>
      ");

    }
  }
?>
