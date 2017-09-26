<script>
function copyToOpenerContent(){
  // 파일명
  var fileName = document.getElementById("fileName").value;
  // 파일명을 통한 임시파일 경로
  var userId = document.getElementById('userId').value;
  var tmpDir = "./uploads/tmpImg/" + userId + "/" + fileName;
  // 오프너의 컨텐츠
  var contentBox = opener.document.getElementById("contentDiv");
  // 임시 이미지의 태그를 오프너의 컨텐츠로 복사
  contentBox.innerHTML = contentBox.innerHTML + "<img src='" + tmpDir +"'>";
}
</script>
<?php
  session_start();
  // 파일 업로드 클래스
  require_once "../cls/FileUploader.php";
  $fileUploader = new FileUploader();

  //파일 업로드 경로
  $directory = "./uploads/tmpImg/".$_SESSION['userid'];
  if(!file_exists($directory)) mkdir($directory);
  $fileUploader->fileUploadToFolder($directory."/", $_FILES['temImgUp']);
?>
<input type="hidden" id="userId" value="<?=$_SESSION['userid']?>">
<input type="hidden" id="fileName" value="<?=$_FILES['temImgUp']['name']?>">
<script>
  copyToOpenerContent();
  window.close();
</script>
