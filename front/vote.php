<?php
$id=$_GET['id'];
$sub=$Que->find($id);
$opt=$Que->all(['sub'=>$id]);

?>
<fieldset>
  <legend>目前位置 : 首頁 > 問卷調查 > <?=$sub['text'];?></legend>
<h3><?=$sub['text'];?></h3>
<form action="api/vote.php" method="post">
<table>
<?php
foreach($opt as $opts){
  ?>
<tr>
<td>
<input type="radio" name="vote" value="<?=$opts['id'];?>">
<?=$opts['text'];?>
</td>
</tr>
  <?php
}
?>
</table>
<input type="hidden" name="sub" value="<?=$sub['id'];?>">
<div class="ct"><input type="submit" value="我要投票"></div>
</form>
</fieldset>