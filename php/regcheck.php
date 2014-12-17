<?php 
	$con = mysql_connect("localhost","root","");
	if (! $con) {
		die("MySQL Error：".mysql_error());
	};
	mysql_select_db("php_db",$con);
	mysql_query("SET NAMES 'utf8'");

	if (isset($_POST["submit"])) {
		$user = $_POST[username];
		$pwd = $_POST[password];
		$pwd_confirm = $_POST[confirm];
		if ($user == "" || $pwd == "" || $pwd_confirm == "") {
			echo "<script>alert('请确认信息完整性'); history.go(-1);</script>";
		}else{
			if ($pwd == $pwd_confirm) {
				//检测用户名是否存在
				$sql = "SELECT username FROM user WHERE username = '$_POST[username]'";
				$result = mysql_query($sql);
				$num = mysql_num_rows($result);
				if ($num) {
					echo "<script>alert('用户名已经存在'); history.go(-1);</script>";
				}else{
					//提交数据到数据库
					$password = md5($_POST[password]);
					$sql_insert = "INSERT INTO user (username, password, phone, emaill) VALUES ('$_POST[username]', '$password', '$_POST[phone]', '$_POST[emaill]')";
					$res_insert = mysql_query($sql_insert);
					if ($res_insert) {
						echo "<script>alert('注册成功'); history.go(-1);</script>";
					}else{
						echo "<script>alert('系统繁忙,请稍后再试'); history.go(-1);</script>";
					};
				};
			}else{
				echo "<script>alert('两次密码不一样'); history.go(-1);</script>";
			};
		};
	}else{
		echo "<script>alert('提交未成功'); history.go(-1);</script>";
	};
 ?>