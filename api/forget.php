<?php
include_once "../base.php";

$email=$_POST['email'];
$chk=$Mem->find(['email'=>$email]);
if (!empty($chk)) {
  echo '您的密碼為:'.$chk['pw'];
}else{
  echo "查無此資料";
}

?>