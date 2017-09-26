<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../css/inputForm.css?var=75">
    <script>
      function moveBack(){
        history.go(-1);
      }
    </script>
  </head>
  <body>
    <?php
      require_once "./cls/IdPassSearcher.php";
      $idInput = $_POST['idInput'];
      $hpTotal = $_POST['hpInput1']."-".$_POST['hpInput2']."-".$_POST['hpInput3'];
      $emailTotal = $_POST['emailInput1']."@".$_POST['emailInput2'];

      $IdPassSearcher = new IdPassSearcher();

      $result = $IdPassSearcher->searchPass($idInput, $hpTotal, $emailTotal);
    ?>
      <form action ="changePass.php?inputId=<?=$idInput?>" method="post">


        <table id='resultIdTable'>
          <tr>
            <td colspan="2">비밀번호 변경</td>
          </tr>
      <?php
        if($result == false){
          echo "<tr><td colspan='2'>아이디 결과가 없습니다.</td></tr>";
        } else {
          echo ("
            <tr>
              <td>변경할 비밀번호</td>
              <td><input type='password' name='changePass'></td>
            </tr>
            <tr>
              <td>비밀번호 확인</td>
              <td><input type='password' name='changePassCheck'></td>
            </tr>
          ");
        }
        echo "<tr><td colspan='2'><input type='submit' value='비밀번호 변경'></td></tr>";
        echo "<tr><td colspan='2'><button type='button' onClick='moveBack()'>되돌아가기</button></td></tr>";
      ?>
        </table>
      </form>

  </body>
</html>
