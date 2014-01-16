<?php
session_start();

try{
	$dbh = new PDO('mysql:host=localhost;dbname=testdb','testus','pass');
}catch(PDOException $e){
	var_damp($e->getMessage());
	eixt;
}

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}
echo "おかえりなさい" . $_SESSION["USERID"] . "さん";

//sessionから今日の日付を取得　合計計算処理
//_____________________________________________________________________
$syoku = 0;
$kosai = 0;
$koutu = 0;
$syoumou = 0;
$goraku = 0;
$iryou  = 0;
$tyokin  = 0;
$ron  = 0;
$yatin  = 0;
$tuusin  = 0;
$kounetu  = 0;

$date = date("Y.m.d");
$id = $_SESSION["USERID"];
$sql = "select * from hiyou where  day ='$date'and id ='$id'";
$stmt =$dbh->query($sql);
//各項目ごとに集計
while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
$syoku = $user["syoku"]+$syoku;
$kosai = $user["kosai"]+$kosai;
$koutu = $user["koutu"]+$koutu;
$syoumou = $user["syoumou"]+$syoumou;
$goraku = $user["goraku"]+$goraku;
$iryou  = $user["iryou"]+$iryou;
$tyokin  = $user["tyokin"]+$tyokin;
$ron  = $user["ron"]+$ron;
$yatin  = $user["yatin"]+$yatin;
$tuusin  = $user["tuusin"]+$tuusin;
$kounetu  = $user["kounetu"]+$kounetu;
}

$goukei = $syoku+$kosai+$koutu+$syoumou+$goraku+$iryou+$tyokin+$ron+$yatin+$tuusin+$kounetu;
//______________________________________________________________
//合計処理end　短くしたい

//編集ボタンが押された時の処理
if(isset($_POST["post"])){
	//選択された日付が入る
$_SESSION["day"] = $_POST["date"];
}