<script>
  // 이메일 셀렉트에 따른 값 설정
  function setEmail(){
    var emailListArray = new Array();
    emailListArray['naver'] = "naver.com";
    emailListArray['daum'] = "daum.net";
    emailListArray['yahoo'] = "yahoo.co.kr";
    emailListArray['google'] = "google.com";
    emailListArray['ldghome'] = "ldghome.co.us";
    emailListArray['cyworld'] = "cyworld.com";
    emailListArray['typing'] = "";


    var selectedValue = document.registInputForm.emailInputSelect.value;
    var emailInput = document.registInputForm.emailInput2;
    emailInput.value = emailListArray[selectedValue];

    if (selectedValue == 'typing') {
      emailInput.readOnly = false;
      emailInput.style.backgroundColor = "#FFFFFF";
    } else {
      emailInput.readOnly = true;
      emailInput.style.backgroundColor = "#BDBDBD";
    }


  }

  function idDupliCheck(){
    window.open("idDupliCheck.php?id="+document.registInputForm.idInput.value,"idCheckWindow",
    "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
  }

  function nickDupliCheck(){
    window.open("nickDupliCheck.php?nick="+document.registInputForm.nickInput.value,"idCheckWindow",
    "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
  }
</script>
<br>
<div id='memRegistTopBar'>
  회원가입
</div>
<br>
<div id="login_wrap">
  <form  name="registInputForm" action="./regist.php" method="post" >
    <table id='memRegistTable' align='center'>
      <tr>
        <td class='memRegistfirstTd'>아이디</td>
        <td class='memRegistTd'>
          <input type="text" name="idInput" value="">
          <a class='dupliBtn' href='#' onclick = 'idDupliCheck()'>중복확인</a>
        </td>
      </tr>
      <tr>
        <td class='memRegistfirstTd'>비밀번호</td>
        <td class='memRegistTd'><input type="password" name="passInput" value=""></td>
      </tr>
      <tr>
        <td class='memRegistfirstTd'>비밀번호 확인</td>
        <td class='memRegistTd'><input type="password" name="passConfirm" value=""></td>
      </tr>
      <tr>
        <td class='memRegistfirstTd'>이름</td>
        <td class='memRegistTd'><input type="text" name="nameInput" value=""></td>
      </tr>
      <tr>
        <td class='memRegistfirstTd'>닉네임</td>
        <td class='memRegistTd'>
          <input type="text" name="nickInput" value="">
          <a class='dupliBtn' href='#' onclick = 'nickDupliCheck()'>중복확인</a>
        </td>
      </tr>
      <tr>
        <td class='memRegistfirstTd'>휴대폰</td>
        <td class='memRegistTd'>
          <select name="hpInput1">
            <option value="010">010</option>
            <option value="011">011</option>
            <option value="016">016</option>
            <option value="017">017</option>
            <option value="018">018</option>
            <option value="019">019</option>
          </select>
          - <input type="text" name="hpInput2">
          - <input type="text" name="hpInput3">
        </td>
      </tr>
      <tr>
        <td class='memRegistfirstTd'>이메일</td>
        <td class='memRegistTd'>
          <input type="text" name="emailInput1"> @
          <select name="emailInputSelect" onchange="setEmail()">
            <option value="naver">네이버</option>
            <option value="daum">다음</option>
            <option value="yahoo">야후</option>
            <option value="google">구글</option>
            <option value="ldghome">대건홈</option>
            <option value="cyworld">싸이월드</option>
            <option value="typing">직접입력</option>
          </select>
          <input type="text" id="emailInput2" name="emailInput2" readonly="readonly" value="naver.com">
        </td>
      </tr>
    </table>
    <br>
    <div id='memRegistfuncDiv'>
      <input type="submit" value="회원가입">
      <input type="reset" value="다시쓰기">
    </div>
    <br>
  </form>
</div>
