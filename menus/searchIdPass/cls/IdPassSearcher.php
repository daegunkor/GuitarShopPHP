<?php

require_once "../cls/DBManager.php";
class IdPassSearcher{

  // 핸드폰번호, 이메일 입력 시 해당 아이디 반환
  function searchId($argHp, $argEmail){
    $dbm = new DBManager();
    $idResultArray = array();
    $sql = "SELECT id FROM users WHERE hp = :hp AND email = :email";
    $dbm->useSql($sql,[
      ":hp" => $argHp,
      ":email" => $argEmail
    ]);

    // 결과가 없으면 false 반환
    if($dbm->rowCount() == 0){
      return false;
    }
    // 아이디 결과를 배열에 저장
    for($i = 0; ($row = $dbm->sttFetchAssoc()); $i++){
      $idResultArray[$i] = $row['id'];
    }

    return $idResultArray;
  }
  function searchPass($argId, $argHp, $argEmail){
    $dbm = new DBManager();
    $idResultArray = array();
    $sql = "SELECT password FROM users WHERE id = :id AND hp = :hp AND email = :email";
    $dbm->useSql($sql,[
      ":id" => $argId,
      ":hp" => $argHp,
      ":email" => $argEmail
    ]);

    // 결과가 없으면 false 반환
    if($dbm->rowCount() == 0){
      return false;
    }

    return true;
  }

  function changePass($argId, $argPass){
    $dbm = new DBManager();
    $sql = "UPDATE users SET password=:password WHERE id = :id";
    $result = $dbm->useSql($sql,[
      ":password" => $argPass,
      ":id" => $argId
    ]);

    return $result;
  }
}





?>
