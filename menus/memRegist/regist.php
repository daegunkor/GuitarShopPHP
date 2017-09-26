<?php
  session_start();

  $idInput      = $_POST['idInput'];
  $passInput    = $_POST['passInput'];
  $passConfirm  = $_POST['passConfirm'];
  $nameInput    = $_POST['nameInput'];
  $nickInput    = $_POST['nickInput'];
  $hpInput1     = $_POST['hpInput1'];
  $hpInput2     = $_POST['hpInput2'];
  $hpInput3     = $_POST['hpInput3'];
  $hpTotal      = $hpInput1.'-'.$hpInput2.'-'.$hpInput3;
  $emailInput1  = $_POST['emailInput1'];
  $emailInput2  = $_POST['emailInput2'];
  $emailTotal   = $emailInput1.'@'.$emailInput2;

  //아이디 중복검사 실시 확인
  if(!isset($_SESSION['idDupliCheck']) || $_SESSION['idDupliCheck']!= $idInput){
    unset($_SESSION['idDupliCheck']);
    unset($_SESSION['nickDupliCheck']);
    echo ("
      <script>
        alert('아이디 중복검사 미실시');
        history.go(-1);
      </script>
    ");
  }
  //닉네임 중복검사 실시 확인
  if(!isset($_SESSION['nickDupliCheck']) || $_SESSION['nickDupliCheck'] != $nickInput){
    unset($_SESSION['idDupliCheck']);
    unset($_SESSION['nickDupliCheck']);
    echo ("
      <script>
        alert('닉네임 중복검사 미실시');
        history.go(-1);
      </script>
    ");
  }
  // 비밀번호 확인
  if($passInput != $passConfirm){
    echo ("
      <script>
        alert('비밀번호가 틀렸습니다');
        history.go(-1);
      </script>
    ");
  }
  // 입력확인
  if($idInput == ''){
    echo ("
      <script>
        alert('아이디를 입력하세요.');
        history.go(-1);
      </script>
    ");
  } else if($passInput == '') {
    echo ("
      <script>
        alert('비밀번호를 입력하세요.');
        history.go(-1);
      </script>
    ");
  } else if($passConfirm == '') {
    echo ("
      <script>
        alert('비밀번호 확인란을 입력하세요.');
        history.go(-1);
      </script>
    ");
  } else if($nickInput == '') {
    echo ("
      <script>
        alert('닉네임을 입력하세요.');
        history.go(-1);
      </script>
    ");
  } else if(
    $hpInput1 == '' ||
    $hpInput2 == '' ||
    $hpInput3 == ''
  ) {
    echo ("
      <script>
        alert('핸드폰 번호를 입력하세요.');
        history.go(-1);
      </script>
    ");
  } else if(
    $emailInput1 == '' ||
    $emailInput2 == ''
  ){
    echo ("
      <script>
        alert('이메일을 입력하세요.');
        history.go(-1);
      </script>
    ");
  } else {
    // 멤버 등록
    require_once "../cls/dbManager.php";
    $dbm = new DBManager();
    $sql = "INSERT INTO users(id, password, name, nick, hp, email)";
    $sql.= "VALUES(:id, :password, :name, :nick, :hp, :email);";
    $dbm->useSql($sql,[
      ':id'       =>  $idInput,
      ':password' =>  $passInput,
      ':name'     =>  $nameInput,
      ':nick'     =>  $nickInput,
      ':hp'       =>  $hpTotal,
      ':email'    =>  $emailTotal
    ]);
    echo ("
      <script>
        alert('회원가입을 축하드립니다!');
        location.href('../../index.php');
      </script>
    ");
  }

?>
