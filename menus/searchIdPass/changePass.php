<script>
  function moveBack(){
    history.go(-1);
  }
  function closeWin(){
    window.close();
  }
</script>

<?php

  require_once "./cls/IdPassSearcher.php";

  $inputId = $_GET['inputId'];
  $inputPass = $_POST['changePass'];
  $inputPassCheck = $_POST['changePassCheck'];

  $searcher = new IdPassSearcher();

  if($inputPass != $inputPassCheck){
    echo ("
      <script>
        alert('비밀번호가 잘못되었습니다.');
        history.go(-1);
      </script>
    ");
  }

  if($searcher->changePass($inputId, $inputPass)){
    echo "비밀번호가 정상적으로 변경되었습니다.<br>";
  } else {
    echo "비밀번호 변경에 실패했습니다.<br>";
    echo "<button type='button' name='moveBack' onClick='moveBack()'>되돌아가기</button>";
  }

?>
  <button type="button" name="close" onClick="closeWin()">창닫기</button>
