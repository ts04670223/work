<?php
date_default_timezone_set("Asia/Taipei");
session_start();

$Total=new DB('total');
$Mem=new DB('mem');
$New=new DB('new');
$Que=new DB('que');
$Log=new DB('log');

if(empty($_SESSION['total'])){
  if ($Total->count(['date'=>date("Y-m-d")])>0) {
    $total=$Total->find(['date'=>date("Y-m-d")]);
    $total['total']++;
    $Total->save($total);
    $_SESSION['total']=$total['total'];
  }else{
    $total=['date'=>date("Y-m-d"),'total'=>1];
    $Total->save($total);
  }
  $_SESSION['total']=$total['total'];
}

class DB{
  protected $table;
  protected $dsn="mysql:host=localhost;dbname=db222;charset=UTF8";
  protected $pdo;

  function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,'root','');
  }
  function all(...$arg){
    $sql="select * from $this->table ";
    if (isset($arg[0])) {
      if (is_array($arg[0])) {
        foreach($arg[0] as $key=>$value){
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .=" where ".implode(" && ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if (isset($arg[1])) {
      $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchAll();
  }
  function count(...$arg){
    $sql="select count(*) from $this->table ";
    if (isset($arg[0])) {
      if (is_array($arg[0])) {
        foreach($arg[0] as $key=>$value){
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .=" where ".implode(" && ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if (isset($arg[1])) {
      $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }
  function find($id){
    $sql="select * from $this->table ";
    if (is_array($id)) {
      foreach($id as $key=>$value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql .=" where ".implode(" && ",$tmp);
    }else{
      $sql .=" where `id`={$id}";
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
  function del($id){
    $sql="delete from $this->table ";
    if (is_array($id)) {
      foreach($id as $key=>$value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql .=" where ".implode(" && ",$tmp);
    }else{
      $sql .=" where `id`='$id'";
    }
    return $this->pdo->exec($sql);
  }
  function save($arg){
    if (isset($arg['id'])) {
      foreach($arg as $key=>$value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql="update $this->table set ".implode(',',$tmp)." where `id`='{$arg['id']}'";
    }else{
      $sql="insert into $this->table (`".implode("`,`",array_keys($arg))."`) values('".implode("','",$arg)."')";
    }
    return $this->pdo->exec($sql);
  }
  function q($arg){
    return $this->pdo->query($arg)->fetchAll();
  }
}
function to($url){
  header("location:".$url);
}

?>