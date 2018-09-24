<?php
function mypost($datearg , $urlarg){
$datearg = http_build_query($datearg, "", "&");
$header = array(
        "Content-Type: application/x-www-form-urlencoded",
        "Content-Length: ".strlen($datearg)
  );
  $options = array('http' => array(
    'method' => 'POST',
    'header' => implode("\r\n", $header),
    'content' => $datearg,
  ));
  $contents = file_get_contents($urlarg, false, stream_context_create($options));
  return $contents;
}
function res($msg){

}
function mymysql(){
  $link = mysql_connect('192.168.3.250', 'moremona', '');
  $db_selected = mysql_select_db('askmore', $link);
}

function angou($arg){
  $pass1 = MD5($arg);
  $pass2 = sha1($pass1);
  $pass3 = '21'.$pass2.'43'.$pass1;
  $pass4 = hash('sha256',$pass3);
  $pass5 = MD5($pass4);
  $pass6 = sha1($pass5);
  $pass7 = hash('sha256',$pass6);
  return $pass7;
}
?>
