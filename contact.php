<?php 
require('include/function.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact Us - <?php echo "$siteName"; ?></title>
	<?php getCss("ns"); ?>
</head>
<body>
	<!-- Header Section Start -->
	<?php 
	include('include/site/header.php');
	?>
	<!-- Header Section End -->


	<div class="container">
		<div class="col2-2">
			<div class="article"  id="contact-form">
				<div class="article-title"><h2>Contact Form</h2></div>
				<div class="article-box">
					<div class="col1">
						<form action="#" method="get" name="contact-form">
							<div class="contact-form">
								<input id="senderName" type="text" name="senderName" placeholder="Enter Your Name" required><br>

								<input id="senderEmail" type="email" name="senderEmail" placeholder="Enter Your Email" required><br>

								<input id="senderSubject" type="text" name="senderSubject" placeholder="Enter Subject" required><br>
							</div>
							<div class="contact-form">
								<textarea id="senderMessage" name="senderMessage" cols="35" rows="4" placeholder="Your Message" required></textarea>
							</div>
							<div class="clearfix"></div>
							<input type="submit" class="btn" Value="Send Mail">
						</form>
					</div>
				</div>
			</div>
			<div class="article"  id="contact-details">
				<div class="article-title"><h2>Contact Details</h2></div>
				<div class="article-box">
					<div class="col1">
						<div class="article" id="address">
							<div class="box1">
								<h3>Address</h3>
								<h4>
									<table width="100%">
										<tr>
											<td width="35%">House Number</td>
											<td width="5%">:</td><td width="60%">#021</td>
										</tr>
										<tr>
											<td width="35%">Road Number</td>
											<td width="5%">:</td><td width="60%">#021</td>
										</tr>
										<tr>
											<td width="35%">City</td>
											<td width="5%">:</td><td width="60%">City Name</td>
										</tr>
										<tr>
											<td width="35%">State</td>
											<td width="5%">:</td><td width="60%">State Name</td>
										</tr>
										<tr>
											<td width="35%">Country</td>
											<td width="5%">:</td><td width="60%">Country Name</td>
										</tr>
									</table>
								</h4>
							</div>
						</div>
						<div class="article" id="phone">
							<div class="box2">
								<h3>Phone</h3>
								<h4>
									<table width="100%">
										<tr>
											<td width="35%">Author</td>
											<td width="5%">:</td><td width="60%">+1234567890</td>
										</tr>
										<tr>
											<td width="35%">Emergency</td>
											<td width="5%">:</td><td width="60%">+1234567891</td>
										</tr>
										<tr>
											<td width="35%">Help Desk</td>
											<td width="5%">:</td><td width="60%">+1234567892</td>
										</tr>
									</table>
								</h4>
							</div>
						</div>
						<div class="article" id="emails">
							<div class="box1">
								<h3>Emails</h3>
								<h4>
									<table width="100%">
										<tr>
											<td width="35%">Author</td>
											<td width="5%">:</td><td width="60%">author@oes-anything.com</td>
										</tr>
										<tr>
											<td width="35%">Emergency</td>
											<td width="5%">:</td><td width="60%">emergency@oes-anything.com</td>
										</tr>
										<tr>
											<td width="35%">Help Desk</td>
											<td width="5%">:</td><td width="60%">help@oes-anything.com</td>
										</tr>
									</table>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col2-1">
			<div class="article"  id="subscribe">
				<div class="article-title"><h2>Subscribe Newsletter</h2></div>
				<div class="article-box">
					<div class="col1">
						<form action="#" method="get">
							<input type="email" name="subscribeMail" placeholder="Enter Your Email Here" required><br>
							<input type="submit" Value="Subscribe" class="btn">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div><!-- ./container -->


	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ns");
	?>
</body>
</html>