<?php
  session_start();

  // エラーメッセージ
  $errorMessage = "";
  // 画面に表示するため特殊文字をエスケープする
  $viewUserId = @htmlspecialchars($_POST["userid"], ENT_QUOTES);
//データベース接続
try{
	$dbh = new PDO('mysql:host=localhost;dbname=testdb','testus','pass');
}catch(PDOException $e){
	var_damp($e->getMessage());
	eixt;
}
  // ログインボタンが押された場合
  if (isset($_POST["login"])) {
	$name = htmlspecialchars($_POST["userid"]);
	$pass = htmlspecialchars($_POST["password"]);
	$sql = "select * from user where id = '$name' and pass = '$pass' ";
	$stmt = $dbh->query($sql);
    $user = $stmt->fetchALL(PDO::FETCH_ASSOC);

	$stmt->execute();
	/*cunt = mysql_num_rows($sql);*/

    // 認証成功
    if (count($user)==1) {
      // セッションIDを新規に発行する
      session_regenerate_id(TRUE);
      $_SESSION["USERID"] = $_POST["userid"];

      header("Location: main.php");

      exit;
    }
    else {
      $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
    }
  }
$dbh=null;

?>
