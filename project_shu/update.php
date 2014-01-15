<?php
try{
	$dbh = new PDO('mysql:host=localhost;dbname=testdb','testus','pass');
}catch(PDOException $e){
	var_damp($e->getMessage());
	eixt;
}




if (isset($_POST["uodate"])) {

$userid = $_POST['userid'];
$pass  = $_POST['pass'];
$pass2 = $_POST['pass2'];
$name = $_POST['name'];
$sex = $_REQUEST['sex'];
$old = $_POST['old'];
$job = $_REQUEST['job'];

$id = $_SESSION['USERID'];

$sql = "UPDATE user set id ='$userid',  pass= '$pass', name = '$name', sex= '$sex', old ='$old', job='$job' where  '$id' = id ";

$stmt = $dbh->prepare($sql);

$stmt->execute();


if($stmt == true){
	header("Location: update.html");
}else{
	echo "失敗";
	}

}



?>php





<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta http-equiv="Content-type" content="text/css">
			<title>登録フォーム</title>
			<link rel="stylesheet" href="post.css" type="text/css">
	</head>
	<body>
		<form action="" method="post" enctype="application/x-www-form-urlencoded" >
			<p>
				新規ID:<br><input id="userid" type="text" name="userid">
			</p>
			<p>
				パスワード:<br><input id="pass" type="text" name="password">
			</p>
			<p>
				パスワードの再入力:<br><input id="pass2" type="text" name="check">
			</p>
			<p>
				氏名:<br>
					<input id="name" name="name" type="text" name="username">
			</p>
			<p>
				性別:<br>
					<input type="radio" id="sex"name="sex" value="男性">男性
					<input type="radio" id="sex"name="sex" value="女性">女性
			</p>
			<p>
				年齢:<br>
					<input id="old" type="text" name="old">
			</p>
			<p>
				職業:<br>
					<select name="job" id="job">
						<option value="engineer">エンジニア<br></option>
						<option value="housewife">主婦</option>
						<option value="teacher">教師</option>
						<option value="athlete">スポーツ選手</option>
						<option value="parttimer">フリーター</option>
						<option value="restuarant">飲食店</option>
						<option value="none">無職</option>
						<option value="student">学生</option>
						<option value="other">その他</option>
					</select>
			</p>
			<br>
			<input type="submit"  id="update"  name="update" value="送信">
			<input type="reset" name="update"value="リセット">
			<br>
			<br>


		</form>

	</body>
</html>