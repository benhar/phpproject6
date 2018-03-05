<?php
require('include/function.php');
if(isset($_SESSION['username']))
	header('Location:home.php');
$username="";
$password="";
$email="";

if(isset($_POST['login'])){
	$username=isset($_POST['username'])?inputFilter($_POST['username']):"";
	$password=isset($_POST['password'])?inputFilter($_POST['password']):"";
	$email=isset($_POST['email'])?inputFilter($_POST['email']):"";

	$query=mysqli_query($conn,"select * from student where ((StudentEmail='$email' OR Username='$username') AND Password='$password')");
	if(mysqli_num_rows($query) == 1){
		while($row=mysqli_fetch_array($query)){
			if(!strcmp($row['Password'],$password)){
				$_SESSION['username']=$username;
				$_SESSION['name']=$row['FirstName']." ".$row['LastName'];
				$_SESSION['recoverysubmit']=False;
				header('Location:home.php');
			}
			else
				$_SESSION['errmsg']="Password is incorrect. <a href='passrecover.php'>Forgot Password?</a>";
		}
	}
	else{
		$query=mysqli_query($conn,"select * from student where (StudentEmail='$email' OR Username='$username')");
		if(mysqli_num_rows($query) == 1){
			$_SESSION['errmsg']="Password is incorrect. <a href='passrecover.php'>Forgot Password?</a>";
		}
		else{
			$_SESSION['errmsg']="Username or Email is incorrect";
		}
	}
}
if(isset($_SESSION['username']) and $_SESSION['username']!=""){
	header('Location:home.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Log In - <?php echo "$siteName"; ?></title>
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
		<?php
		if(isset($_SESSION['statusmsg'])){?>
		<div class="msg">
			<?php
			echo $_SESSION['statusmsg'];
			unset($_SESSION['statusmsg']);
			?>
		</div>
		<?php } ?>
		<?php
		if(isset($_SESSION['errmsg'])){?>
		<div class="msg">
			<?php
			echo $_SESSION['errmsg'];
			unset($_SESSION['errmsg']);
			?>
		</div>
		<?php } ?>
		<div class="form1">
			<div class="article">
				<div class="article-title"><h2>Log In</h2></div>
				<div class="article-box">
					<div class="col1">
						<form action="" method="post">
							<input type="text" name="username" placeholder="Username or Email" value="<?php echo $username;?>" required>
							<input type="password" name="password" placeholder="Password" required><br>
							<input type="submit" name="login" Value="Log In" class="btn">
						</form>
						<h4>Not a member? <a href="signup.php">Sign Up</a> here.</h4>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="clearfix"></div>
	</div><!-- ./container -->


	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ns");
	?>
</body>
</html>