<?php
include_once "../base.php";

$sub=$Que->find($_POST['sub']);
$sub['count']++;
$Que->save($sub);

$opt=$Que->find($_POST['vote']);
$opt['count']++;
$Que->save($opt);
to("../index.php?do=rrr&id={$sub['id']}");
?>