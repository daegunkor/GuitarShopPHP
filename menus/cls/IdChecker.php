<?php
  // DBManager 호출
  require_once "../cls/DBManager.php";
  class IdChecker{
    //해당 아이디,비밀번호정보가 일치하는지 판단후 참/거짓 반환
    function checkId($userid, $userpass){
      $dbm = new DBManager();
      $sql = "SELECT password FROM users WHERE id = :userid";
      $dbm->useSql($sql,[':userid'=>$userid]);
      $row = $dbm->sttFetchAssoc();
      if($row['password'] == $userpass)
        return true;
      else
        return false;
    }
    //해당 아이디의 중복 여부 확인후 참(중복)/거짓 반환
    function idDupliCheck($inputId){
      $dbm = new DBManager();
      $sql = "SELECT id FROM users WHERE id = :inputId";
      $dbm->useSql($sql,[':inputId'=>$inputId]);
      if($dbm->rowCount() >= 1)
        return true;
      else
        return false;
    }

    //해당 아이디의 중복 여부 확인후 참(중복)/거짓 반환
    function nickDupliCheck($inputNick){
      $dbm = new DBManager();
      $sql = "SELECT nick FROM users WHERE nick = :inputNick";
      $dbm->useSql($sql,[':inputNick'=>$inputNick]);
      if($dbm->rowCount() >= 1)
        return true;
      else
        return false;
    }
  }


?>
