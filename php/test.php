<?php 
	$con = mysql_connect("localhost","root","");
	if (! $con) {
		die("出错了：".mysql_error());
	};
	mysql_select_db("php_db",$con);
	mysql_query("SET NAMES 'utf8'");

	// if(!mysql_select_db("php_db",$con)){
	// 	if (mysql_query("CREATE DATABASE php_db",$con)) {
			
	// 		echo "创建数据库并连接成功";
	// 	}else{
	// 		echo "出错了：".mysql_error();
	// 	}
	// }else{
	// 	echo "已有数据库已经连接";
	// }

	// if (@$_POST['submit']) {
	// 	$sql = "INSERT INTO message (id,user,title,content,lastdate) values ('','$_POST[name]','$_POST[title]','$_POST[content]',now())";
	// 	mysql_query($sql);
	// 	echo "成功";
	// };


 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>留言板</title>
 </head>
 <body>
 	<form action="submit.php" method="post">
 		姓名：<input type="text" name="name"><br>
 		标题：<input type="text" name="title"><br>
 		内容：<textarea name="content" id="" cols="30" rows="10"></textarea><br>
 		<input type="submit" value="发表留言" name="submit">
 	</form>

 	<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
<?php 
	$sqq = "SELECT*FROM message order by id desc";
	$query = mysql_query($sqq);
	while ($row=mysql_fetch_array($query)) {
 ?>
	  <tr bgcolor="#eff3ff">
	  <td>标题： <?php echo @$row[title] ?>  用户： <?php echo @$row[user] ?> </td>
	  <td>时间： <?php echo @$row[lastdate] ?></td>
	  </tr>
	  <tr bgColor="#ffffff">
	  <td colspan="2">内容： <?php echo @$row[content] ?> </td>
	  </tr>
  	<?php 
		}
	 ?>
	</table>

 </body>
 </html>