<?php require('include/function.php');
if(!isset($_SESSION['username']))
	header('Location:login.php');
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Confirmation - <?php echo "$siteName"; ?></title>
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
		<?php if(isset($_POST['selectexam'])&&$_POST['subcode']!=0&&$_POST['quecode']!=0) {?>
		<div class="form2">
			<div class="article">
				<div class="article-title"><h2>Confirmation</h2></div>
				<div class="article-box">
					<div class="col1">
						<ul>
							<li>Be Sure, JavaScript is enabled in your browser.</li>
							<li>There will be 40 questions.</li>
							<li>Total time is 40 minutes.</li>
							<li>Total mark is 40, 1 for each.</li>
							<li>Negative marking for 1 wrong answer is 0.25 .</li>
							<li>Don't reload or close your examination page.</li>
							<li>If you try to leave out examination page more than 3 times, your answer will be submitted automatically.</li>
						</ul>
						<form action="test.php" method="post" id="exconform">
							<input type="hidden" name="subcode" value="<?php echo $_POST['subcode']; ?>">
							<input type="hidden" name="quecode" value="<?php echo $_POST['quecode']; ?>">
							<button type="submit" class="btn" name="confirmation" value="true">Start Exam</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php }else{?>
		<br><br>
		<div class="form2">
			<div class="article">
				<div class="article-title"><h2>Ooops...!</h2></div>
				<div class="article-box">
					<div class="col1">
						<h4>No Question is selected</h4>
						<h4>Please go back <a href="home.php">Home Page</a> and select a question</h4>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div><!-- ./container -->


	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ws");
	?>
</body>
</html>