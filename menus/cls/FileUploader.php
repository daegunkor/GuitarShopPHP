<?php
  class FileUploader {
    // 해당 경로에 파일을 넣음(경로 마지막 / 포함 , 파일명은 basename)
    function fileUploadToFolder($direction, $fileIns){
      $uploadFile = $direction . basename($fileIns["name"]);
      move_uploaded_file($fileIns['tmp_name'], $uploadFile);
    }
  }
?>
