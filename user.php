<?php
require('include/function.php');
$name="";
unset($name);
if(isset($_GET['u'])){
	$username=$_GET['u'];
	$query=mysqli_query($conn,"select * from student where Username='$username'");
	while($row=mysqli_fetch_array($query)){
		$name=$row['FirstName']." ".$row['LastName'];
	}
}
else
	header('Location:home.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php
	if(isset($name))
		echo $name." - ".$siteName;
	else
		echo $siteName;
	?></title>
	<?php getCss("ns"); ?>
</head>
<body>
	<!-- Header Section Start -->
	<?php
	include('include/site/header.php'); 
	?>
	<!-- Header Section End -->

	<div class="container">
		<?php
		$query=mysqli_query($conn,"select * from student where Username='$username'");
		if(mysqli_num_rows($query)==1){while($row=mysqli_fetch_array($query)){$StudentID=$row['StudentID']?>
		<div class="profile">
			<div class="details">
				<div class="proicon">
					<img src="images/icons/user.png" alt="<?php echo $name;?>">
					<div class="clearfix"></div>
					<div class="name-index">
						<h2><?php echo $name;?></h2>
						<?php echo $username;?>
					</div>
				</div>
				<br><hr>
				<strong>Gender:</strong> <?php echo $row['StudentGender'];?><br><hr>
				<strong>Date Of Birth:</strong> <?php echo $row['StudentDOB'];?><br><hr>
			</div>

			<div class="statistics">
				<?php
				$query=mysqli_query($conn,"select * from result where StudentID=$StudentID order by Date DESC limit 5");
				if(mysqli_num_rows($query)>0){?>
				<div class="form2">
					<div class="article">
						<div class="article-title"><h2>Statistics</h2></div>
						<div class="article-box">
							<table>
								<tr>
									<th>Exam</th>
									<th>Date</th>
									<th>Marks</th>
									<th>Time</th>
								</tr>
								<?php
								while($row=mysqli_fetch_array($query)){?>
								<tr>
									<td><?php
									$SubjectCode=$row['SubjectCode'];
									$QuestionCode=$row['QuestionCode'];
									$name="";
									$r=mysqli_query($conn,"select * from subjects where SubjectCode=$SubjectCode");
									while ($ro1=mysqli_fetch_array($r)) {
										$name.=$ro1['SubjectName'];
									}
									$re=mysqli_query($conn,"select * from questions where QuestionCode=$QuestionCode");
									while ($ro2=mysqli_fetch_array($re)) {
										$name.=" ".$ro2['ExamName'];
									}
									echo $name;
									?></td>
									<td><?php echo $row['Date']; ?></td>
									<td><?php echo $row['Mark']; ?></td>
									<td><?php
									$duration=$row['Time'];
									$durations=$duration%60;
									$durationm=($duration-$durations)/60; 
									if($durationm<10)
										echo "0".$durationm.":";
									else
										echo $durationm.":";
									if($durations<10)
										echo "0".$durations." Minutes";
									else
										echo $durations." Minutes";
									?></td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
					</div><?php }
					else{?>
					<div class="form2">
						<div class="article">
							<div class="article-title"><h2>Statistics</h2></div>
							<div class="article-box">
								<h4>No Data Available</h4>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php }
		}?>
	</div><!-- ./container -->

	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ns");
	?>
</body>
</html>