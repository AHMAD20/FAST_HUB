<?php
session_start();


if(isset($_POST["submit"])){
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$degree=$_POST["degree"];
	$rollno=$_POST["rollno"];
	$batch=$_POST["batch"];
	$email=$_POST["email"];
	$gender=$_POST["gender"];
	$dob=$_POST["dob"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	if($rollno !="" AND $fname !="" AND $lname!="" AND $username != "" AND $password != "" AND $dob !="" AND $gender!="" AND $email != "" AND $batch != "" AND $degree != ""){
		
		include "db.php";
		
		$connectionStatu = connect_db();
		$member=is_member($connectionStatu,$username);
		
		if(!$member){
			$status=signup_user($connectionStatu,$fname,$lname,$rollno,$username,$degree,$batch,$gender,$dob,$email,$password);
		/*echo print_r($status);exit;*/
		if($status==true){
			header("Location: signup.php?id=success&v=You are signed up successfully!!");
		}else{
				header("Location: signup.php?id=error&v=Error: An error has occured. Cannot sign up");
		}
		}else{
				header("Location: signup.php?id=error&v=Error: Username:$username already exists");
		}	
		
	}else{
			header("Location: signup.php?id=error&v=Error: All fields mandatory");

	}
	
}else{
	header("Location: index.php?id=error&v=Please login to your account");
}
?>