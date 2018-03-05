<?php 
require('include/function.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>About - <?php echo "$siteName"; ?></title>
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
				<div class="article-title"><h2>About OES</h2></div>
				<div class="article-box">
					<div class="col1">
						
					</div>
				</div>
			</div>
		</div>

		<div class="form2">
			<div class="article">
				<div class="article-title"><h2>Mission</h2></div>
				<div class="article-box">
					
				</div>
			</div>
		</div>

		<div class="form2">
			<div class="article">
				<div class="article-title"><h2>Vision</h2></div>
				<div class="article-box">
					
				</div>
			</div>
		</div>
	</div><!-- ./container -->


	<div class="clearfix"></div>
	<?php
	include('include/site/footer.php'); 
	getScript("ns");
	?>
</body>
</html>