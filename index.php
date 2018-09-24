<?php
include "func.php";
include "head.php";
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  if ($id == "e"){
    echo "<h2>現在そのサービスは準備中です。</h2 style='color: red;'>";
  }
}
$org_timeout = ini_get('default_socket_timeout');
ini_set('default_socket_timeout', 1);
?>
MOREmona!は、monacoinの便利な機能がweb上で使えちゃうサイトです。<br>
たとえば、monaの相場を見たり、monaやbit、dogeやliteなどの暗号通貨とトレードができます。(予定)<br>
また、askmonaに機能を付け足したaskMOREが使えます。<br>
MOREmona!のアカウント一個で、monacoinを煮ることも焼くこともできます。<br>
<h3>さあ！はじめよう。新しいmonacoinを!</h3><br>
<div style="padding: 10px; margin-bottom: 10px; border: 1px dotted #333333; border-radius: 5px;">
ここに掲載する広告を募集中です。一ヶ月1Monaで掲載します。興味のある方はonokatio@gmail.comまで。
</div>
<hr>
累計回覧人数:<br>
<img src="/cgi/counter/counter.php?id=test&pass=test">人
<?php
ini_set('default_socket_timeout', $org_timeout);
?>
