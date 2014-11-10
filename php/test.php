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
 	<link rel="stylesheet" href="css.css">
	<script src="jquery.js"></script>
	<script src="index.js"></script>
 </head>
 <body>
 	<div class="message-board">
 		<h1 class="title">Message Board</h1>
 		<div class="form-box">
 			<form action="submit.php" method="post" id="form-submit">
 				<div class="input-bbox" id="name-box">
 					<span class="title-span">Name：</span><div class="input-box"><input type="text" name="name" placeholder="Input your name" id="name-input"></div>
 					<div class="error">用户名不能为空</div>
 				</div>
		 		<div class="input-bbox" id="title-box">
		 			<span class="title-span">Title：</span><div class="input-box"><input type="text" name="title" placeholder="Input your title" id="title-input"></div>
		 			<div class="error">标题不能少于6个字符</div>
		 		</div>
		 		<table cellspacing="0">
		 			<tr>
		 				<td valign="top" align="right"><span class="title-span">Content：</span></td>
		 				<td><div class="area-box"><textarea name="content" id="text-input" cols="30" rows="10" placeholder="Input your content"></textarea><div class="text-error">留言内容不能为空</div></div></td>
		 			</tr>
		 			<tr>
		 				<td valign="top" align="right"><span class="title-span">&nbsp;</span></td>
		 				<td><input type="submit" value="Submit" name="submit" class="submit-button"></td>
		 			</tr>
		 		</table>
		 		
		 	</form>
 		</div>
 	</div>
 	
	<div class="message-board content-box">
		<h1 class="content-list">Content List</h1>
		<table width=1000 border="0" align="center"cellspacing="1">
		<?php 
			$sqq = "SELECT*FROM message order by id desc";
			$query = mysql_query($sqq);
			while ($row=mysql_fetch_array($query)) {
		 ?>
			  <tr height="58">
			  <td>标题： <?php echo @$row[title] ?>  用户： <?php echo @$row[user] ?> </td>
			  <td align="right"><?php echo @$row[lastdate] ?></td>
			  </tr>
			  <tr>
			  <td colspan="2" class="content-style">内容： <?php echo @$row[content] ?> </td>
			  </tr>
		  	<?php 
				}
			 ?>
		</table>
	</div>
 	
 </body>
 </html>