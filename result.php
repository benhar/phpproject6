<?php require('include/function.php');
if(!isset($_SESSION['username']))
	header('Location:login.php');
$username=$_SESSION['username'];
$StudentID="";
$query=mysqli_query($conn,"select * from student where Username='$username'");
while ($row=mysqli_fetch_array($query)){
	$StudentID=$row['StudentID'];
}
$query=mysqli_query($conn,"select * from result where StudentID=$StudentID order by ID DESC limit 1");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Result - <?php echo "$siteName";?></title>
	<?php getCss("ns"); ?>
</head>
<body>
	<!-- Header Section Start -->
	<?php 
	include('include/site/header.php');
	?>
	<!-- Header Section End -->


	<div class="container">
		<br>
		<div class="form2">
			<div class="article">
				<div class="article-title"><h2>Your Result</h2></div>
				<div class="article-box">
					<div class="col1">
						<center><h3>English Spelling - US Version</h3></center>
						<ul>
							<?php
							while($row=mysqli_fetch_array($query)){?>
							<li><h4>Total Given Answer: <?php echo $row['RightAnswers']+$row['WrongAnswers'];?></h4></li>
							<li><h4>Total Right Answer: <?php echo $row['RightAnswers'];?></h4></li>
							<li><h4>Total Wrong Answer: <?php echo $row['WrongAnswers'];?></h4></li>
							<li><h4>Mark For Right Answers: <?php echo $row['RightAnswers'];?></h4></li>
							<li><h4>Negative Mark For Wrong Answers: (-)<?php echo $row['WrongAnswers']*0.25;?></h4></li>
							<li><h4>Total Marks: <?php echo $row['Mark'];?></h4></li>
							<li><h4>Time: <?php
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
							?></h4></li>
							<?php } ?>
						</ul>
						<a href="home.php" class="btn">Home</a><a href="profile.php" class="btn">Profile</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- ./container -->


	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ws");
	?>
</body>
</html>