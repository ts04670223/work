<?php
include_once "../base.php";

$q=$Que->find($_POST['id']);
$q['sh']=($q['sh']+1)%2;
$Que->save($q);
?>