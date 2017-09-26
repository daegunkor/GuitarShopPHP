<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../css/inputForm.css?var=<?=filemtime('../../css/inputForm.css')?>">
    <link rel="stylesheet" href="../../css/loginPop.css?var=<?=filemtime('../../css/loginPop.css')?>">
    <script>
    function setEmail(){
      var emailListArray = new Array();
      emailListArray['naver'] = "naver.com";
      emailListArray['daum'] = "daum.net";
      emailListArray['yahoo'] = "yahoo.co.kr";
      emailListArray['google'] = "google.com";
      emailListArray['ldghome'] = "ldghome.co.us";
      emailListArray['cyworld'] = "cyworld.com";
      emailListArray['typing'] = "";


      var selectedValue = document.searchIdForm.emailInputSelect.value;
      var emailInput = document.searchIdForm.emailInput2;
      emailInput.value = emailListArray[selectedValue];

      if (selectedValue == 'typing') {
        emailInput.readOnly = false;
        emailInput.style.backgroundColor = "#FFFFFF";
      } else {
        emailInput.readOnly = true;
        emailInput.style.backgroundColor = "#BDBDBD";
      }
    }
    </script>
  </head>
  <body>
    <?php
      $searchId = '';
      if(isset($_GET['searchId'])){
        $searchId = $_GET['searchId'];
      }
    ?>
    <form name="searchIdForm" action="./searchPass.php" method="post">
      <table class ="searchLoginTable" align='center'>
        <tr>
          <td colspan=2 class='searchLoginTitle'>비밀번호 정보 찾기</td>
        </tr>
        <tr>
          <td>아이디는?</td>
          <td><input size='8' type="text" name="idInput" value="<?=$searchId?>"></td>
        </tr>
        <tr>
          <td>당신의 전화번호는?</td>
          <td>
            <select name="hpInput1">
              <option value="010">010</option>
              <option value="011">011</option>
              <option value="016">016</option>
              <option value="017">017</option>
              <option value="018">018</option>
              <option value="019">019</option>
            </select>
            - <input size='4' type="text" name="hpInput2">
            - <input size='4' type="text" name="hpInput3">
          </td>
        </tr>

        <tr>
          <td>당신의 이메일은?</td>
          <td>
            <input size='10' type="text" name="emailInput1"> @
            <select name="emailInputSelect" onchange="setEmail()">
              <option value="naver">네이버</option>
              <option value="daum">다음</option>
              <option value="yahoo">야후</option>
              <option value="google">구글</option>
              <option value="ldghome">대건홈</option>
              <option value="cyworld">싸이월드</option>
              <option value="typing">직접입력</option>
            </select>
            <input size='10' type="text" id="emailInput2" name="emailInput2" readonly="readonly" value="naver.com">
          </td>
        </tr>
        <tr>
          <td colspan='2'><input type="submit" value="비밀번호 찾기"></td>
        </tr>
      </table>
    </form>

  </body>
</html>
