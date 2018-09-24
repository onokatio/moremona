<?php
include "func.php";
include "head.php";
session_start();
  if($_SESSION['moremona-login'] == "n"){
    header("location: /moremona/");
    exit();
  }
  $username = $_SESSION['moremona-username'];
session_write_close();
echo "<h2>".$username."さんのマイページ</h2>";
?>
<hr>
<h4>サービス連携</h4>
<p>
MOREmona!アカウントにサービスを連携することができます。
</p>
<table border="1">
<tr>
  <td>アカウント名</td><td>できること</td><td>認証</td>
</tr>

<tr>
<?php
mymysql();
$result = mysql_query("SELECT * FROM moremona.askmore WHERE name LIKE '".$moremona_username."'");
$row = mysql_fetch_array($result);
if($row['secretkey'] == ""){
  echo "<td>askmonaアカウント</td><td>askmoreの使用</td><td><a href='./renkei/askmona.php'>認証</a></td>";
}else{
  echo "<td>askmonaアカウント</td><td>askmoreの使用</td><td>認証済み</td>";
}
?>
</tr>
<tr>
  <td>allcoinアカウント</td><td></td><td><a href="#"></a></td>
</tr>
<tr>
  <td>monappyアカウント</td><td></td><td><a href="#"></a></td>
</tr>
</table>
