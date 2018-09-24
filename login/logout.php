<?php
include "func.php";
include "head.php";
if($_SESSION['moremona-login'] == "n"){
  exit();
}
session_start();
    $_SESSION['moremona-login'] = "n";
    $_SESSION['moremona-username'] = "";
session_write_close();
header("location: /moremona/");
?>
