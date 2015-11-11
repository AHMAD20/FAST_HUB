
<?php
session_start();

if(isset($_SESSION["user"])){
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password Page</title>
<link rel="stylesheet" href="public/css/style2.css">
</head>

<body>
       <div id="wrapper">
              <div id="header">
                 <h2>Logo</h2>
                 <a id="change-password" href="change-password.php">Change Password</a>
                 <a id="logout" href="logout.php">Logoff</a>
              </div>
               <?php
			           if(isset($_GET["id"])){
				          echo "<div id='".$_GET["id"]."'>".$_GET["v"]."</div>";
						  

			           }
              ?> 
              <div id="signup-wrapper">  
                   <h2>Change Password</h2>
                   <form method="post" action="change-user-password.php">                   
                   <input type="hidden" name="username" value="<?php echo $_SESSION["username"];?>"><br>
                   <input type="password" name="opassword" placeholder="old password"><br>
                   <input type="password" name="npassword" placeholder="new password"><br>
                   <input type="password" name="cpassword" placeholder="confirm new password"><br>
                   <button type="submit" name="submit" value="ok">Change Password</button>
                   </form>      
       </div>
</body>
</html>

<?php	
}else{
	header("Location: index.php");
}
?>