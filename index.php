<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
</head>
<body>
<div class="container-fluid">
<?php
session_start();
include("conn.php");
if(!isset($_POST['schoolid'])){
?>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2>毕业设计自动分配系统</h2>
			<h3>自动化</h3>
		</div>
		<form class="form-inline" action="index.php" method="post">
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control" autocomplete="off" name="schoolid" id="exampleInputAmount" placeholder="学号">
					<input type="text" class="form-control" autocomplete="off" name="name" id="exampleInputAmount" placeholder="姓名">
				</div>
			</div>
			<input type="submit" class="btn btn-primary">
		</form>
	</div>
<?php
}else
{
	$schoolid=$_POST['schoolid'];
	$name=$_POST['name'];
	$select_user="select * from `user` where `schoolid`=$schoolid and `name`='$name'";
	$user_query=mysqli_query($con,$select_user);
	$user_array=mysqli_fetch_array($user_query);
	if (empty($user_array))
	{
		echo "<h4>系统未收录你的信息</h4><h4>可能原因如下：</h4>";
		echo "<ol><li>非自动化2013级学生</li><li>输入的学号与姓名不匹配</li><li>在外接受培训并已上报毕业设计题目的同学</li><li>已经成为本系及外系优秀生源的同学</li><li>如你不符合以上任何一条，请立即与班长联系</li></ol>";
	}
	elseif ($user_array['topicid']!=0) {
		$topicid=$user_array['topicid'];
		$show_sql="select * from `topic_content` where realid=$topicid";
		$show_query=mysqli_query($con,$show_sql);
		$show_array=mysqli_fetch_array($show_query);
		// var_dump($show_array);
		echo "<h2>毕业设计题目</h2>";
		echo "<dl>"."<dt>"."学生"."</dt>"."<dd>".$name."</dd>"."<dt>"."选题序号"."</dt>"."<dd>".$show_array['realid']."</dd>"."<dt>"."设计题目"."</dt>"."<dd>".$show_array['topic']."</dd>"."<dt>"."指导老师"."</dt>"."<dd>".$show_array['teacher']."</dd>"."<dt>"."内容简介"."</dt>"."<dd>".$show_array['content']."</dd>"."</dl>";
	}
	else
	{
		$topic_sql="select * from `delete` order by rand() limit 1";
		$topic_query=mysqli_query($con,$topic_sql);
		$topic_array=mysqli_fetch_array($topic_query);
		// var_dump($topic_array);
		$realid=$topic_array['realid'];
		mysqli_query($con,"update `user` set `topicid`=$realid where `schoolid`=$schoolid and `name`='$name'");
		mysqli_query($con,"delete from `delete` where `realid`=$realid");
		$show_sql="select * from `topic_content` where realid=$realid";
		$show_query=mysqli_query($con,$show_sql);
		$show_array=mysqli_fetch_array($show_query);
		// var_dump($show_array);
		echo "<h2>毕业设计题目</h2>";
		echo "<dl>"."<dt>"."学生"."</dt>"."<dd>".$name."</dd>"."<dt>"."选题序号"."</dt>"."<dd>".$show_array['realid']."</dd>"."<dt>"."设计题目"."</dt>"."<dd>".$show_array['topic']."</dd>"."<dt>"."指导老师"."</dt>"."<dd>".$show_array['teacher']."</dd>"."<dt>"."内容简介"."</dt>"."<dd>".$show_array['content']."</dd>"."</dl>";
	}
}
?>
</div>
</body>
</html>