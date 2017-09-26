<?php
  require_once "../cls/DBManager.php";
  class UserInfoGetter {
    var $dbm;
    function __construct(){
      $this->dbm = new DBManager();
    }

    //해당 아이디의 정보(1명)을 반환
    function getInfoById($argId){
      $sql = "SELECT nick FROM users WHERE id = :id";
      $this->dbm->useSql($sql,["id" => $argId]);
      $row = $this->dbm->sttFetchAssoc();
      return $row;
    }
  }
?>
