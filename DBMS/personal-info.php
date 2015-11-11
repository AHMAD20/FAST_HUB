<?php
session_start();

if(isset($_SESSION["user"])){
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>personal-info</title>
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
				   echo "<br>";
				   echo "First Name:"."     ".$_SESSION['fname']."<br><br>";
				   echo "Last Name:"."      ".$_SESSION['lname']."<br><br>";
				   echo "User Name:"."      ".$_SESSION['username']."<br><br>";
				   echo "User ID:"."        ".$_SESSION['id']."<br><br>";
				   echo "Roll Number:"."    ".$_SESSION['rollno']."<br><br>";
				   echo "Batch:"."          ".$_SESSION['batch']."<br><br>";
				   echo "Degree:"."         ".$_SESSION['degree']."<br><br>";
				   echo "Date of Birth:"."  ".$_SESSION['dob']."<br><br>";
				   echo "Email:"."          ".$_SESSION['email']."<br><br>";
				   echo "password:"."       ".$_SESSION['password']."<br><br>";
				   echo "Date of Birth:"."  ".$_SESSION['dob']."<br><br>";
				   
              ?>    
              </div>
                 
       </div>
</body>
</html>

<?php	
}else{
	header("Location: main_page.php");
}
?>