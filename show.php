<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<style>
td{
	text-align: center;
}
</style>
	<table>
		<tr>
			<td>序号</td>
			<td>设计题目</td>
			<td>班级</td>
			<td>班级序号</td>
			<td>学号</td>
			<td>姓名</td>
		</tr>
<?php
include('conn.php');
// $show_query=mysqli_query($con,"select * from `user` ");
// while($show_array=mysqli_fetch_array($show_query))
// {
	// var_dump($show_array);
?>
		<tr>
			<td><?php// echo $show_array['topicid']?></td>
			<td>
				<?php
					// $topicid=$show_array['topicid'];
					// $topic_sql="select topic from `topic_content` where realid=$topicid";
					// $topic_query=mysqli_query($con,$topic_sql);
					// $topic_array=mysqli_fetch_array($topic_query);
					// echo $topic_array['topic'];
				?>
			</td>
			<td><?php// echo $show_array['class']?></td>
			<td><?php// echo $show_array['classid']?></td>
			<td><?php// echo $show_array['schoolid']?></td>
			<td><?php// echo $show_array['name']?></td>
		</tr>
<?php
// }
?>
<?php
$show_query=mysqli_query($con,"select * from `user` order by topicid asc");
while($show_array=mysqli_fetch_array($show_query))
{
	// var_dump($show_array);
?>
		<tr>
			<td><?php echo $show_array['topicid']?></td>
			<td>
				<?php
					$topicid=$show_array['topicid'];
					$topic_sql="select topic from `topic_content` where realid=$topicid";
					$topic_query=mysqli_query($con,$topic_sql);
					$topic_array=mysqli_fetch_array($topic_query);
					echo $topic_array['topic'];
				?>
			</td>
			<td><?php echo $show_array['class']?></td>
			<td><?php echo $show_array['classid']?></td>
			<td><?php echo $show_array['schoolid']?></td>
			<td><?php echo $show_array['name']?></td>
		</tr>
<?php
}
?>
	</table>
</body>
</html>