<?php
session_start();

if(isset($_SESSION["user"])){
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search</title>
<link rel="stylesheet" href="public/css/style2.css">
</head>

<body>
       <div id="wrapper">
              <div id="header">
                     <div id="logo">
                           <img src="public/img/fast.jpg">
                     </div>
                     <div id="search">
                            <form action="search-page.php" method="post" >
                            <input type="text" name="search" placeholder="Search by fname or rollno">
                            <button type="submit" name="submit" value="submit">Search</button>
                            </form>
                     </div>
                     <div class="buttons">
                            <a id="Home" href="status.php">Home</a>
                            <a id="logout" href="logout.php">Logoff</a>
                     </div>
              </div>
              <div id="left-panel">
                    <br>
                     <img rel="icon" src="public/img/person.ico" style="width:40px;height:40px;margin-left:-10px;    margin-top:30px;position:absolute;">
                     <a id="wall" href="wall.php">Wall</a><br><br>
                     <a id="status" href="status.php">Status</a><br><br>
                     <a id="personal-info" href="personal-info.php">Personal Info</a><br><br>
                     <hr margin-top="200px">
                     <img rel="icon" src="public/img/events.png" style="width:40px;height:40px;margin-left:-10px;    margin-top:10px;position:absolute;">
                     <a id="Events" href="events.php">Create Events</a><br><br>
                     <a id="Events" href="join-events.php">Events</a><br><br>
                     <a id="Events" href="join-events-new.php">Join Events</a><br><br>
                     <a id="Friends" href="friend.php">Send Friend request</a><br><br>
                      <img rel="icon" src="public/img/user.png" style="width:40px;height:40px;margin-left:-10px;    margin-top:10px;position:absolute;">
                     <a id="Friends-list" href="friend-list.php">Friends List</a><br><br>
                     <a id="Friends-request" href="friend-request.php">Pending Friend requests</a><br><br>
                     <a id="accept-request" href="accept-request.php">Accept Friend requests</a><br><br>
                     <a id="mutual-friend" href="mutual-friend.php">Mutual Friends</a><br><br>
                     <img rel="icon" src="public/img/settings.png" style="width:40px;height:40px;margin-left:-10px;    margin-top:-10px;position:absolute;">
                     <a id="settings" href="settings.php">Settings</a>
              </div>
              <?php
			           if(isset($_GET["id"])){
				          echo "<div id='".$_GET["id"]."'>".$_GET["v"]."</div>";
						  
			           }
              ?> 
              <div id="rrright-panel">  
                            <form action="friend.php" method="GET" >
                            <input type="text" name="PersonID" placeholder="Send request through Person ID">
                            <button type="submit" name="submit" value="submit">Send Request</button>
                            </form>
<?php

$myid=$_SESSION['id'];;

if(isset($_GET['PersonID']) AND !empty($_GET['PersonID']))
{
	include "db.php";
	$fid=$_GET['PersonID'];
	$connectionStatus = connect_db();
	$result=select_data2($connectionStatus,$fid,$myid);
	
	if($result)
	{
		$connectionStatus = connect_db();
		$query="select * from friends where (myid='$myid' AND friendid='$fid') OR (myid='$fid' AND friendid='$myid') AND status='F'";
		$result = mysqli_query($connectionStatus,$query);
		
		if(mysqli_affected_rows($connectionStatus)==0)
				{
					
					$connectionStatus = connect_db();
					$query="select * from friends where (myid='$myid' AND friendid='$fid') OR (myid='$fid' AND friendid='$myid') AND status='P'";
					$result = mysqli_query($connectionStatus,$query);
		
						if(mysqli_affected_rows($connectionStatus)==0)
						{
						
							$connectionStatus = connect_db();
							insert_data($connectionStatus,$myid,$fid);
							echo "<br>friend request sent successfully ";
						}
								else 
								echo "<br>Already Friend request sent";
		//$querry = "INSERT INTO friends (id,myid,friendid) VALUES ('','$myid','$fid')";
	   //$result = mysqli_query($connectionStatus,$querry);
				}
			
			else
					echo "<br>Already in your Friend circle";

 

	//$result=mysqli_query($connectionStatus,$query);
	}
	else
	echo "<br>Error: Invalid ID";
	}
?>
                   </div>                  
				  
              </div>          
       </div>
</body>
</html>

<?php	
}else{
	header("Location: main_page.php");
}
?>















