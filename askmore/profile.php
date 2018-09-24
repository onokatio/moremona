<?php
include "../func.php";
include "../head.php";
if(isset($_GET['id'])) {
  $id = $_GET['id'];
}else{
  exit("ユーザー番号が存在しません。\n");
}
$org_timeout = ini_get('default_socket_timeout');
ini_set('default_socket_timeout', 1);
if(!($json = file_get_contents("http://askmona.org/v1/users/profile?u_id=".$id."']"))) exit("time out\n");
$date = json_decode($json);
echo "<h4>".$date->u_name;
echo $date->u_dan."のプロフィール</h4><br>\n";
echo $date->profile;
echo "<hr>\n";

ini_set('default_socket_timeout', $org_timeout);

?>
