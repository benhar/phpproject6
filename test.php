<?php require('include/function.php'); 
$_SESSION['examstime']=time();
if(!isset($_SESSION['username']))
	header('Location:login.php');
$subcode="";
$quecode="";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Test - <?php echo "$siteName"; ?></title>
	<?php getCss("ns"); ?>
	<link rel="stylesheet" href="css/test.css">
</head>
<body>
	<!-- Header Section Start -->
	<?php 
	include('include/site/header.php');
	?>
	<!-- Header Section End -->
	<div class="container">
		<?php if(isset($_POST['confirmation'])) {?>
		<div class="question-index">
			<div class="sheet-title-holder">
				<h2>Question Index</h2>
			</div>
			<div class="item-holder" id="index-list">
				<?php
				for($i=1;$i<41;$i++){
					if($i<10){
						if($i==1)
							echo "<button class=\"question-number question-number-active\"  id=\"qi$i\">0$i</button>\n";
						else if($i==2)
							echo "<button class=\"question-number next-question\"  id=\"qi$i\">0$i</button>\n";
						else
							echo "<button class=\"question-number\"  id=\"qi$i\">0$i</button>\n";
					}
					else{
						echo "<button class=\"question-number\"  id=\"qi$i\"><span>$i</span></button>\n";
					}
				}
				?>
				<br><br><br><br>
			</div>
			<div id="index-trigger-hide"><div>Hide Index</div></div>
		</div>
		<div class="sheet">
			<div class="sheet-title-holder">
				<h2>Question And Answers</h2><h4 id="timer"></h4>
			</div>
			<div class="item-holder">
				<?php
				$subcode=$_POST['subcode'];
				$quecode=$_POST['quecode'];
				?>
				<form action="process.php" method="POST">
					<input type="text" name="subjectCode" value="1" class="input-disabled">
					<input type="text" name="questionCode" value="1" class="input-disabled">
					<?php
					$query=mysqli_query($conn,"SELECT * from allquestion where QuestionCode=$quecode");
					while($row=mysqli_fetch_array($query)){?>
					<div id="qn<?php  echo $row['QuestionID'];?>">
						<div class="question-text-title">
							<?php 
							if($row['QuestionID']<10)
								echo "0".$row['QuestionID'];
							else
								echo $row['QuestionID'];
							?>. <?php  echo $row['QuestionText1'];?>
						</div>
						<div class="question-text">
							<span><?php  echo $row['QuestionText2'];?></span><br><br>
							<input type="radio" name="ansqn<?php  echo $row['QuestionID'];?>" id="ansqn<?php  echo $row['QuestionID'];?>a" value="a"> <label for="ansqn<?php  echo $row['QuestionID'];?>a"> <?php  echo $row['Optiona'];?> </label><br>
							<input type="radio" name="ansqn<?php  echo $row['QuestionID'];?>" id="ansqn<?php  echo $row['QuestionID'];?>b" value="b"> <label for="ansqn<?php  echo $row['QuestionID'];?>b"> <?php  echo $row['Optionb'];?> </label><br>
							<input type="radio" name="ansqn<?php  echo $row['QuestionID'];?>" id="ansqn<?php  echo $row['QuestionID'];?>c" value="c"> <label for="ansqn<?php  echo $row['QuestionID'];?>c"> <?php  echo $row['Optionc'];?> </label><br>
							<input type="radio" name="ansqn<?php  echo $row['QuestionID'];?>" id="ansqn<?php  echo $row['QuestionID'];?>d" value="d"> <label for="ansqn<?php  echo $row['QuestionID'];?>d"> <?php  echo $row['Optiond'];?> </label><br>
						</div>
					</div>
					<?php } ?>
					<br><br><br><br><br>




					<div class="sheet-action-panel">
						<div class="pnsbutton" id="index-trigger-show">Show Index</div>
						<div class="pnsbutton" id="prev">Prev</div>
						<div class="pnsbutton" id="next">Next</div>
						<button class="pnsbutton"  type="submit" name="submitans"  value="true">Submit</button>
						<div class="rm7228">
							<div id="timeexpire">
								<h3>Time Expired</h3>
								<button class="pnsbutton" type="submit" name="submitans" value="true">Submit</button>
							</div>
						</div>
					</div>
					<br><br>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<?php }
		else{?>
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
	getScript("ns");
	?>
	<script src="js/test.js"></script>
	<?php 
	include('include/site/timer.php');
	?>
</body>
</html>