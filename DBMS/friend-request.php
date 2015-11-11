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

//$myid1=$_SESSION['id'];
//$connectionStatus = connect_db();
//$qq="SELECT * FROM friends where (myid='$myid1' OR friendid='$myid1') AND status='P'";
//$result11 = mysqli_query($connectionStatus,$qq);
//if(mysqli_affected_rows($connectionStatus)!=0){
//$d = mysqli_fetch_assoc($result11);
//$frid=$d["friendid"];
//}
//echo $frid;
//exit;

$myid1=$_SESSION['id'];
$connectionStatus = connect_db();
$q="SELECT * FROM friends where (friendid='$myid1') AND status='P'";
$result1 = mysqli_query($connectionStatus,$q);
if(mysqli_affected_rows($connectionStatus)!=0){
	
					  echo "<table>";
                      echo "<tr>";
                      echo "<th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> <th>First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> <th>Last Name&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Batch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Degree</th>";
				 	  //$d = mysqli_fetch_assoc($result1);
					  //$id=$d["friendid"];
					  while($d = mysqli_fetch_assoc($result1)){
					    
						$id=$d["myid"]; 
                        $connectionStatus = connect_db();
					    $q1="SELECT * FROM students where id='$id'";
					    $result = mysqli_query($connectionStatus,$q1);
						$d2 = mysqli_fetch_assoc($result);
						
						if(mysqli_affected_rows($connectionStatus)!=0){
					    
						echo "<tr>";
                        echo "<td>".$d2["id"]."</td>";
                        echo "<td>".$d2['fname']."</td>";
                        echo "<td>".$d2["lname"]."</td>";
						echo "<td>".$d2['batch']."</td>";
                        echo "<td>".$d2["degree"]."</td>";
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
	echo "&nbsp;&nbsp;&nbsp;<br><br>No Friend request";
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















