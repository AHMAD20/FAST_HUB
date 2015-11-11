<?php
session_start();

if(isset($_SESSION["user"])){
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Success Page</title>
<link rel="stylesheet" href="publicc/css/style.css">
</head>

<body>
       <div id="wrapper">
              <div id="header">
                 <h2>Logo</h2>
                 <a id="change-password" href="change-password.php">Change Password</a>
                 <a id="logout" href="logout.php">Logoff</a>
              </div>
              <div id="content">
                    <h2>Welcome: <?php echo $_SESSION["user"]; echo $_SESSION["id"]; ?></h2>
                    
              </div>
                 
       </div>
</body>
</html>

<?php	
}else{
	header("Location: index.php");
}
?>