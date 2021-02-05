
<fieldset>
  <legend>問卷列表</legend>
  <!-- <form action="api/edtq.php" method="post"> -->
<table class="cent">
  <tr>
    <td style="width:50%">問卷名稱</td>
    <td style="width:20%">投票數</td>
    <td style="width:20%">開放</td>
  </tr>
  <?php
  $que=$Que->all(['sub'=>0]);
  foreach($que as $mems=>$key){
    ?>
  <tr>
    <td><?=$mems+1;?><?=$key['text'];?></td>
    <td><?=$key['count'];?></td>
    <td><button onclick="op(<?=$key['id'];?>)"><?=($key['sh']==1)?'顯示':'隱藏';?></button></td>
  </tr>
<?php
}
?>
</table>
  <!-- </form> -->
<a href="backend.php?do=quess"><button >新增問卷</button></a>
</fieldset>
<script>
function op(id){
$.post("api/edtq.php",{id},function(){
  location.reload();
})
}

// function op(but){
//   $(but).text('顯示')
//   $(but).attr('onclick','clos(this)')
//   let a=$(but).text();
//   let b=$(but).parents('td').next().children().val()
//   $.post("edtq.php")
// }
// function clos(but){
//   $(but).text('隱藏')
//   $(but).attr('onclick','op(this)')
//   let a=$(but).text();
//   let b=$(but).parents('td').next().children().val()
// }
</script>