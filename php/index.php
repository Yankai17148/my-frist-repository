<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.error{color:#FF0000;}
	</style>
</head>
<body>
	<?php 
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "输入用户名是必须的";
			}else{
				$name = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					$nameErr = "只能输入字母和空格";
				}
			}
			if (empty($_POST["email"])) {
				$emailErr = "输入邮箱是必须的";
			}else{
				$email = test_input($_POST["email"]);
				if (!preg_match("/^[a-z\d]+(\.[a-z\d]+)*@([\da-z](-[\da-z])?)+(\.{1,2}[a-z]+)+$/",$email)) {
					$emailErr = "邮箱格式不正确";
				}
			}
			if (empty($_POST["website"])) {
				$websiteErr = "";
			}else{
				$website = test_input($_POST["website"]);
			}
			if (empty($_POST["comment"])) {
				$comment = "";
			}else{
				$comment = test_input($_POST["comment"]);
			}
			if (empty($_POST["gender"])) {
				$genderErr = "选择性别是必须的";
			}else{
				$gender = test_input($_POST["gender"]);
			}
		}
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	 ?>
	 <h2>PHP表单验证</h2>
	 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	 	姓名：<input type="text" name="name"><span class="error"><?php echo $nameErr; ?></span><br><br>
	 	邮箱：<input type="text" name="email"><span class="error"><?php echo $emailErr; ?></span><br><br>
	 	网址：<input type="text" name="website"><span class="error"><?php echo $websiteErr; ?></span><br><br>
	 	评论：<textarea name="comment" id="" cols="30" rows="10"></textarea><br><br>
	 	性别：<input type="radio" name="gender" id="" value="男"> 男 <input type="radio" name="gender" id="" value="女"> 女 <span class="error"><?php echo $genderErr ?></span><br>
	 	<input type="submit" value="提交" name="submit">
	 </form>
	 <?php 
	 	echo "<h2>您的输入：</h2>";
	 	echo $name;
	 	echo "<br>";
	 	echo $email;
	 	echo "<br>";
	 	echo $website;
	 	echo "<br>";
	 	echo $comment;
	 	echo "<br>";
	 	echo $gender;
	  ?>
</body>
</html>