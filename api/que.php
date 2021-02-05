<?php
include_once "../base.php";

$sub=$_POST['sub'];
$Que->save(['text'=>$sub,'sub'=>0,'count'=>0]);
$main=$Que->find(['text'=>$sub]);
foreach($_POST['opt'] as $pp){
  $Que->save(['text'=>$pp,'sub'=>$main['id'],'count'=>0,'sh'=>0]);
}
to("../backend.php?do=news");
?>