<?php

  require_once "../cls/DBManager.php";
  require_once "./cls/GoodsSearcher.php";
  // QnA 게시판의 작성, 수정, 삭제
  class GoodsWriter {
    var $dbm;
    function __construct(){
      $this->dbm  = new DBManager;
    }
    /*
      질문글쓰기
      인자배열
        - 타이틀     title
        - 컨텐츠     content
        - 날짜       registDay
        - 아이디     id
        - 닉네임     nick
        - 일반 파일  norFile (파일명만)
    */
    function registGoods($uploadArr){
      $sql = "INSERT INTO goods(num,title,name,content,price,quantity,regist_day,id,nick,mainImg)";
      $sql.= "VALUES (:num,:title,:name,:content,:price,:quantity,:regist_day,:id,:nick,:mainImg)";

      $this->dbm->useSql($sql,[
        ":num"          => $uploadArr['num'],
        ":title"        => $uploadArr['title'],
        ":name"         => $uploadArr['name'],
        ":content"      => $uploadArr['content'],
        ":price"        => $uploadArr['price'],
        ":quantity"     => $uploadArr['quantity'],
        ":regist_day"   => $uploadArr['regist_day'],
        ":id"           => $uploadArr['id'],
        ":nick"         => $uploadArr['nick'],
        ":mainImg"      => $uploadArr['mainImg']
      ]);

    }
    /*
      답글쓰기
      인자배열
        - 답들 대상글  parent
        - 타이틀       title
        - 컨텐츠       content
        - 날짜         date
        - 아이디       id
        - 닉네임       nick
    */
    function writeReview($data){
      $sql = "INSERT INTO goodsReview(parent,content,regist_day,id,nick) ";
      $sql.= "VALUES (:parent,:content,:regist_day,:id,:nick)";


      $this->dbm->useSql($sql,[
        ":parent"          => $data['parent'],
        ":content"         => $data['content'],
        ":regist_day"      => $data['date'],
        ":id"              => $data['id'],
        ":nick"            => $data['nick']

      ]);

    }
    // 상품글 삭제
    function deleteGoods($pNum){
      $sql = "DELETE FROM goods WHERE num = :num";
      $this->dbm->useSql($sql,[":num" => $pNum]);
    }
    // 상품글 수정
    function modifyGoods($pNum,$data){
      $sql = "UPDATE goods SET ";
      $sql.= "title       = :title, ";
      $sql.= "name        = :name, ";
      $sql.= "price       = :price, ";
      $sql.= "quantity    = :quantity, ";
      $sql.= "content     = :content, ";
      $sql.= "mainImg     = :mainImg, ";
      $sql.= "regist_day  = :regist_day ";
      $sql.= "WHERE num   = :num";

      // 자료가 빈칸인 경우 이전값
      if($data['mainImg'] == ''){
        $gsr = new GoodsSearcher();
        $lastData = $gsr->getInfoByPNum($pNum);
        $data['mainImg'] = $lastData['mainImg'];
      }



      $this->dbm->useSql($sql,[
        ":title"      => $data['title'],
        ":name"       => $data['name'],
        ":price"      => $data['price'],
        ":quantity"   => $data['quantity'],
        ":content"    => $data['content'],
        ":regist_day" => $data['date'],
        ":mainImg"    => $data['mainImg'],
        ":num"        => $pNum
      ]);
    }
    // 해당 부모글 번호의 댓글을 모두 지움
    function deleteReview($pNum){
      $sql = "DELETE FROM goodsReview WHERE parent = :parent";
      $this->dbm->useSql($sql,[":parent" => $pNum]);
    }

    // 해당 아이디, 날짜에 해당하는 댓글을 삭제
    function cancelReview($id, $date){
      $sql = "DELETE FROM goodsReview WHERE id=:id AND regist_day=:regist_day";
      $this->dbm->useSql($sql,[
        ":id" => $id,
        ":regist_day" => $date
      ]);
    }
    // 상품 구매 (갯수 0이하일시 구매실패)
    function buyGoods($id, $pNum){
      // 상품의 기존 수량
      $sql = "SELECT quantity FROM goods WHERE num = :num";
      $this->dbm->useSql($sql,[":num" => $pNum]);
      $data = $this->dbm->sttFetchAssoc();
      $lastQuantity = $data['quantity'];

      // 상품수량이 0일경우 false
      if($lastQuantity <= 0)
        return false;

      // 상품 수량 수정
      $sql = "UPDATE goods SET quantity = :quantity WHERE num = :num";
      $this->dbm->useSql($sql,[
        ":quantity" => ($lastQuantity-1),
        ":num" => $pNum
      ]);

      // 구매자의 구매항목 추가
      $sql = "INSERT INTO buyList(id, num) VALUES(:id,:num);";
      $this->dbm->useSql($sql,[
        ":id"    => $id,
        ":num"   => $pNum
      ]);
      // 정상 구매시 true
      return true;
    }

    // 구매자의 구매항목 추가
    function insertWishList($id, $pNum){
      $sql = "INSERT INTO wishList(id, num) VALUES(:id,:num);";
      $this->dbm->useSql($sql,[
        ":id"    => $id,
        ":num"   => $pNum
      ]);
    }
    function deleteWishList($id, $pNum){
      $sql = "DELETE FROM wishList WHERE id=:id AND num=:num";
      $this->dbm->useSql($sql,[
        ":id"   => $id,
        ":num"  => $pNum
      ]);
    }

  }
?>
