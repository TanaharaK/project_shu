<?php
//git用
try{
	$dbh = new PDO('mysql:host=localhost;dbname=testdb','testus','pass');
}catch(PDOException $e){
	var_damp($e->getMessage());
	eixt;
}
 if (isset($_POST["touroku"])) {
$userid = $_POST['userid'];
$pass  = $_POST['password'];
$pass2 = $_POST['check'];
$name = $_POST['name'];
$sex = $_REQUEST['sex'];
$old = $_POST['old'];
$job = $_REQUEST['job'];

//test
 	$sql = "insert into user (id,pass,name,sex,old,job)values('$userid','$pass','$name','$sex','$old','$job')";
$stmt = $dbh->prepare($sql);
$stmt->execute();

	if($stmt == true){
		header("Location: done.html");
	}else{
		echo "失敗";
	}
}
