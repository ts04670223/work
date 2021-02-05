<fieldset>
  <legend>目前位置 : 首頁 > 問卷調查</legend>
<table>
  <tr>
    <td width='10%'>編號</td>
    <td width='40%' >問卷內容</td>
    <td>投票總數</td>
    <td>結果</td>
    <td>狀態</td>
  </tr>
  <?php
  $new=$Que->all(['sh'=>1,'sub'=>0]);
foreach($new as $key=>$news){
  ?>
<tr>
  <td class="header"><?=$key+1;?></td>
  <td><?=$news['text']?></td>
  <td><?=$news['count']?></td>
  <td><a href="?do=rrr&id=<?=$news['id']?>">結果</a></td>
<td>
<?php
if(!empty($_SESSION['login'])){
?>
<a href="?do=vote&id=<?=$news['id']?>">參與投票</a>
    <?php
}else{
  echo "請先登入";
}
?>
</td>
<tr>
  <?php
}
  ?>
</table>
</fieldset>