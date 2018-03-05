<div class="header">
		<div class="logobox">
			<a href="home.php">OES</a>
		</div><!-- /.logobox -->
		<span id="header-ver-line"></span>
		<div class="menutrigger" id="mainmenutrigger">
			<span></span>
		</div>
		<div class="mainmenu">
			<ul>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</div><!-- /.mainmenu -->
		<div class="clearfix"></div>
	</div><!-- /.header -->
	<div class="user-panel">
		<div class="user-panel-icon" id="user-panel-icon">
			<img src="images/icons/user.png" alt="">
		</div>
		<div class="userarea">
			<?php if(isset($_SESSION['username']) and $_SESSION['username']!=""){?>
			<div class="loggeduserarea">
				<span><?php
				$u=$_SESSION['username'];
				$sql=mysqli_query($conn,"SELECT * from student where Username='$u'");
				while($rows=mysqli_fetch_array($sql)){
					$_SESSION['name']=$rows['FirstName']." ".$rows['LastName'];
				echo  $_SESSION['name'];}?></span>
				<ul>
					<li><a href="profile.php">Profile</a></li>
				</ul>
			</div>
			<a href="logout.php">Log Out</a>
			<?php }
			else{?>
			<a href="login.php">Log In</a><a href="signup.php">Sign Up</a>
			<?php } ?>
		</div>
	</div>