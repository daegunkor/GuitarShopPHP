<?php
  session_start();
  $userid = $_POST['userid'];
  $userpass = $_POST['userpass'];

  //DB에서 아이디 체크 클래스
  require_once "../cls/IdChecker.php";

  //아이디 판단
  $idChecker = new IdChecker();
  if($userid =='' || $userpass ==''){
    // 아이디,비밀번호 공백 처리
    echo("
      <script>
        window.alert('로그인 값이 입력되지 않았습니다.');
        history.go(-1);
      </script>
    ");
  }else if($idChecker->checkId($userid, $userpass)){
    // 참 -> 사용자 정보 세션 + 인덱스로 복귀
    $_SESSION['userid'] = $userid;
    header("location:../../index.php");
  } else {
    // 거짓 -> 로그인창 팝업
    echo ("
      <script>
        alert('비밀번호가 틀렸습니다.');
        var popOption = 'top=' + (screen.availHeight/2-511/2) + ', left=' + (screen.availWidth/2-700/2) + ', width=500, height=400';
        history.go(-1);
        window.open('../wrongLogin.php','wrongLogin',popOption);
      </script>
    ");
  }

?>
