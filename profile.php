<?php
require('include/function.php');
if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

$username=$_SESSION['username'];
$query=mysqli_query($conn,"select * from student where Username='$username'");
if(mysqli_num_rows($query)==1){
	while($row=mysqli_fetch_array($query)){
		$StudentID=$row['StudentID']?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php //echo $_SESSION['username'];
	?> Profile - <?php echo "$siteName"; ?></title>
	<?php getCss("ns"); ?>
</head>
<body>
	<!-- Header Section Start -->
	<?php
	include('include/site/header.php'); 
	?>
	<!-- Header Section End -->

	<div class="container">
		<div class="profile">
			<div class="details">
				<div class="proicon">
					<img src="images/icons/user.png" alt="<?php echo $_SESSION['name'];?>">
					<div class="clearfix"></div>
					<div class="name-index">
						<h2><?php echo $_SESSION['name'];?></h2>
						<?php echo $username;?>
					</div>
				</div>
				<br><hr>
				<strong>Gender:</strong> <?php echo $row['StudentGender'];?><br><hr>
				<strong>Date Of Birth:</strong> <?php echo $row['StudentDOB'];?><br><hr>
				<strong>Email:</strong> <?php echo $row['StudentEmail'];?><br><hr>
				<strong>Phone:</strong> <?php echo $row['StudentPhone'];?><br><hr>
				<div class="useraction">
					<a target="_blank" href="settings.php?changepass=<?php echo $row['Username'];?>" class="btn">Change Password</a>
					<a target="_blank" href="settings.php?edit=<?php echo $row['Username'];?>" class="btn">Edit</a>
				</div>
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
				</div><?php } ?>

			</div>
			<div class="clearfix"></div>
		</div>
	</div><!-- ./container -->

	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ns");
	?>
</body>
</html>
<?php }
}?>