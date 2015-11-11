<?php
session_start();

if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$opassword=$_POST["opassword"];
	$npassword=$_POST["npassword"];
	$cnpassword=$_POST["cpassword"];	
	
	if($username != "" AND $opassword != "" AND $npassword!="" AND $cnpassword!=""){
		
		include "db.php";
		
		$connectionStatu = connect_db();
		$status=is_correct_password($connectionStatu,$username,$opassword);
		
		if($npassword!= $cnpassword){
			 header("Location: settings.php?id=error&v=Error: New and Confirm New Passwords are Mismatched");
		}else if($status==true AND $npassword==$cnpassword){
			$status=change_password($connectionStatu,$username,$npassword);
			if($status==true){
				header("Location: settings.php?id=success&v=Password Changed Successfully!!");
			}else{
				header("Location: settings.php?id=error&v=Error: Unable to Change Password");
			}
		}else if($status==false AND $npassword==$cnpassword){
			header("Location: settings.php?id=error&v=Error: Incorrect Old Password");
		}
		
	}else{
			header("Location: settings.php?id=error&v=Error: All fields mandatory");
	}
	
}else{
	header("Location: index.php?id=error&v=Please login to your account");
}
?>