<?php
include "../func.php";
include "../head.php";
if($_POST['code'] == ""){
  exit("認証コードを入力してください。</body></html>");
}
if($_SESSION['moremona-login'] == "n"){
  exit();
}
$date = json_decode($_POST['code']);
$postedid = $date->u_id;
$postedkey = $date->secretkey;
$app_secretkey = '';
$nonce = base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
$time = time();
$auth_key = base64_encode(hash('sha256',$app_secretkey.$nonce.$time.$date->secretkey,TRUE));
$postdate = array(
  'app_id' => '2473',
  'u_id' => $date->u_id,
  'nonce' => $nonce,
  'time' => $time,
  'auth_key' => $auth_key,
);
$url = 'http://askmona.org/v1/auth/verify';
$d = mypost($postdate,$url);
$date = json_decode($d);
if($date->status != 1){
  exit("認証コードが間違っています。もう一度コピーしてください。");
}
mymysql();
$result = mysql_query("SELECT * FROM moremona.askmore WHERE id LIKE '".$postedid."'");
$rowo = mysql_fetch_array($result);
if($rowo['id'] == $postedid){
  exit("既にその認証コードで登録されています。登録していない場合、この様なエラーは絶対に起こりません。onokatioに連絡してください。");
}
mymysql();
$result = mysql_query("INSERT INTO moremona.askmore (id,secretkey,name) VALUES (".$postedid.",'".$postedkey."','".$moremona_username."')");
$row = mysql_fetch_array($result);

//var_dump($postedid);
//var_dump($postedkey);
//echo "---------------";
//var_dump($row);
//echo "---------------";
//var_dump($rowo);

?>
認証されました。10秒後にマイページへジャンプします。<br>
ジャンプしない場合は、<a href="/moremona/accounts.php">マイページ</a>をクリック。<br>
</body>
</html>
