<?php
  session_start();

  require_once '../cls/UserInfoGetter.php';
  require_once '../cls/FileCtr.php';
  require_once '../cls/FileUploader.php';
  require_once './cls/GoodsWriter.php';
  require_once './cls/GoodsSearcher.php';

  $userId = $_SESSION['userid'];
  $date = date("Y-m-d H:i:s");

  // 클래스 선언
  $uif = new UserInfoGetter();   // 유저의 정보를 DB로부터 가져오는 클래스
  $ftr = new FileCtr();          // 파일을 조작하기위한 클래스
  $ful = new FileUploader();     // 파일 저장 클래스
  $gwr = new GoodsWriter();   // 게시판 작성 클래스
  $gsr = new GoodsSearcher(); // 게시판 검색 클래스

  // 유저의 아이디로 정보를 가져온다
  $info = $uif->getInfoById($userId);
  $nick = $info['nick'];

  // 폼으로부터 입력받은 값
  $title    = $_POST['titleInput'];
  $price    = $_POST['priceInput'];
  $name     = $_POST['nameInput'];
  $quantity = $_POST['quantityInput'];
  $file     = $_FILES['mainImgUpload'];
  $content  = $_POST['content'];

  $writeCnt = $gsr->getHighCnt() + 1; // 현재 글의 글 번호
  $fileDir = "uploads/goodsData/{$writeCnt}"; // 데이터 위치
  $content = str_replace("uploads/tmpImg/".$userId,$fileDir."/img",$content); // 컨텐츠 내 임시 이미지 태그 수정

  // QnA질문 DB저장
  $gwr->registGoods([
    "num"          => $writeCnt,
    "title"        => $title,
    "name"         => $name,
    "content"      => $content,
    "price"        => $price,
    "quantity"     => $quantity,
    "regist_day"   => $date,
    "id"           => $userId,
    "nick"         => $nick,
    "mainImg"      => basename($file['name'])
  ]);


  // 임시 이미지파일 게시판 파일로 이동
  if(!file_exists($fileDir)) mkdir($fileDir);
  if(file_exists("./uploads/tmpImg/{$userId}")){
    $ftr->copy_directory("./uploads/tmpImg/{$userId}",$fileDir."/img");
    $ftr->rmdirAll("./uploads/tmpImg/{$userId}");
  }

  // 일반파일 저장
  if(!file_exists($fileDir."/data")) mkdir($fileDir."/data");
  $ful->fileUploadToFolder($fileDir."/data/", $file);

  // 게시판 뷰로 돌아감
  header("location:./goodsListFrame.php");

?>
