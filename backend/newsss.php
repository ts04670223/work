<fieldset>
  <legend>新增文章</legend>
<form action="api/news.php" method="post">
<table class="cent">
  <tr>
    <td style="width:20%">文章標題</td>
    <td ><input type="text" name="title" id="title"></td>
  </tr>
  <tr>
    <td style="width:20%">文章分類</td>
    <td >
      <select name="cla" id="">
          <option value="1">健康新知</option>
          <option value="2">菸害防治</option>
          <option value="3">癌症防治</option>
          <option value="4">慢性病防治</option>
    </select>
  </td>
  </tr>
  <tr>
    <td style="width:20%">文章內容</td>
    <td ><textarea name="text" id="text" cols="30" rows="10"></textarea></td>
  </tr>
</table>
<input type="hidden" name="sh"value='1'>
<div class="ct">
<input type="submit"  value="新增"><input type="reset" value="重置">
</div>
</form>
</fieldset>