<fieldset>
  <legend>新增文章</legend>
<form action="api/que.php" method="post">
<table class="cent">
  <tr >
    <td style="width:20%">問卷名稱</td>
    <td ><input type="text" name="sub" id="sub"></td>
  </tr>
  <tr id="more">
    <td style="width:20%">選項</td>
    <td ><input type="text" name="opt[]" id="text">
    <input type="button" value="更多" onclick="more()"></td>
  </tr>
</table>
<div class="ct">
<input type="submit"  value="新增">|<input type="reset" value="清空">
</div>
</form>
</fieldset>
<script>
function more(){
let option=`
<tr id="more">
    <td style="width:20%">選項</td>
    <td ><input type="text" name="opt[]" id="text"></td>
  </tr>`
$("#more").before(option);
}
</script>