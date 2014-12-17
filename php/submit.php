<?php 
	$con = mysql_connect("localhost","root","");
	if (! $con) {
		die("出错了：".mysql_error());
	};
	mysql_select_db("php_db",$con);
	mysql_query("SET NAMES 'utf8'");

	if (@$_POST['submit']) {
		$sql = "INSERT INTO message (id,user,title,content,lastdate) values ('','$_POST[name]','$_POST[title]','$_POST[content]',now())";
		mysql_query($sql);
		echo "成功<a href='test.php'>返回</a>";
	};
 ?>