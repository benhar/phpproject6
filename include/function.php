<?php
session_start();
$conn=mysqli_connect("localhost","root","","oes");
$siteName = "Online Exam System";
function getCss($optionCss){
	if($optionCss=="ws"){
		echo "";
	}
	if($optionCss=="ns"){
		echo " 
		<link rel=\"stylesheet\" href=\"css/style.css\">
		";
	}
}
function getScript($optionScript){
	if($optionScript=="ws"){
		echo "
		<script src=\"js/jquery-2.x-git.min.js\"></script>
		<script src=\"js/function.js\"></script>
		";
	}
	if($optionScript=="ns"){
		echo " 
		<script src=\"js/jquery-2.x-git.min.js\"></script>
		<script src=\"js/function.js\"></script>
		";
	}
}
function inputFilter($testData){
	$testData=htmlspecialchars($testData);
	$testData=stripslashes($testData);
	$testData=stripcslashes($testData);
	return $testData;
}

function includeMenutrigger(){
	echo "
	<div class=\"left-nav-button\" id=\"left-nav-button\">
	<div class=\"menutrigger\"><span>+</span></div>
	</div>
	";
}


?>
