
<div id="top_wrap">
  <div id="top_left">
  </div>
  <div id="top_logo">
    <a href="../index.php"><img src="../img/topimg.jpg"/ border="0"></a>
  </div>
  <div id="top_right">

    <?php
        if(isset($_SESSION['userid'])){
        echo ("
          <div id='login_box'>
            {$_SESSION['userid']}님 반갑다.
            <a href='./menus/login/logout.php'>로그아웃</a>
            <a href='./menus/buying/myPageFrame.php'>마이페이지</a>
          </div>
        ");
      } else {
        echo("
        <div id='login_box'>
          <form action='../menus/login/login.php' method='post'>
            ID <input type='text' name='userid' size='8' value=''>
            PW <input type='password' name='userpass' size='8' value=''>
            <input type='submit' value='로그인'>
          </form>
          <a href='../menus/memRegist/registFrame.php'>회원가입</a>
        </div>
        ");
      }

    ?>

  </div>
  <div id='top_menu_wrap'>
    <ul>
      <li class='top_menu_li'><a href ='../menus/siteIntro/siteIntroFrame.php'>사이트소개</a></li>
      <li class='top_menu_li'><a href ='../menus/questionBoard/questionBoardFrame.php'>묻고답하기</a></li>
      <li class='top_menu_li'><a href ='../menus/buying/goodsListFrame.php'>기타 구매</a></li>
    </ul>

  </div>
</div>
