<?php

  require_once '../cls/UserInfoGetter.php';

  $userId = $_SESSION['userid'];
  $date = date("Y-m-d H:i:s");

  // 유저의 정보를 DB로부터 가져오는 클래스
  $uif = new UserInfoGetter();

  // 유저의 아이디로 정보를 가져온다
  $info = $uif->getInfoById($userId);
  $nick = $info['nick'];

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
    window.open('./popImgUpload.php','QnAImgUpload',popOption);
  }
</script>

<!--질문글 업로드 폼-->
<form enctype="multipart/form-data" action="./uploadQuestion.php" method="post">
  <table id='QuestionWriteTable' align='center'>
    <tr>
      <td class='questionWritefirstTd'>제목</td>
      <td>&nbsp;&nbsp;<input type="text" name="titleInput" size='100'></td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>글쓴이</td>
      <td>&nbsp;&nbsp;<?=$userId."[{$nick}]"?></td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>내용</td>
      <td>
        <div id="contentDiv" contenteditable="true" ></div>
        <textarea id="divCopyHidden" name="content" style="display:none"></textarea>
      </td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>이미지 첨부</td>
      <td>&nbsp;&nbsp;<input type="button" value="이미지 업로드" onclick="popImgUploadWindow()" /></td>
    </tr>
    <tr>
      <td class='questionWritefirstTd'>파일첨부</td>
      <td>&nbsp;&nbsp;<input type="file" name="fileUpload"></td>
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
