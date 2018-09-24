<?php
include "../func.php";
include "../head.php";
?>
<h3>ログイン</h3>
<hr>
<?php
$e = $_GET['e'];
if ($e == "e"){
  echo "<h4>ユーザー名かパスワードが違います。</h4>";
}
?>
<form action="logined.php" method="post">
ユーザー名:<input type="text" name="name" size ="40"><br>
パスワード:<input type="text" name="pass" size ="40"><br>
<input type="submit" value="ログイン"><br>
</div>
