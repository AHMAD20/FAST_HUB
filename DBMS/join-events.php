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
    <!--   <div id="wrapper"> -->
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
					
					$id=$_SESSION['id'];
					include "db.php";
		            $connectionStatus = connect_db();
					
					$query="select * from events";
					$quer=mysqli_query($connectionStatus,$query);
					$j=0;
					$roww=mysqli_num_rows($quer);
					
					while($d=mysqli_fetch_assoc($quer))
					{
					$s[$j]=$d['id'];
					$t[$j]=$d['event'];
					$tt[$j]=$d['rollno'];
					$j++;
					}
                    //$connectionStatus = connect_db();
                    ?>
                   <?php for($i=0;$i<$roww;$i++)
				   { ?>
					   
					   
                   <div id="post">
                  <?php  echo $t[$i]."<br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				  echo "Roll-no:".$tt[$i]."&nbsp&nbsp&nbsp&nbsp";
				  echo "Event id:".$s[$i];
				  
				   ?>
                   </div> <div id="space"> </div> <?php  } ?>
                    </form>
                 </div>     
                 <?php
    function check(){
		echo"<div id=post>
		
		</div>";
		
		
	}
?>
              <?php
			 if(isset($_POST['submit']) AND !empty($_GET['box']))
     		{
				   check();
			 }
			  ?>
                                
				  
             <!-- </div>      -->    
       </div>
</body>
</html>

<?php	
}else{
	header("Location: status.php");
}
?>
















