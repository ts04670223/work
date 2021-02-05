<fieldset>
  <legend>目前位置 : 首頁 > 最新文章區</legend>
<table>
  <tr>
    <td width='30%'>標題</td>
    <td width='50%' >內容</td>
    <td></td>
  </tr>
  <?php
  $con=$New->count(['sh'=>1]);
  $val=5;
  $pages=ceil($con/$val);
  $now=(isset($_GET['p']))?$_GET['p']:1;
  $start=($now-1)*$val;
  $new=$New->all(['sh'=>1],"limit $start,$val");
foreach($new as $news){
  ?>
<tr>
  <td class="header"><?=$news['title']?></td>
  <td>
  <span class="title"><?=mb_substr($news['text'],0,30,'UTF8')?></span>
  <span class="text" style="display:none;"><?=nl2br($news['text']);?></span>
  </td>
<td>
<?php
if(!empty($_SESSION['login'])){
  $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$news['id']]);
  if($chk){
    ?>
<a href="#" class="gg"id="news<?=$news['id'];?>">收回讚</a>
    <?php
  }else{
    ?>
    <a href="#" class="gg"id="news<?=$news['id'];?>">讚</a>
    <?php
  }
}
?>
</td>
<tr>
  <?php
}
  ?>
</table>
<div>
<?php
if (($now-1>0)) {
  echo "<a href='index.php?do=news&p=".($now-1)."'>&lt;</a>";
}
for($i=1;$i<=$pages;$i++){
  $font=($i==$now)?"28px":"18px";
  echo "<a href='index.php?do=news&p=$i' style='font-size:$font'>$i</a>";
}
if(($now+1)<=$pages){
  echo "<a href='index.php?do=news&p=".($now+1)."'>&gt;</a>";
}
?>
</div>
</fieldset>
<script>
$(".header").on("click",function(){
  $(this).next().children('.title').toggle();
  $(this).next().children('.text').toggle();
})
$(".gg").on("click",function(){
  let id=$(this).attr('id').replace("news","");
  let text=$(this).text();
  if (text=='讚') {
    $(this).text('收回讚');
  }else{
    $(this).text('讚')
  }
  $.post("api/good.php",{id});
})
</script>