<?php
include_once "../base.php";

$news=$_POST['id'];
$chk=$Log->count(['news'=>$news,'acc'=>$_SESSION['login']]);
if($chk>0){
  $Log->del([
    'acc'=>$_SESSION['login'],
    'news'=>$news
  ]);
  $post=$New->find($news);
  $post['good']--;
  $news->save($post);
}else{
  $Log->save(['acc'=>$_SESSION['login'],'news'=>$news]);
  $post=$New->find($news);
  $post['good']++;
  $New->save($post);
}

?>