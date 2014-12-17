<?php 
	session_start();
	if (!$_SESSION[userid]) {
		header("location:login.php");
		exit();
	}
	//连接数据库
	$con = mysql_connect("localhost","root","");
	if (! $con) {
		die("MySQL Error：".mysql_error());
	};
	mysql_select_db("php_db",$con);
	mysql_query("SET NAMES 'utf8'");

	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$user_query = mysql_query("SELECT * FROM user WHERE id = $userid LIMIT 1");
	$row = mysql_fetch_array($user_query);

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>用户ID：<?php echo $userid; ?></h2>
	<h2>用户名：<?php echo $username; ?></h2>
	<h2>邮箱：<?php echo $row['emaill']; ?></h2>
	<h2>密码：<?php echo $row['password']; ?></h2>
	<a href="logincheck.php?action=logout">注销</a> | <a href="index.php">主页</a>
	
</body>
</html>