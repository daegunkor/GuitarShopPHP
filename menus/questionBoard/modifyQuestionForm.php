<?php

  require_once '../cls/UserInfoGetter.php';
  require_once './cls/QnABoardSearcher.php';

  $userId = $_SESSION['userid'];
  $date = date("Y-m-d H:i:s");

  // 유저의 정보를 DB로부터 가져오는 클래스
  $uif = new UserInfoGetter();
  $scr = new QnABoardSearcher();

  // 유저의 아이디로 정보를 가져온다
  $info = $uif->getInfoById($userId);
  $nick = $info['nick'];

  // 수정 글 번호
  $qNum = $_GET['qNum'];

  // 해당 글의 글쓴이가 맞는지 확인
  if($_SESSION['userid'] != $scr->getUserIdByQNum($qNum)){
    echo ("
      <script>
        alert('잘못된 접근입니다.');
        history.go(-1);
      </script>
    ");
  }

  // 수정전 제목, 내용, 파일첨부 내용
  $questionInfo = $scr->getInfoByQNum($qNum);
  $lastTitle = $questionInfo['title'];
  $lastContent = $questionInfo['content'];
  $lastNorFile = $questionInfo['norFile'];

?>

<script>
  // content내 내용을 hidden태그로 복사
  function copyDivToHidden(){
    var contentDir = document.getElementById("contentDiv");
    var hiddenInput = document.getElementById("divCopyHidden");
    hiddenInput.value = contentDir.innerHTML;
  }
  // Content 내 내용 제거
  function resetContent(){
    var contentDir = document.getElementById("contentDiv");
    contentDir.innerHTML = "";
  }

  function popImgUploadWindow(){
    var popOption = 'top=' + (screen.availHeight/2-511/2) + ', left=' + (screen.availWidth/2-700/2) + ', width=500, height=400';
    window.open('./popImgUpload.php','wrongLogin',popOption);
  }
</script>

<!--질문글 업로드 폼-->
<form enctype="multipart/form-data" action="./modifyQuestion.php?qNum=<?=$qNum?>" method="post">
  <table id='QuestionWriteTable' align='center'>
    <tr>
      <td class='questionWritefirstTd'>제목</td>
      <td>&nbsp;&nbsp;<input type="text" name="titleInput" value="<?=$lastTitle?>" size='100'></td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>글쓴이</td>
      <td>&nbsp;&nbsp;<?=$userId."[{$nick}]"?></td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>내용</td>
      <td>
        <div id="contentDiv" contenteditable="true" style="border:solid 1px black"><?=$lastContent?></div>
        <textarea id="divCopyHidden" name="content" style="display:none"></textarea>
      </td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>이미지 첨부</td>
      <td>&nbsp;&nbsp;<input type="button" value="이미지 업로드" onclick="popImgUploadWindow()" /></td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>파일첨부</td>
      <td>
        &nbsp;&nbsp;수정하지 않으시면 전의 파일로 유지됩니다.<br>
        &nbsp;&nbsp;<input type="file" name="fileUpload">
      </td>
    </tr>
    <tr>
      <td colspan='2' id='imageUploadList'></td>
    </tr>
  </table>
  <div id ='questionWritefuncDiv'>
    <input type="submit" onclick="copyDivToHidden()" value="글쓰기">
    <input type="reset" onclick="resetContent()" value="다시쓰기">
  </div>
</form>
