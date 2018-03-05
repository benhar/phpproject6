<?php
require('include/function.php');
$email="";
$username="";
$error=False;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Password Recovery - <?php echo "$siteName";?></title> 
	<?php getCss("ns");?>
</head>
<body>
	<?php
	include('include/site/header.php');
	?>
	<!-- Header Section End -->


	<div class="container">
		<br>
		<?php if(!$_SESSION['recoverysubmit']) {?>
		<div class="form1">
			<div class="article"  id="">
				<div class="article-title"><h2>Password Recovery</h2></div>
				<div class="article-box">
					<div><br>
						<form action="process.php" method="post">
							<?php
							if(isset($_SESSION['errmsg'])){?>
							<div class="msg"><?php echo $_SESSION['errmsg'];unset($_SESSION['errmsg']);?></div>
							<?php }?>

							<input type="text" name="username" placeholder="Enter Your Username" value="" required>
							<input type="email" name="email" placeholder="Enter Your Email" value="" required>
							<input type="submit" name="rpsubmit" Value="Submit" class="btn">
						</form>

					</div>
				</div>
			</div>
		</div>
		<?php } ?>


		<?php if($_SESSION['recoverysubmit']) {?>
		<div class="form1">
			<div class="article"  id="">
				<div class="article-title"><h2>Submitted</h2></div>
				<div class="article-box">
					<div><br>
						<div class="msg">Your Recovery email is successfully sent. Please check your mail inbox. Please be noted, this can take few minutes to delivery the mail.</div>
						<form action="process.php" method="POST">
							<input type="hidden" name="username" Value="<?php echo $_SESSION['recoverysubmitusername'];?>">
							<input type="submit" name="rpmailresend" Value="Resend Mail" class="btn">
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="clearfix"></div>
		<br><br><br>
	</div><!-- ./container -->


	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ns");
	?>
</body>
</html>