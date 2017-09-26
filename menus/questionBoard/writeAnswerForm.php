<?php

  require_once '../cls/UserInfoGetter.php';

  $userId = $_SESSION['userid'];

  // 유저의 정보를 DB로부터 가져오는 클래스
  $uif = new UserInfoGetter();

  // 유저의 아이디로 정보를 가져온다
  $info = $uif->getInfoById($userId);
  $nick = $info['nick'];

?>
<img src="" alt="">

<!--질문글 업로드 폼-->
<form action="./uploadAnswer.php" method="post">
  <table id='writeQuestionTable' align='center'>
    <tr>
      <td class='answerContentfirstTd'>제목</td>
      <td><input type="text" name="title" size='80'></td>
    </tr>
    <tr>
      <td class='answerContentfirstTd'>글쓴이</td>
      <td><?=$userId."[{$nick}]"?></td>
    </tr>
    <tr>
      <td class='answerContentfirstTd'>내용</td>
      <td>
        <textarea name="content" cols='80' rows='10'></textarea>
      </td>
    </tr>
  </table>
  <div class="registAnswerFunc">
    <input type="submit" value="글쓰기">
    <input type="reset" value="다시쓰기">
  </div>
  <input type="hidden" name="qNum" value="<?=$qNum?>">
  <input type="hidden" name="userid" value="<?=$userId?>">
  <input type="hidden" name="nick" value="<?=$nick?>">
</form>
<br>
