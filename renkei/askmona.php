<?php
include "../func.php";
include "../head.php";
if($_SESSION['moremona-login'] == "n"){
  exit();
}
?>
<h2>askmonaと連携するには。</h2>
<h4>askmonaアカウントを持ってる場合</h4>
1.<a href='http://askmona.org/auth/?app_id=2473'>askmonaアプリ連携ページ</a>に行き、出てきた認証コードをコピーする。<br>
<br>
2.ここに、認証コードを入力する。<br>
<form action="askmonaed.php" method="post">
<input type="text" name="code" size ="40">
<input type="submit" value="送信">
</form>
<h4>askmonaアカウントを持っていない場合</h4>
このページからaskmonaのアカウントを作ることができます。
作成中
