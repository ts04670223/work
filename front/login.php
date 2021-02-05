<fieldset>
  <legend>會員登入</legend>
  <form>
<table>
  <tr>
    <td>帳號:</td>
    <td><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td>密碼:</td>
    <td><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td><input type="button" onclick="login()" value="登入"><input type="reset" value="清除"><a href="?do=forget">忘記密碼|</a><a href="?do=reg">尚未註冊</a></td>
  </tr>
</table>
  </form>
</fieldset>
<script>
  function login(){
  let acc=$("#acc").val()
  let pw=$("#pw").val()
    $.post("api/check_acc.php",{acc},function(res){
      if(res=='1'){
        $.post("api/check_pw.php",{acc,pw},function(rr){
          if (rr=='1') {
            location.href='index.php';
          }else{
            alert("密碼錯誤");
          }
        })
      }else{
        alert("查無帳號");
      }
    })
  }
</script>