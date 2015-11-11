<?php

function connect_db(){
	$connectionStatus=mysqli_connect("localhost","root","123","users-database");
	if(!$connectionStatus){
		echo "Error connecting database";
		exit;
	}
	return $connectionStatus;
}
function select_data($connectionStatus,$value){
          $query="SELECT * FROM `students` WHERE `fname` = '$value' OR `lname` = '$value' OR `rollno` = '$value'";
	      $result=mysqli_query($connectionStatus,$query);
          if(mysqli_num_rows($result) > 0){
          	mysqli_close($connectionStatus);
          	return $result;
          }
          return false;

}
function select_data2($connectionStatus,$value,$myid){
          $query="SELECT * FROM `students` WHERE (`rollno` = '$value' OR `id` = '$value') AND $value != $myid";
	      $result=mysqli_query($connectionStatus,$query);
          if(mysqli_num_rows($result) > 0){
          	mysqli_close($connectionStatus);
          	return $result;
          }
          return false;

}
function create_event($connectionStatus,$id,$rollno,$event){
	    $querry = "INSERT INTO events (myid,rollno,event,join) VALUES ('$id','$rollno','$event','N')";
        $result1 = mysqli_query($connectionStatus,$querry);
		if(mysqli_affected_rows($connectionStatus)){
		return true;
	    }
		return false;
}
function insert_post($connectionStatus,$id,$rollno,$status){
	    $querry = "INSERT INTO post (myid,rollno,status) VALUES ('$id','$rollno','$status')";
        $result1 = mysqli_query($connectionStatus,$querry);
		if(mysqli_affected_rows($connectionStatus)){
		return true;
	    }
		return false;
}
function update($connectionStatus,$myid,$fid){
	$querry= "Update friends set status='F' where myid='$fid' AND friendid='$myid'";
	$result = mysqli_query($connectionStatus,$querry);
	if(mysqli_affected_rows($connectionStatus)){
		return true;
	}
	return false;
}
function update2($connectionStatus,$myid,$id){
	$querry= "Update events set join='Y' where myid='$myid' AND id='$id'";
	$result = mysqli_query($connectionStatus,$querry);
	if(mysqli_affected_rows($connectionStatus)){
		return true;
	}
	return false;
}

function insert_data2($connectionStatus,$myid,$fid){
	$querry = "INSERT INTO friends (id,myid,friendid,status) VALUES ('','$fid','$myid','F')";
	$result = mysqli_query($connectionStatus,$querry);
	if(mysqli_affected_rows($connectionStatus)){
		return true;
	}
	return false;
}
function insert_data($connectionStatus,$myid,$fid){
	$querry = "INSERT INTO friends (id,myid,friendid,status) VALUES ('','$myid','$fid','P')";
	$result = mysqli_query($connectionStatus,$querry);
	if(mysqli_affected_rows($connectionStatus)){
		return true;
	}
	return false;
}
function find_user($connectionStatus,$username,$password){
	$query="SELECT * FROM `students` WHERE `username` = '$username' AND `password`='$password'";
	$result=mysqli_query($connectionStatus,$query);
	if(mysqli_num_rows($result)==1){
		return mysqli_fetch_assoc($result);
	}
	return false;
}
function signup_user($connectionStatu,$fname,$lname,$rollno,$username,$degree,$batch,$gender,$dob,$email,$password){
	$query="INSERT INTO `students`(`fname`,`lname`,`rollno`,`username`,`degree`,`batch`,`gender`,`dob`,`email`,`password`) VALUE('$fname','$lname','$rollno','$username','$degree','$batch','$gender','$dob','$email','$password')";
	$result=mysqli_query($connectionStatu,$query);
	if(mysqli_affected_rows($connectionStatu)==1){
		return true;
	}
	return false;
}


function is_member($connectionStatus,$username){
	$query="SELECT * FROM `students` WHERE `username` = '$username'";
	$result=mysqli_query($connectionStatus,$query);
	if(mysqli_num_rows($result)==1){
		return true;
	}
	return false;
}
function is_correct_password($connectionStatus,$username,$password){
	$query="SELECT * FROM `students` WHERE `username`='$username' AND `password`='$password'";
$result=mysqli_query($connectionStatus,$query);
	if(mysqli_num_rows($result)==1){
		return true;
	}
	return false;
	
}
function change_password($connectionStatus,$username,$npassword){
	$query="UPDATE `students` SET `password`='$npassword' WHERE
	`username`='$username'";
$result=mysqli_query($connectionStatus,$query);
	if(mysqli_affected_rows($connectionStatus)==1){
		return true;
	}
	return false;
	
}
?>