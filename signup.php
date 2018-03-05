<?php
require('include/function.php');
if(isset($_SESSION['username']))
	header('Location:home.php');
$fname="";
$lname="";
$gender="";
$dob="";
$email="";
$phone="";
$address="";
$username="";
$password1="";
$password2="";
$error=False;

if(isset($_POST['register'])){
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
	$email=isset($_POST['email'])?inputFilter($_POST['email']):"";
	$phone=isset($_POST['phone'])?inputFilter($_POST['phone']):"";
	$address=isset($_POST['address'])?inputFilter($_POST['address']):"";
	$username=isset($_POST['username'])?inputFilter($_POST['username']):"";
	$password1=isset($_POST['password1'])?inputFilter($_POST['password1']):"";
	$password2=isset($_POST['password2'])?inputFilter($_POST['password2']):"";
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['errmsg'].="Invalid email format.<br>";
		$error=True; 
	}
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
	if(strlen($email)<=6){
		$_SESSION['errmsg'].="Enter a valid Email.<br>";
		$error=True;
	}
	if(strlen($phone)<=8){
		$_SESSION['errmsg'].="Enter a valid Phone.<br>";
		$error=True;
	}
	if(strlen($username)<=2){
		$_SESSION['errmsg'].="Username is must have to not empty or less than 3 characters.<br>";
		$error=True;
	}
	if(strlen($password1)<=7){
		$_SESSION['errmsg'].="Minimum character of password must have to 8.<br>";
		$error=True;
	}

	if(strlen($gender)>2&&!$error){
		if($password1==$password2){
			$query=mysqli_query($conn,"select * from student where StudentEmail='$email' OR StudentPhone='$phone' OR Username='$username'");
			if(mysqli_num_rows($query) == 0){
				if(mysqli_query($conn,"insert into student(FirstName,LastName,StudentGender,StudentDOB,StudentAddress,StudentEmail,StudentPhone,Username,Password) VALUES('$fname','$lname','$gender','$dob','$address','$email','$phone','$username','$password1')")){
					$_SESSION['statusmsg']="Registration Successful.<br>Log In with your username and password.";
					header('Location:login.php');
				}
			}
			else{
				while($row=mysqli_fetch_array($query)){
					if($row['username']==$username){
						$_SESSION['errmsg'].="Username is already taken! ";
					}
					if($row['StudentEmail']==$email){
						$_SESSION['errmsg'].="A member is already registered with this Email.<br>";
					}
					if($row['StudentPhone']==$phone){
						$_SESSION['errmsg'].="A member is already registered with this Phone.<br>";
					}
				}
			}
		}
		else{
			$_SESSION['errmsg'].="Passwords are not matched!<br>";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sign Up - <?php echo "$siteName"; ?></title> 
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
		<div class="form1">
			<div class="article"  id="sign-up-form">
				<div class="article-title"><h2>Sign Up</h2></div>
				<div class="article-box">
					<div >
						<br>
						<form action="" method="post">
							<?php
							if(isset($_SESSION['errmsg'])){?>
							<div class="msg">
								<?php
								echo $_SESSION['errmsg'];
								unset($_SESSION['errmsg']);
								?>
							</div>
							<?php } ?>
							<input type="text" name="fname" placeholder="Enter Your First Name" value="<?php echo $fname; ?>" required>
							<input type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $lname; ?>">
							<select name="gender" id="" required>
								<option value="<?php echo $gender;?>">Gender</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Others</option>
							</select>
							<input type="text" name="dob" placeholder="Date Of Birth (YYYY-MM-DD)" value="<?php  echo $dob;?>" required>
							<input type="email" name="email" placeholder="Enter Your Email" value="<?php echo $email; ?>" required>
							<input type="text" name="phone" placeholder="Enter Phone Number" value="<?php echo $phone; ?>" required>
							<input type="text" name="address" placeholder="Your Address" value="<?php echo $address; ?>">
							<input type="text" name="username" placeholder="Choose a Username" value="<?php echo $username; ?>" required>
							<input type="password" name="password1" placeholder="Enter a Password" value="<?php echo $password1; ?>" required>
							<input type="password" name="password2" placeholder="Enter Password again" value="<?php echo $password2; ?>" required>
							<input type="submit" name="register" Value="Sign Up" class="btn">
							<h5>By clicking Sign Up you agree to our new <a href="">T&C's</a></h5>
						</form>
					</div>
				</div>
			</div>
		</div>
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