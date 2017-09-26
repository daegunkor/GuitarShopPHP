<?php

  require_once '../cls/UserInfoGetter.php';

  $userId = $_SESSION['userid'];

  // 유저의 정보를 DB로부터 가져오는 클래스
  $uif = new UserInfoGetter();

  // 유저의 아이디로 정보를 가져온다
  $info = $uif->getInfoById($userId);
  $nick = $info['nick'];

?>

<!--상품글 업로드 폼-->
<form action="./writeReview.php" method="post">
  <div id="writeReviewDiv">
    <?=$userId."[{$nick}]"?>
    <table id='writeReviewTable' align='center'>
      <tr>
        <td>내용</td>
        <td>
          <textarea name="content" id='reviewTextArea' cols='50'></textarea>
        </td>
        <td> <input type="submit" value="리뷰작성"></td>
      </tr>
    </table>
  <input type="hidden" name="pNum" value="<?=$_GET['pNum']?>">
  <input type="hidden" name="userid" value="<?=$userId?>">
  <input type="hidden" name="nick" value="<?=$nick?>">
  </div>
</form>
