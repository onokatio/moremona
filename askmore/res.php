<?php
include "../func.php";
include "../head.php";
if(isset($_GET['id'])) {
  $id = $_GET['id'];
}else{
  exit("トピック番号が存在しません。\n");
}
function esc($string, $to = "\\n") {
  $n = preg_replace("/\r\n|\r|\n/", $to, $string);
  $n = str_replace("\\n","<br>",$n);
  $array = explode("<br>", $n);
  $array = array_map('trim', $array);
  $array = array_values($array);
  for($im = 0;count($array) > $im;$im++){
    if(substr($array[$im],0, 1) == "#"){
//substr($str1, 0, 1);
      if(substr($array[$im],1,5) == "music"){
        $url = substr($array[$im],7);
        $array[$im] = "";
        $array[$im] = $array[$im]."<audio controls preload='auto'>";
        $array[$im] = $array[$im]."<source src='".$url."' type='audio/wav'>";
        $array[$im] = $array[$im]."<embed src='".$url."' type='audio/wav' width='240' height='50' autostart='false' controller='true' loop='false'  pluginspage='http:/www.apple.com/jp/quicktime/download/'>";
        $array[$im] = $array[$im]."<p>あなたのブラウザは音声再生に対応していません。</p>";
        $array[$im] = $array[$im]."</audio>";
      }
    }
  }
//  preg_match_all('(https?://[-_.!~*\'()a-zA-Z0-9;/?:@&=+$,%#]+)', $array, $result);
$urllist = array();
if(preg_match_all('/https?:\/\/[a-zA-Z0-9\|\-\.\/\?\!_\@&=:~#]+/', implode('<br>',$array), $matchs) !== FALSE){
  foreach ($matchs[0] as $line){
   $urllist[] = $line;
  }
}
$array = implode('<br>',$array);
for($i=0;count($urllist) > $i;$i++){
  if(substr($urllist[$i], 7, 11) == "i.imgur.com" | substr($urllist[$i], 7, 9) == "imgur.com" | substr($urllist[$i], 8, 11) == "i.imgur.com" | substr($urllist[$i], 8, 9) == "imgur.com"){
//    $array = str_replace($urllist[$i], "<p class='pop'><a href='".$urllist[$i]."'><img src='/img/load.png' data-original='".$urllist[$i]."' class='lazy' alt='投稿写真' height='128'><span class='fukidasipop'><img src='/img/load.png' data-original='".$urllist[$i]."' class='lazy' alt='投稿写真'><noscript><img src='".$urllist[$i]."'alt='投稿写真'></noscript></span><noscript><img src='".$urllist[$i]."' width='128' alt='投稿写真'></noscript></a></p>", $array);
    $array = str_replace($urllist[$i], "<p class='pop'><a href='".$urllist[$i]."'><img src='/img/load.png' data-original='".$urllist[$i]."' class='lazy' alt='投稿写真' height='128' ><noscript><img src='".$urllist[$i]."' width='128' alt='投稿写真'></noscript></a></p>", $array);
  }else{
    $array = str_replace($urllist[$i], "<a href='".$urllist[$i]."'>".$urllist[$i]."</a>", $array);
  }
}
//document.getElementById("ex3").src = "example2.gif";
//  var_dump($urllist);
  return $array;
}
$org_timeout = ini_get('default_socket_timeout');
ini_set('default_socket_timeout', 1);
if(!($json = file_get_contents("http://askmona.org/v1/responses/list?t_id=".$_GET['id']."&topic_detail=1"))) exit("time out\n");
$date = json_decode($json);
$count = $date->topic->count;
if(!($json = file_get_contents("http://askmona.org/v1/responses/list?t_id=".$id."&from=1&to=".$count."&topic_detail=1>"))) exit("time out\n");
$date = json_decode($json);
//$var_dump($date);
for($i = 0; $i < $count; $i++){
  echo $date->responses[$i]->r_id."　:　";
  echo "<a href='profile.php?id=".$date->responses[$i]->u_id."'>".$date->responses[$i]->u_name;
  echo $date->responses[$i]->u_dan."</a>　:　";
  echo date("Y/m/d H:i:s",$date->responses[$i]->created)."　";
  echo "[".$date->responses[$i]->u_times."]　";
  $receive = intval($date->responses[$i]->receive);
  $receive = $receive / 100000000;
  echo $receive." Mona/";
  echo $date->responses[$i]->rec_count."人<br><br>\n";
  $txt = esc(htmlspecialchars($date->responses[$i]->response, ENT_QUOTES, 'UTF-8', false));
  echo $txt;
//  var_dump($txt);
//  echo esc($date->responses[$i]->response);
  echo "<hr>\n";
}
?>
<div style="padding: 10px; margin-bottom: 10px; border: 1px dotted #333333; border-radius: 5px;">
ここに掲載する広告を募集中です。一ヶ月1Monaで掲載します。興味のある方はonokatio@gmail.comまで。
</div>

<?php
if($moremona_login == "d"){
  mymysql();
  $result = mysql_query("SELECT * FROM moremona.askmore WHERE name LIKE '".$moremona_username."'");
  $row = mysql_fetch_array($result);
  if($row['secretkey'] != ""){
//  if($moremona_username == "onokatio"){
    echo "このトピックに投稿する。";
    echo "<form action='post.php?id=".$id."' method='post'>";
    echo "<input type='checkbox' name='sage' value='sage'>sage";
    echo "<textarea name='text' rows='4' cols='40'></textarea>";
    echo "<input type='submit' value='書き込む'>";
  }else{
    echo "MOREmona!アカウントにaskmonaアカウントを追加していないと投稿できません。";
  }
}else{
  echo "ログインしないと投稿できません。";
}
echo "<hr>";
ini_set('default_socket_timeout', $org_timeout);

//<script type="text/javascript">
//  $("img.lazy").lazyload({
//    event : "click"
//  });
//</script>
?>
<script type="text/javascript">
  $(function() {
    $("img.lazy").show().lazyload();
  });
</script>
