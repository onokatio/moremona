<?php
include "../func.php";
include "../head.php";
if($moremona_login == "n"){
  exit();
}

if(!isset($_GET['id'])) {
  exit("トピックが存在しません");
}
//if($_POST['sage'] == "sage") {
//  $sage = "1";
//}else{
//  $sage = "0";
//}
//if(!isset($_POST['text'])) {
//  exit("text null.");
//}
mymysql();
$result = mysql_query("SELECT * FROM moremona.askmore WHERE name LIKE '".$moremona_username."'");
$row = mysql_fetch_array($result);
if($row['secretkey'] != ""){
$org_timeout = ini_get('default_socket_timeout');
ini_set('default_socket_timeout', 1);
  $app_secretkey = '=';
  $secretkey = $row['secretkey'];
  $nonce = base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
  $time = time();
  $auth_key = base64_encode(hash('sha256',$app_secretkey.$nonce.$time.$secretkey,TRUE));
$postdate = array(
  'app_id' => '2473',
  'u_id' => $row['id'],
  'nonce' => $nonce,
  'time' => $time,
  'auth_key' => $auth_key,
  't_id' => $_GET['id'],
//  'sage' => $sage,
  'text' => $_POST['text'],
);
$url = 'http://askmona.org/v1/responses/post';
$d = mypost($postdate,$url);
var_dump($d);
//var_dump($postdate);
ini_set('default_socket_timeout', $org_timeout);
//if(!($json = file_get_contents("http://askmona.org/v1/responses/list?t_id=".$_GET['id']."&topic_detail=1"))) exit("time out\n");
//$date = json_decode($json);
//$count = $date->topic->count;
}
header("location: res.php?id=".$_GET['id']);
exit();
?>
