<fieldset>
  <legend>目前位置 : >首頁 > 人氣文章區</legend>
  <table>
    <tr>
      <td width="30%">標題</td>
      <td width="50%">內容</td>
      <td>人氣</td>
    </tr>
    <?php
    $count=$New->count(['sh'=>1]);
    $div=5;
    $now=(isset($_GET['p']))?$_GET['p']:1;;
    $start=($now-1)*$div;
    $pages=ceil($count/$div);
    $new=$New->all(['sh'=>1],"limit $start,$div");
    foreach($new as $news){
      ?>
    <tr>
      <td class="header"><?=$news['title'];?></td>
      <td class="tt">
        <span class="title"><?=mb_substr($news['text'],0,30,'utf8');?></span>
        <div class="text"
		style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;"><?=nl2br($news['text']);?></div>
    </td>
      <td><?=$news['good'];?>個人說<img src="../icon/02B03.jpg" style="width:25px;height:25px">
    <?php
    if (!empty($_SESSION['login'])) {
      $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$news['id']]);
      if ($chk) {
        ?>
        <a href="#" id="good<?=$news['id'];?>" onclick="good('<?=$news['id']?>','2','<?=$_SESSION['login']?>')">收回讚</a>
        <?php
      }else{
        ?>
        <a href="#" id="good<?=$news['id']?>" onclick="good('<?=$news['id'];?>','1','<?=$_SESSION['login'];?>')">讚</a>
        <?php
      }
    }
    ?>
    </td>
    </tr>
      <?php
    }
    ?>
  </table>
  <?php
  if(($now-1)>0){
    echo "<a href='?do=pop&p=".($now-1)."'>&lt;</a>";
  }
  for ($i=1; $i <=$pages ; $i++) { 
    $font=($now==$i)?"28px":"18px";
    echo "<a href='?do=pop&p=$i' style='font-size:$font;'>$i</a>";
  }
  if(($now+1)<=$pages){
    echo "<a href='?do=pop&p=".($now+1)."'>&gt;</a>";
  }
  ?>
</fieldset>
<script>
$(".header").hover(function(){
  $(this).next().children('.text').toggle();
})
$(".tt").hover(function(){
  $(this).children('.text').toggle();
})

</script>
