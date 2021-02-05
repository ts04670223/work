
<fieldset>
  <legend>最新文章管理</legend>
  <a href="backend.php?do=newsss"><button >新增文章</button></a>
  <form action="api/edtnew.php" method="post">
<table class="cent">
  <tr>
    <td style="width:10%">編號</td>
    <td style="width:50%">標題</td>
    <td style="width:20%">顯示</td>
    <td style="width:20%">刪除</td>
  </tr>
  <?php
  $coun=$New->count();
  $div=3;
  $pages=ceil($coun/$div);
  $now=(isset($_GET['p']))?$_GET['p']:1;
  $start=($now-1)*$div;
  $new=$New->all("limit $start,$div");
foreach($new as $mems=>$key){
  ?>
  <tr>
    <td><?=$start+$mems+1;?></td>
    <td><?=$key['title'];?></td>
    <td><input type="checkbox" name="sh[]" value="<?=$key['id'];?>" <?=($key['sh']=='1')?"checked":"";?>></td>
    <td><input type="checkbox" name="del[]" value="<?=$key['id'];?>"></td>
    <input type="hidden" name="id[]" value="<?=$key['id'];?>">
  </tr>
<?php
}
?>
  <tr style="margin:auto">
    <td><input type="submit"  value="確定修改"></td>
  </tr>
</table>
<?php
if(($now-1)>0){
  echo "<a href='?do=news&p=".($now-1)."'>&lt;</a>";
}
for ($i=1; $i <=$pages ; $i++) { 
  $font=($now==$i)?'28px':'18px';
  echo "<a href='?do=news&p=$i' style='font-size:$font'>$i</a>";
}
if(($now+1)<=$pages){
  echo "<a href='?do=news&p=".($now+1)."'>&gt;</a>";
}
?>
  </form>
</fieldset>