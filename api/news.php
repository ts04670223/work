<?php
include_once "../base.php";

  $New->save($_POST);
  to("../backend.php?do=news");

?>