<?php require('include/function.php'); 
$StudentID="";
$username=$_SESSION['username'];
$query=mysqli_query($conn,"select * from student where Username='$username'");
while ($row=mysqli_fetch_array($query)){
	$StudentID=$row['StudentID'];
}


if(isset($_SESSION['username'])){?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home - <?php echo "$siteName"; ?></title>
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
				<div class="article-title"><h2>Select A Exam</h2></div>
				<div class="article-box">
					<div class="col1 exmselect">
						<form action="confirmation.php" method="POST">
							<select name="subcode" id="subcode" required>
								<option value="">Subject</option>
								<option value="1">English</option>
							</select>
							<div class="clearfix"></div>
							<select name="quecode" id="quecode" required>
								<option value="">Exam</option>
								<option value="1">Spelling</option>
							</select>
							<div class="clearfix"></div>
							<button type="submit" class="btn" name="selectexam">Next</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
		$query=mysqli_query($conn,"select * from result where StudentID=$StudentID order by Date DESC limit 5");
		if(mysqli_num_rows($query)>0){?>
		<div class="form2">
			<div class="article">
				<div class="article-title"><h2>Recent Exams</h2></div>
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
		</div>
		<?php } ?>
	</div><!-- ./container -->


	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ns");
	?>
</body>
</html>
<?php }
else{
	header("Location:login.php");
}
?>