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
      $hpTotal = $_POST['hpInput1']."-".$_POST['hpInput2']."-".$_POST['hpInput3'];
      $emailTotal = $_POST['emailInput1']."@".$_POST['emailInput2'];

      $IdPassSearcher = new IdPassSearcher();

      $result = $IdPassSearcher->searchId($hpTotal, $emailTotal);
    ?>
      <table id='resultIdTable'>
        <tr>
          <td colspan="2">아이디 검색 결과</td>
        </tr>
    <?php
      if($result == false){
        echo "<tr><td colspan='2'>아이디 결과가 없습니다.</td></tr>";
      } else {

        foreach($result as $row){
          echo "<tr>";
          echo "<td>{$row}</td> ";
          echo "<td><a href='../searchIdPass/searchPassForm.php?searchId={$row}'>비밀번호 찾기</a></td>";
          echo "</tr>";
        }

      }

      echo "<tr><td colspan='2'><button type='button' onClick='moveBack()'>되돌아가기</button></td></tr>";
    ?>
      </table>
  </body>
</html>
