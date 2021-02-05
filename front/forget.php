<fieldset>
  <legend>忘記密碼</legend>
  <form>
<table>
  <tr>
    <td >請輸入信箱以查詢密碼</td>
  </tr>
  <tr>
    <td><input type="text" name="email" id="email"></td>
  </tr>
  <tr>
    <td id="fore"></td>
  </tr>
  <tr>
    <td><input type="button" onclick="forget()" value="尋找"></td>
  </tr>
</table>
  </form>
</fieldset>
<script>

  function forget(){
  let email=$("#email").val()
  $.post("api/forget.php",{email},function(res){
$("#fore").html(res);
  })
}
</script>