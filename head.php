<?php
if(!($json = file_get_contents('http://mona-coin.com/all_price/api2'))) exit("time out\n");
if(!($json2 = file_get_contents('https://www.allcoin.com/api2/pair/MONA_BTC'))) exit("time out\n");
$date = json_decode($json);
$date2 = json_decode($json2);
?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="/parts/header.css">
<script type="text/javascript">
function chImg(img, str) {
  document.images[img].src = str;
}
</script>
<style type="text/css">
img.lazy {
   display: none;
}
.pop a:hover{ /*マウスが乗ったら*/
        position: relative;
        top: 0px; left: 0px;
}
.fukidasipop { /*吹き出し本体*/
        position: absolute;
        top:-50px; left:0px;
        display: none; /*何も表示しない*/
        padding: 5px; /*内側の余白*/
        width: 300px; /*ブロックの幅*/
        font-weight: bold; /*文字の太さ*/
        text-decoration: none; /*文字飾り*/
        color: #ffffff; /*文字色*/
        background-color: #b22222; /*背景色*/
        border-top:white solid 10px;
        border-left:#b22222 solid 10px;
     filter: alpha(opacity=85); /* IE */
     -moz-opacity:0.85; /*Firefox・Netscape*/
     opacity:0.85; /* Opera・Safari */
}
a:hover .fukidasipop {
        display: block; /*ブロック要素で表示*/
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" charset="utf-8"></script>
<script src="/js/jquery.lazyload.min.js" charset="utf-8"></script>
<script src="/js/jquery.easy-rollover.js" charset="utf-8"></script>
<title>MOREmona!</title>
</head>
<body>
<div id="wrap">
  <div id="header">
    <div class='l'><a href="/index.php">TOOM</a></div>
    <?echo "<div class='r'>1mona = ".$date->{'3days_average_index_price'}."円=".$date2->data->trade_price."BTC　"?>
<?php
//<a href="http://satoshinakamoto.jp/bitcoinwidget.php"  id="bitcoinwidget" lang="ja" home="jpy">ビットコインウィジェ$
//<script type="text/javascript"  src="http://satoshinakamoto.jp/js/bitcoinwidget.js"></script>

session_start();
$moremona_login = $_SESSION['moremona-login'];
$moremona_username = $_SESSION['moremona-username'];
if($_SESSION['moremona-login'] == "d"){
  echo "<a href='/moremona/accounts.php'>".$_SESSION['moremona-username']."</a>　";
  echo "<a href='/moremona/login/logout.php'>ログアウト</a></div>";
}else{
  echo "<a href='/moremona/login/sign.php'>新規登録</a>　";
  echo "<a href='/moremona/login/login.php'>ログイン</a></div>";
}
session_write_close();
?>
  </div>
<br>
<h1><a href='/moremona/'>MOREmona!</a></h1>
<a href='/moremona/askmore/askmore.php'>askMORE</a>
<hr>
