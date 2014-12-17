<?php 
	session_start();
	// $password = md5("");var_dump($password);die;
	//注销
	if ($_GET['action'] == "logout") {
		unset($_SESSION[userid]);
		unset($_SESSION[username]);
		echo "注销成功，点击此处<a href='login.php'>登录</a>";
		exit;
	}

	if (!isset($_POST['submit'])) {
		exit("非法访问!");
	}else{
		//格式化用户名
		$username = htmlspecialchars($_POST[username]);
		if ($username == "" || $_POST[password] == "") {
			echo "<script>alert('用户名或密码不能为空！');history.go(-1);</script>";
		}else{
			
			//连接数据库
			$con = mysql_connect("localhost","root","");
			if (! $con) {
				die("MySQL Error：".mysql_error());
			};
			mysql_select_db("php_db",$con);
			mysql_query("SET NAMES 'utf8'");

			//密码MD5加密
			$password = md5($_POST[password]);
			//查询
			$check_query = mysql_query("SELECT id FROM user WHERE username = '$username' AND password = '$password' LIMIT 1");
			while ($result = mysql_fetch_array($check_query)) {
				if ($result) {
					//登陆成功
					$_SESSION[username] = $username;
					$_SESSION[userid] = $result[id];
					echo $username, "欢迎您，进入<a href='my.php'>用户中心</a><br>";
					echo "点击此处 <a href='logincheck.php?action=logout'>注销</a>";
					exit;
				}else{
					exit("用户名或密码错误，点击此处 <a href='javascript:history.back(-1);'>返回重试</a>");
				};
			};
		};
	};
 ?>