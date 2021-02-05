<?php
$id=$_GET['id'];
$sub=$Que->find($id);
$opt=$Que->all(['sub'=>$id]);

?>
<fieldset>
  <legend>目前位置 : 首頁 > 問卷調查 > <?=$sub['text'];?></legend>
<h3><?=$sub['text'];?></h3>
<table>
<?php
foreach($opt as $key=>$opts){
  $div=($sub['count']!=0)?$sub['count']:1;
  $reta=$opts['count']/$div;
  ?>
<tr>
<td width="50%">
<?=$key+1;?>
<?=$opts['text']?>
</td>
<td>
<div style="display:inline-block;height:25px;background:#999;width:<?=70*$reta;?>%"></div>
<?=$opts['count']?>票(<?=round(($reta)*100);?>%)
</td>
</tr>
  <?php
}
?>
</table>
<input type="hidden" name="sub" value="<?=$sub['id'];?>">
<div class="ct"><a href="index.php?do=que"><button type="button">返回</button></a></div>
</fieldset>