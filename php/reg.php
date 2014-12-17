
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" href="./css/css.css">
</head>
<body>
	<div class="message-board content-box">
		<h1 class="content-list">注 册</h1>
		<form action="regcheck.php" method="post" class="reg-form">
			<div class="input-bbox">
				<span class="title-span paper">用户名：</span><div class="input-box paper"><input type="text" name="username" placeholder="Input your email or phone number"></div>
			</div>
			<div class="input-bbox">
	 			<span class="title-span paper">密码：</span><div class="input-box paper"><input type="password" name="password" placeholder="Input your password"></div>
	 		</div>
	 		<div class="input-bbox">
	 			<span class="title-span paper">确认密码：</span><div class="input-box paper"><input type="password" name="confirm" placeholder="Check your password"></div>
	 		</div>
	 		<div class="input-bbox">
	 			<span class="title-span paper">手机号码：</span><div class="input-box paper"><input type="text" name="phone" placeholder="Input your phone number"></div>
	 		</div>
	 		<div class="input-bbox">
	 			<span class="title-span paper">电子邮箱：</span><div class="input-box paper"><input type="email" name="emaill" placeholder="Input your Email"></div>
	 		</div>
	 		<div class="input-bbox">
	 			<span class="title-span paper">&nbsp;</span><input type="submit" value="Submit" name="submit" class="submit-button big">
	 		</div>
	 		<a href="index.php">返回</a>
		</form>
	</div>
</body>
</html>