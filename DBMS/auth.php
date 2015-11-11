<?php
session_start();


if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	if($username != "" AND $password != ""){
		
        if($username == "admin" AND $password == "123"){
			$_session['username']=$username;
			$_session['password']=$password;
			header("location:admin.php");
		}
		else
		{
		include "db.php";
		
		$connectionStatu = connect_db();
		$status=find_user($connectionStatu,$username,$password);
		
		if(is_array($status)){
			$_SESSION["user"] = $status["fname"]." ".$status["lname"];
			$_SESSION["id"]= $status["id"];
			$_SESSION["fname"]=$status["fname"];
			$_SESSION["lname"]=$status["lname"];
			$_SESSION["rollno"]= $status["rollno"];
			$_SESSION["username"]=$status["username"];
			$_SESSION["degree"]=$status["degree"];
			$_SESSION["batch"]= $status["batch"];
			$_SESSION["gender"]=$status["gender"];
			$_SESSION["dob"]=$status["dob"];
			$_SESSION["email"]= $status["email"];
			$_SESSION["password"]=$status["password"];
			$_SESSION["username"]=$username;
			
			/*echo $_SESSION["user"]; echo $username; echo $status["fname"];
			exit;*/          
			header("Location: personal-info.php");
		}
		else{
				header("Location: index.php?id=error&v=Error: incorrect Username/Password");}
				
		}
	}else{
			header("Location: index.php?id=error&v=Error: All fields mandatory");

	}
	
}else{
	header("Location: index.php?id=error&v=Please login to your account");
}
?>