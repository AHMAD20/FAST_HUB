


<?php
session_start();

if(isset($_POST["submit"]) AND !empty($_POST["box"])){
	$id=$_SESSION['id'];
	$rollno=$_SESSION['rollno'];
	$status=$_POST["box"];
		include "db.php";
		
		$connectionStatus = connect_db();
        $result=insert_post($connectionStatus,$id,$rollno,$status);
		if($result){
			echo "success";
			header("Location: status.php?id=&v=Success");
		}
		else{
			echo "Error";
		}          
	    header("Location: status.php");
		
	}else{
			header("Location: status.php?id=error&v=Error: All fields mandatory");

	}
	
?>