<?php

  require_once "../cls/DBManager.php";
  // QnA 게시판의 작성, 수정, 삭제
  class QnABoardWriter {
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
    function writeQuestionBoard($uploadArr){
      $sql = "INSERT INTO qBoardQuestion(num,title,content,regist_day,hit,id,nick,norFile)";
      $sql.= "VALUES (:num,:title,:content,:regist_day,:hit,:id,:nick,:norFile)";

      $this->dbm->useSql($sql,[
        ":num"          => $uploadArr['num'],
        ":title"        => $uploadArr['title'],
        ":content"      => $uploadArr['content'],
        ":regist_day"   => $uploadArr['registDay'],
        ":hit"          => 0,
        ":id"           => $uploadArr['id'],
        ":nick"         => $uploadArr['nick'],
        ":norFile"      => $uploadArr['norFile']
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
    function writeAnswer($data){
      $sql = "INSERT INTO qBoardAnswer(parent,title,content,regist_day,id,nick)";
      $sql.= "VALUES (:parent,:title,:content,:regist_day,:id,:nick)";


      $this->dbm->useSql($sql,[
        ":parent"          => $data['parent'],
        ":title"           => $data['title'],
        ":content"         => $data['content'],
        ":regist_day"      => $data['date'],
        ":id"              => $data['id'],
        ":nick"            => $data['nick']

      ]);

    }
    // 질문 삭제
    function deleteQuestion($qNum){
      $sql = "DELETE FROM qBoardQuestion WHERE num = :num";
      $this->dbm->useSql($sql,[":num" => $qNum]);
    }
    // 질문 수정
    function modifyQuestion($qNum,$data){
      $sql = "UPDATE qBoardQuestion SET ";
      $sql.= "title = :title, ";
      $sql.= "content = :content, ";
      $sql.= "norFile = :norFile, ";
      $sql.= "regist_day = :regist_day ";
      $sql.= "WHERE num = :num";

      $this->dbm->useSql($sql,[
        ":title"      => $data['title'],
        ":content"    => $data['content'],
        ":regist_day" => $data['date'],
        ":norFile"    => $data['norFile'],
        ":num"        => $qNum
      ]);
    }
    // 해당 부모글 번호의 댓글을 모두 지움
    function deleteAnswer($pNum){
      $sql = "DELETE FROM qBoardAnswer WHERE parent = :parent";
      $this->dbm->useSql($sql,[":parent" => $pNum]);
    }
    // 해당 아이디, 날짜에 해당하는 댓글을 삭제
    function cancelAnswer($id, $date){
      $sql = "DELETE FROM qBoardAnswer WHERE id=:id AND regist_day=:regist_day";
      $this->dbm->useSql($sql,[
        ":id" => $id,
        ":regist_day" => $date
      ]);
    }

    // 조회수 1증가
    function hitUpper($qNum){
      // 글의 조회수 검색
      $sql = "SELECT hit FROM qBoardQuestion WHERE num = :num";
      $this->dbm->useSql($sql,[":num" => $qNum]);
      $data = $this->dbm->sttFetchAssoc();
      $hit = $data['hit'];
      $hit++;

      $sql = "UPDATE qBoardQuestion SET hit = :hit WHERE num = :num";
      $this->dbm->useSql($sql,[
        ":hit" => $hit,
        ":num" => $qNum
      ]);
    }
  }
?>
