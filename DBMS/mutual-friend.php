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
                            <a id="Home" href="main_page.php">Home</a>
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
              <div id="right-panel">  
              
              <?php
                        include "db.php";

                        $connectionStatus = connect_db();
                        $query1="select myid from friends";
                        $query2="select status from friends";
                        $result1 = mysqli_query($connectionStatus,$query1);
                        $info1=mysqli_fetch_field($result1);
                        $result2 = mysqli_query($connectionStatus,$query2);
                        $info2=mysqli_fetch_field($result2);
                        $myid=$info1->name;
                        $status=$info2->name;


$myid1=$_SESSION['id'];
$connectionStatus1 = connect_db();
$q="SELECT * FROM friends where myid='$myid1' AND status='F'";
$result1 = mysqli_query($connectionStatus1,$q);
if(mysqli_affected_rows($connectionStatus1)!=0){
	$id5=0;
	
					   echo "<table>";
                      echo "<tr>";
                      echo "<th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> <th>First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> <th>Last Name&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Batch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Degree</th>";
				 	  //$d = mysqli_fetch_assoc($result1);
					  //$id=$d["friendid"];
					  while($d = mysqli_fetch_assoc($result1)){
					    
						$id=$d["friendid"]; 
                        $connectionStatus = connect_db();
					    $q1="SELECT * FROM students where id='$id'";
					    $result = mysqli_query($connectionStatus,$q1);
						if(mysqli_affected_rows($connectionStatus)!=0)
						{
						$d2 = mysqli_fetch_assoc($result);
						$id=$d2['id'];
						}
						//echo $id;
						
						$connectionStatus = connect_db();
					    $q2="SELECT * FROM friends where myid='$id' AND status='F'";
					    $result2 = mysqli_query($connectionStatus,$q2);
						if(mysqli_affected_rows($connectionStatus)!=0){
							$d3 = mysqli_fetch_assoc($result2);
							$id2=$d3["friendid"];
						}
						//echo $id2;
						
						
						$connectionStatus = connect_db();
					    $q3="SELECT * FROM friends where myid='$myid1' AND friendid='$id2' AND status='F'";
					    $result3 = mysqli_query($connectionStatus,$q3);
						if(mysqli_affected_rows($connectionStatus)!=0){
							$d3 = mysqli_fetch_assoc($result3);
							
						}
						$id3 = $d3["friendid"];
								
						if(mysqli_affected_rows($connectionStatus1)!=0){
					    
						echo "<tr>";
                        echo "<td>".$d2["id"]."</td>";
                        echo "<td>".$d2['fname']."</td>";
                        echo "<td>".$d2["lname"]."</td>";
						echo "<td>".$d2['batch']."</td>";
                        echo "<td>".$d2["degree"]."</td>";
												
						}
						
						$connectionStatuss = connect_db();
					    $q4="SELECT * FROM students where id='$id3'";
					    $result4 = mysqli_query($connectionStatuss,$q4);
						if(mysqli_affected_rows($connectionStatuss)!=0){
						while($d4 = mysqli_fetch_assoc($result4))
						      {
						
						$id4 = $d4["id"];
						
						$id5=$id4;
						//echo "Mutual Friend";
						//echo "<br><th>ID</th> <th>First Name</th> <th>Last Name</th><th>Batch</th><th>Degree</th><br>";
						if(mysqli_affected_rows($connectionStatuss)!=0){ 
						echo "<tr>";
                        echo "<td>".$d4["id"]."</td>";
                        echo "<td>".$d4['fname']."</td>";
                        echo "<td>".$d4["lname"]."</td>";
						echo "<td>".$d4['batch']."</td>";
                        echo "<td>".$d4["degree"]."</td>";
						
						
						       }
						
						}
					}
						
						
					
						?>
                        <?php
						echo "</tr>";
						
                      }
                      echo "</table>";


                      if(isset($_GET["id"])){
                        echo "<div id='".$_GET["id"]."'>".$_GET["v"]."</div>";
                      }
					  
}else{
	echo "Friend Circle is empty";
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















