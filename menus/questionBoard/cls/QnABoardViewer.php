<?php
  require_once "../cls/DBManager.php";
  class QnABoardViewer{
    var $dbm;

    function __construct(){
      $this->dbm = new DBManager();
    }

    // 테이블을 출력
    function showQnATable($start, $number){
      $sql = "SELECT num,title,regist_day,hit,nick,norFile ";
      $sql.= "FROM qBoardQuestion ORDER BY num DESC";
      $this->dbm->useSql($sql,[]);
      $data = $this->dbm->sttFetchAllAssoc();
      $dataDir = "./uploads/questionData/";

      echo ("
        <table id='QnABoardTable' align='center'>
          <tr class='QnABoardTableTr' id='QnATableField'>
            <td id='QnANum'>번호</td>
            <td id='QnATitle'>제목</td>
            <td id='QnADate'>날짜</td>
            <td id='QnAHit'>조회수</td>
            <td id='QnAWriter'>글쓴이</td>
            <td id='QnAFile'>첨부</td>
          </tr>
      ");

      for($i = $start; $i <= $number; $i++){
        if(isset($data[$i])){
          echo("
            <tr class='QnABoardTableTr' id='QnATableRecordTr'>
              <td class='QnATableRecord'>{$data[$i]['num']}</td>
              <td class='QnATableRecord'><a href='./showQuestionFrame.php?qNum={$data[$i]['num']}'>{$data[$i]['title']}</a></td>
              <td class='QnATableRecord'>{$data[$i]['regist_day']}</td>
              <td class='QnATableRecord'>{$data[$i]['hit']}</td>
              <td class='QnATableRecord'>{$data[$i]['nick']}</td>
             ");
          if($data[$i]['norFile'] != "")
            echo ("
                <td class='QnATableRecord'><a href='./downloadNorFile.php?fileName={$data[$i]['norFile']}&qNum={$data[$i]['num']}'><img src='../../img/disk.jpg' width='20' height='20'></a></td>
              </tr>
            ");
          else
            echo ("
                <td></td>
              </tr>
            ");
        }
      }

      echo ("</table>");
    }
    // 페이지 인덱스 생성
    function showQnaPageIndex($startPage, $curPage, $endPage){
      // ◀이전 12<b><u>3</u></b>45다음▶
      $frontArea = 2;
      $backArea = 2;
      // 이전 페이지가 2개를 초과하지 않으면 이전 버튼 없음 1..
      if($curPage > $startPage){
        $goFront = $curPage-1;
        echo "<a href='questionBoardFrame.php?page={$goFront}'>◀이전 </a>";
      }

      // 현재 페이지로부터 앞뒤로 2개씩 번호 출력
      for($i = $startPage; $i <= $endPage; $i++){
        if($i == $curPage)
          echo "<b><u>$i</u></b>";
        else if(($curPage-$frontArea) <= $i && $i <= ($curPage+$backArea))
          echo "<a href='questionBoardFrame.php?page={$i}'> {$i} </a>";
      }
      // 다음 페에지가 2개를 초과하지 않으면 다음 버튼 없음 ..endPage
      if($endPage > $curPage){
        $goBack = $curPage+1;
        echo "<a href='questionBoardFrame.php?page={$goBack}'> 다음▶</a>";
      }

    }
    // 해당 번호의 게시글의 컨텐츠 보여줌
    function showQuestionContents($qNum){
      $sql = "SELECT num,title,content,regist_day,hit,id,nick,norFile ";
      $sql.= "FROM qBoardQuestion WHERE num = :num";
      $this->dbm->useSql($sql,[":num" => $qNum]);
      $data = $this->dbm->sttFetchAssoc();
      echo ("
        <table align='center' id='QnAContentTable'>
          <tr>
            <td class='QnAContentfirstTd'>제목</td>
            <td class='QnASubjectTd'>{$data['title']}</td>
          </tr>
          <tr>
            <td class='QnAContentfirstTd'>항목</td>
            <td class='QnASubjectTd'>글쓴이 : {$data['nick']} | 날짜 : {$data['regist_day']} | 조회수 : {$data['hit']}</td>
          </tr>
          <tr>
      ");
      if($data['norFile'] == "")
        echo("
            <td class='QnAContentfirstTd'>자료</td>
            <td class='QnASubjectTd'>자료없음</td>
          </tr>
        ");
      else
        echo("
            <td class='QnAContentfirstTd'>자료</td>
            <td class='QnASubjectTd'><a href='./downloadNorFile.php?qNum={$qNum}&fileName={$data['norFile']}'>{$data['norFile']}</a></td>
          </tr>
        ");
      echo("
          <tr>
            <td class='QnAContentfirstTd'>내용</td>
            <td>{$data['content']}<td>
          </tr>
        </table>
      ");
      echo("<div id='QnAContentfuncDiv'>");
      if($_SESSION['userid'] == $data['id']){
        //수정 삭제
        echo ("<a href='./modifyQuestionFrame.php?qNum={$qNum}'>수정</a>");
        echo ("<a href='./deleteQuestion.php?qNum={$qNum}'>삭제</a>");
      }
      echo ("<a href='./writeAnswerFrame.php?qNum=$qNum'>답변달기</a>");
      echo("<a href='./questionBoardFrame.php'>목록</a>");
      echo("</div>");
    }
    // 질문글의 번호로 해당글의 답변을 보여줌
    function showAnswerContents($ansNum){
      $sql = "SELECT parent,title,content,regist_day,id,nick ";
      $sql.= "FROM qBoardAnswer WHERE parent = :parent";
      $this->dbm->useSql($sql,[":parent" => $ansNum]);
      $allData = $this->dbm->sttFetchAllAssoc();
      foreach($allData as $data){
        echo ("
          <table id='answerTable' align='center'>
            <tr>
              <td class='answerfirstTd'>제목</td>
              <td class='answerSubjectTd'>{$data['title']}</td>
            </tr>
            <tr>
              <td class='answerfirstTd'>항목</td>
              <td class='answerSubjectTd'>글쓴이 : {$data['id']}[{$data['nick']}] | 날짜 : {$data['regist_day']}
            ");
        if($data['id'] == $_SESSION['userid'])
          echo(" | <a href='./deleteAnswer.php?id={$data['id']}&date={$data['regist_day']}'>삭제</a>");
        echo ("
              </td>
            </tr>
            <tr>
              <td class='answerfirstTd'>내용</td>
              <td>{$data['content']}<td>
            </tr>
          </table>
        ");
      }

    }
  }
?>
