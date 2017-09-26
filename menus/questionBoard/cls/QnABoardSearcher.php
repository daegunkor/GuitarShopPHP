<?php
  require_once "../cls/DBManager.php";
  class QnABoardSearcher{
    var $dbm;

    function __construct(){
      $this->dbm = new DBManager();
    }

    // 표시할 게시글 갯수에 따른 페이지수 계산
    function getTotalPageCnt($maxQCnt){
      $sql = "SELECT * FROM qBoardQuestion ORDER BY num DESC";
      $this->dbm->useSql($sql,[]);
      $this->dbm->sttFetchAllAssoc();
      $rowCount = $this->dbm->rowCount();

      // 페이지의 수 계산
      if($rowCount % $maxQCnt == 0)
        $totalPageCnt = floor($rowCount / $maxQCnt);
      else
        $totalPageCnt = floor($rowCount / $maxQCnt) + 1;
      return $totalPageCnt;
    }
    // 게시글 번호로 아이디를 가져온다
    function getUserIdByQNum($qNum){
      $sql = "SELECT id FROM qBoardQuestion WHERE num = :num";
      $this->dbm->useSql($sql,[":num"=> $qNum]);
      $result = $this->dbm->sttFetchAssoc();
      return $result['id'];
    }
    // 다음에 써질 질문글의 번호를 가져온다
    function getHighCnt(){
      $sql = "SELECT num FROM qBoardQuestion ORDER BY num DESC";
      $this->dbm->useSql($sql,[]);
      $result = $this->dbm->sttFetchAssoc();
      $num = $result['num'];
      return $num;
    }

    // 글번호로 질문글의 정보를 가져온다
    function getInfoByQNum($qNum){
      $sql = "SELECT * FROM qBoardQuestion WHERE num = :num";
      $this->dbm->useSql($sql,["num" => $qNum]);
      $row = $this->dbm->sttFetchAssoc();
      return $row;
    }
  }
?>
