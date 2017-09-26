<?php
  $fileDir = "./uploads/questionData/".$_GET['qNum']."/data/"; // 파일경로
  $fileName = $_GET['fileName']; // 파일명
  if(file_exists($fileDir.$fileName)){

    if (is_file($fileDir.$fileName)) {
      Header("Content-type:application/octet-stream");
      Header("Content-Length:".filesize($fileDir.$fileName));
      Header("Content-Disposition:attachment;filename=".$fileName);
      Header("Content-type:file/unknown");

      Header("Content-Description:PHP5 Generated Data");

      // 캐시방지
      Header("Pragma: no-cache");
      Header("Expires: 0");

      $fp = fopen($fileDir.$fileName, "rb");
      if (!fpassthru($fp)) fclose($fp);
      clearstatcache();
    }
  }else{
    echo ("
      <script>
        alert('존재하지 않는 파일입니다');
        history.go(-1);
      </script>
    ");
  }

?>
