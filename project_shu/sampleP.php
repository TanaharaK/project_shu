<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>フォームのサンプル</title> 
</head>
<body>
<?php
	if($_POST['submit']) {
		echo "あなたの名前は<b>".$_POST['yourName']."</b>です<br>";
		echo "あなたの性別は<b>".$_POST['sex']."</b>です<br>";
	}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
あなたの名前：<input type="text" name="yourName"><br> 
<br><input type="radio" name="sex" value="男">男<br>
<input type="radio" name="sex" value="女">女<br> 
<input type="submit" name="submit" value="送信">
</form>
</body>
</html>
