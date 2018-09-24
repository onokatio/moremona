<?php
include "../func.php";
include "../head.php";
if($_POST['name'] == "") {
  header("location: /moremona/login/login.php?e=e");
  exit();
}
if($_POST['pass'] == "") {
  header("location: /moremona/login/login.php?e=e");
  exit();
}
mymysql();
$result = mysql_query("SELECT * FROM moremona.accounts WHERE name LIKE '".$_POST['name']."'");
$row = mysql_fetch_array($result);
if($row['pass'] == angou($_POST['pass'])){
  session_start();
    $_SESSION['moremona-login'] = "d";
    $_SESSION['moremona-username'] = $_POST['name'];
  session_write_close();
  header("location: /moremona/");
  exit();
}else{
//echo angou($_POST['pass'])."\n";
//echo $row['pass'];
  header("location: /moremona/login/login.php?e=e");
  exit();
}
?>
