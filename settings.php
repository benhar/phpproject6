<?php
require('include/function.php');
$fname="";
$lname="";
$gender="";
$dob="";
$email="";
$phone="";
$address="";
$upassword="";
$username=$_SESSION['username'];
$password="";
$password1="";
$password2="";
$error=False;

if(isset($_POST['edit'])){
	$fname=isset($_POST['fname'])?inputFilter($_POST['fname']):"";
	$lname=isset($_POST['lname'])?inputFilter($_POST['lname']):"";
	$gender=isset($_POST['gender'])?inputFilter($_POST['gender']):"";
	if($gender==1)
		$gender="Male";
	if($gender==2)
		$gender="Female";
	if($gender==3)
		$gender="Others";
	$dob=isset($_POST['dob'])?inputFilter($_POST['dob']):"";
	$password=isset($_POST['password'])?inputFilter($_POST['password']):"";
	$address=isset($_POST['address'])?inputFilter($_POST['address']):"";
	if (!preg_match("/^[a-zA-Z ]*$/",$fname.$lname)) {
		$_SESSION['errmsg'].="Only letters and white space allowed in Name.<br>";
		$error=True; 
	}
	if(strlen($fname)<=2){
		$_SESSION['errmsg'].="Enter a valid First Name.<br>";
		$error=True;
	}
	if(strlen($lname)<=2){
		$_SESSION['errmsg'].="Enter a valid Last Name.<br>";
		$error=True;
	}
	if(strlen($dob)!=10){
		$_SESSION['errmsg'].="Enter a valid Date of birth.<br>";
		$error=True;
	}
	$result=mysqli_query($conn,"SELECT * FROM student WHERE Username='$username'");
	while($r=mysqli_fetch_array($result)){
		$upassword=$r['Password'];
	}
	if(strcmp($upassword,$password)){
		$_SESSION['errmsg'].="Wrong Password";
		$error=True;
	}
	if(strlen($gender)>2&&!$error){
		if(mysqli_query($conn,"UPDATE student SET FirstName='$fname',LastName='$lname',StudentGender='$gender',StudentDOB='$dob',StudentAddress='$address' WHERE Username = '$username'")){
			header('Location:profile.php');
		}
	}
}
else if(isset($_POST['changepass'])){
	$password1=isset($_POST['password1'])?inputFilter($_POST['password1']):"";
	$password2=isset($_POST['password2'])?inputFilter($_POST['password2']):"";
	if(strlen($password1)<=7){
		$_SESSION['errmsg'].="Minimum character of password must have to 8.<br>";
		$error=True;
	}
	else if(strcmp($password1,$password2)){
		$_SESSION['errmsg']="Password are not matched.";
	}
	else{
		if(mysqli_query($conn,"UPDATE student SET Password='$password1' WHERE Username = '$username'")){
			header('Location:profile.php');
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Settings -<?php echo "$siteName";?></title> 
	<?php getCss("ns");?>
</head>
<body>
	<?php
	include('include/site/header.php');
	?>
	<!-- Header Section End -->


	<div class="container">
		<br>
		<?php if(isset($_GET['edit'])&&($_GET['edit']==$_SESSION['username'])) {?>
		<div class="form1">
			<div class="article"  id="">
				<div class="article-title"><h2>Edit Details</h2></div>
				<div class="article-box">
					<div><br>
						<form action="" method="post">
							<?php
							if(isset($_SESSION['errmsg'])){?>
							<div class="msg"><?php echo $_SESSION['errmsg'];unset($_SESSION['errmsg']);?></div>
							<?php }?>
							<?php
							$result=mysqli_query($conn,"SELECT * FROM student WHERE Username='$username'");
							while($r=mysqli_fetch_array($result)){?>
							<input type="text" name="fname" placeholder="Enter Your First Name" value="<?php if(!$error) echo $r['FirstName']; else echo $fname;?>" required>
							<input type="text" name="lname" placeholder="Enter Your Last Name" value="<?php if(!$error) echo $r['LastName']; else echo $lname; ?>">
							<select name="gender" id="" required>
								<option value="<?php echo $gender;?>">Gender</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Others</option>
							</select>
							<input type="text" name="dob" placeholder="Date Of Birth (YYYY-MM-DD)" value="<?php if(!$error) echo $r['StudentDOB']; else echo $dob;?>" required>
							<input type="text" name="address" placeholder="Your Address" value="<?php if(!$error) echo $r['StudentAddress']; else echo $address;?>">
							<input type="password" name="password" placeholder="Enter Your Password to confirm" value="" required>
							<input type="submit" name="edit" Value="Save" class="btn">
							<?php $upassword=$r['Password'];?>
							<h5>By clicking Save you agree to our new <a href="">T&C's</a></h5>
							<?php } ?>
						</form>

					</div>
				</div>
			</div>
		</div>
		<?php } ?>




		<?php if(isset($_GET['changepass'])&&($_GET['changepass']==$_SESSION['username'])) {?>
		<div class="form1">
			<div class="article"  id="">
				<div class="article-title"><h2>Change Password</h2></div>
				<div class="article-box">
					<div><br>
						<form action="" method="post">
							<?php
							if(isset($_SESSION['errmsg'])){?>
							<div class="msg"><?php echo $_SESSION['errmsg'];unset($_SESSION['errmsg']);?></div>
							<?php }?>

							<?php
							$result=mysqli_query($conn,"SELECT * FROM student WHERE Username='$username'");
							while($r=mysqli_fetch_array($result)){?>
							<input type="password" name="password1" placeholder="New Password" value="" required>
							<input type="password" name="password2" placeholder="Confirm Password" value="" required>
							<input type="submit" name="changepass" Value="Change Password" class="btn">
							<?php $upassword=$r['Password'];?>
							<?php } ?>
						</form>

					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php
			if(!(isset($_GET['changepass'])&&($_GET['changepass']==$_SESSION['username']))&&!(isset($_GET['edit'])&&($_GET['edit']==$_SESSION['username'])))
				header('Location:home.php');
		?>


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