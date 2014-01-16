
<?php
session_start();
try{
	$dbh = new PDO('mysql:host=localhost;dbname=testdb','testus','pass');
}catch(PDOException $e){
	var_damp($e->getMessage());
	eixt;
}
//________________________________________________________________________________________
//初期値表示
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
//idと日にちを取得
$id = $_SESSION["USERID"];
$day= $_SESSION["day"];

//初めに表示する値をを引っ張ってくるSQL
$sql ="select * from hiyou where day ='$day' and id = '$id'";
$stmt2= $dbh->query($sql);

//初めに表示する値を格納する変数
while($user = $stmt2->fetch(PDO::FETCH_ASSOC)){

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
//____________________________________________________________________________________________________________________________
//データ追加処理
//書き込むボタンを押した時の処理
 if (isset($_POST["submit"])) {
//$userid = $_SESSION["USERID"];
//test中$dayをコメントアウトhtmlができしだい変更
//$day  = $_REQUEST["month"];
$syoku = $_POST['meal'];
$kosai = $_POST['drv'];
$koutu = $_POST['ent'];
$syoumou = $_POST['cons'];
$goraku = $_POST['joy'];
$iryou  = $_POST['med'];
$tyokin  = $_POST['dep'];
$ron  = $_POST['ron'];
$yatin  = $_POST['yatin'];
$tuusin  = $_POST['tuusin'];
$kounetu  = $_POST['kounetu'];


//同じ日の処理があるか
	$sqls = "select * from hiyou where day = '$day'and id='$id'";
	$stmt = $dbh->query($sqls);
    //$user = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if(count($stmt)>=1){
//値の更新
$sql = "UPDATE hiyou set   syoku= '$syoku', kosai = '$kosai', koutu= '$koutu', syoumou ='$syoumou', goraku='$goraku',iryou='$iryou',tyokin='$tyokin',ron=$ron,yatin='$yatin',
		tuusin = '$tuusin',kounetu='$kounetu' where  id ='$id'   and day = '$day'";
$stmt = $dbh->prepare($sql);
$stmt->execute();

}else{
	//新規で追加
 		$sql = "insert into hiyou (id,day,syoku,kosai,koutu,syoumou,goraku,iryou,tyokin,ron,yatin,tuusin,kounetu)
 		values('$userid','$day',$syoku','$kousai','$koutu','$syoumou','$goraku','$iryou','$tyokin','$ron','$yatin','$tuusin','$kounetu')";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
	}

	//sqlの成功で完了ページ
	if($stmt == true){
		header("Location: done.html");
	}else{
		echo "失敗";
	}



}
$pdh = null;

