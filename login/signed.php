<?php
include ("../func.php");
include ("../head.php");
if($_POST['name'] == "") {
  header("location: /moremona/login/sign.php?e=e");
  exit();
}
if($_POST['pass'] == "") {
  header("location: /moremona/login/sign.php?e=e");
  exit();
}
if($_POST['cpass'] == "") {
  header("location: /moremona/login/sign.php?e=e");
  exit();
}
if($_POST['pass'] != $_POST['cpass']){
  header("location: /moremona/login/sign.php?e=e");
  exit();
}
mymysql();
$result = mysql_query("SELECT * FROM moremona.accounts WHERE name LIKE '".$_POST['name']."';");
$row = mysql_fetch_array($result);
if($row['name'] == $_POST['name']){
  exit("そのユーザー名は既に使われています。");
}
$pass = angou($_POST['pass']);

mymysql();
$result = mysql_query("INSERT INTO moremona.accounts (name,pass) VALUES ('".$_POST['name']."','${pass}')");
echo "完了しました。";
//var_dump($row['name']);
?>
