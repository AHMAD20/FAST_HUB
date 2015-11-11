
<?php
session_start();

if(isset($_POST["submit"]) AND !empty($_POST["box"])){
	$id=$_SESSION['id'];
	$rollno=$_SESSION['rollno'];
	$event=$_POST['box'];
		include "db.php";
		
		$connectionStatus = connect_db();
        $result=create_event($connectionStatus,$id,$rollno,$event);
		if($result){
			header("Location: events.php?id=&v=Success");
		}
		else{
			echo "Error";
		}          
	    header("Location: events.php");
		
	}else{
			header("Location: events.php?id=error&v=Error: All fields mandatory");

	}
	
?>