<?php
require('include/function.php');
$etime=time();
$stime=$_SESSION['examstime'];
unset($_SESSION['examstime']);
$duration=$etime-$stime;
$durations=$duration%60;
$durationm=($duration-$durations)/60;
$username=$_SESSION['username'];
$StudentID="";
$countr=0;
$countw=0;
$countt=0;
$mark=0.0;

if(isset($_POST['submitans'])){
	$QuestionCode=$_POST['questionCode'];
	$SubjectCode=$_POST['subjectCode'];
	$query=mysqli_query($conn,"select * from student where Username='$username'");
	while ($row=mysqli_fetch_array($query)){
		$StudentID=$row['StudentID'];
	}
	$c=1;
	while($c<=40){
		$temp="ansqn".$c;
		if(isset($_POST[$temp])){
			$ans=$_POST[$temp];
			$countt=$countt+1;
			$result=mysqli_query($conn,"select * from valid_answers where QuestionCode=$QuestionCode AND QuestionID=$c AND ValidAnswer='$ans'");
			if(mysqli_num_rows($result) == 1){
				$countr++;
			}
			else
				$countw++;
		}
		$c++;
	}
	$mark=$countr-($countw*0.25);
}
$date=date('d M, Y');
mysqli_query($conn,"insert into result(StudentID,SubjectCode,QuestionCode,Date,RightAnswers,WrongAnswers,Mark,Time) values($StudentID,$SubjectCode,$QuestionCode,'$date',$countr,$countw,$mark,$duration)");
header('Location:result.php');

$_SESSION['recoverysubmit']=False;


$email="";
$username="";
$error=False;
$_SESSION['recoverysubmit']=False;
if(isset($_POST['rpsubmit'])){
	$username=isset($_POST['username'])?inputFilter($_POST['username']):"";
	$email=isset($_POST['email'])?inputFilter($_POST['email']):"";
	$query=mysqli_query($conn,"SELECT * FROM student where Username='$username' AND StudentEmail='$email'");
	if(mysqli_num_rows($query)==1){
		//All Correct
		$securitykey=time();
		if(mysqli_query($conn,"INSERT into passrecover VALUES('$username',$securitykey)")){
			//inserted
			$_SESSION['recoverysubmit']=True;
			$_SESSION['recoverysubmitusername']=$username;
			header('Location:passrecover.php');
		}
		else{
			mysqli_query($conn,"UPDATE passrecover SET SecurityKey = $securitykey WHERE Username = '$username'");
			//Updated
			$_SESSION['recoverysubmit']=True;
			$_SESSION['recoverysubmitusername']=$username;
			header('Location:passrecover.php');
		}
	}
	else{
		$result=mysqli_query($conn,"SELECT * FROM student where Username='$username'");
		$r=mysqli_query($conn,"SELECT * FROM student where StudentEmail='$email'");
		if(mysqli_num_rows($result)==1 && mysqli_num_rows($r)==1){
			//Username and Email Not matching
			$_SESSION['errmsg'].="Email and Username Not Matched.";
			header('Location:passrecover.php');
		}
		else if(mysqli_num_rows($result)==1 && mysqli_num_rows($r)!=1){
			//Only Username Correct
			$_SESSION['errmsg'].="Email is not correct.";
			header('Location:passrecover.php');
		}
		else if(mysqli_num_rows($result)!=1 && mysqli_num_rows($r)==1){
			//Only Email Correct
			$_SESSION['errmsg'].="Username is not correct.";
			header('Location:passrecover.php');
		}
		else if(mysqli_num_rows($result)!=1 && mysqli_num_rows($r)!=1){
			//Nothing is correct
			$_SESSION['errmsg'].="No user is available with this email or username.";
			header('Location:passrecover.php');
		}
	}
}
if(isset($_POST['rpmailresend'])){
	$username=isset($_POST['username'])?inputFilter($_POST['username']):"";
	$query=mysqli_query($conn,"SELECT * from passrecover where Username='$username'");
	if(mysqli_num_rows($query)==1){
		while($row=mysqli_fetch_array($query)){
			$securitykey=$row['SecurityKey'];
			//send Mail
			$_SESSION['recoverysubmit']=True;
			$_SESSION['recoverysubmitusername']=$username;
			header('Location:passrecover.php');
		}
	}
}
?>