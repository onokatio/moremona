<?php
include "../func.php";
include "../head.php";
?>
<h3>新規登録</h3>
<hr>
<?php
$e = $_GET['e'];
if ($e == "e"){
  echo "<h4>入力に不備があります。</h4>";
}
?>
<p>
MOREmona!を使うには、MOREmona!に登録する必要があります。<br>
色々なサービスのアカウントでも登録ができます。
</p>
<hr>
openID:<br><br>
<a href="https://accounts.google.com/o/oauth2/approval?as=6076fc6811666c11&hl=ja&pageId=none&xsrfsign=APsBz4gAAAAAVawpxyEELpQuNNf5c9SXuDY-TowDtpzq">googleアカウントでログイン</a><br>
<b>現在これは使えないので下の方法で登録してください。</b>
<hr>
上のアカウントを持っていない方はこちら。<br>
<form action="signed.php" method="post">
ユーザー名:<input type="text" name="name" size ="40"><br>
パスワード:<input type="text" name="pass" size ="40"><br>
パスワード確認:<input type="text" name="cpass" size ="40"><br>
<input type="submit" value="送信"><br>
</div>
