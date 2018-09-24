<?php
include "../func.php";
include "../head.php";
$org_timeout = ini_get('default_socket_timeout');
ini_set('default_socket_timeout', 1);
if(!($json = file_get_contents('http://askmona.org/v1/topics/list?order=updated&limit=100'))) exit("time out\n");
//echo "t";
$date = json_decode($json);
for($i = 0; $i < 100; $i++){
  $t_id = $date->topics[$i]->t_id;
  $count = $date->topics[$i]->count;
  echo "<h3>".strval($i+1).":<a href=res.php?id=".$t_id.">".$date->topics[$i]->title."</a></h3>";
  echo $date->topics[$i]->lead."<br><br>";
  echo $date->topics[$i]->category."　　　";
  echo $date->topics[$i]->count." Res .　";
  $receive = intval($date->topics[$i]->receive);
  $receive = $receive / 100000000;
  echo $receive." Mona";
  echo "<hr>";
  $receive = "error";
}
ini_set('default_socket_timeout', $org_timeout);
?>
<hr>
<div style="padding: 10px; margin-bottom: 10px; border: 1px dotted #333333; border-radius: 5px;">
ここに掲載する広告を募集中です。一ヶ月1Monaで掲載します。興味のある方はonokatio@gmail.comまで。
</div>
