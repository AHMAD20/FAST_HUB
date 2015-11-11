<?php
session_start();

if(isset($_SESSION["user"])){
	header("Refresh: 3; URL=profile.php");
}else{
	header("Location: index.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Success Page</title>
<link rel="stylesheet" href="public/css/style.css"
</head>

<body>
       <div id="wrapper">
              <div id="success-info">
                 <h2>You are successfully authenticated</h2>
                 <h4>Redirecting to User Profile...</h4>
              </div>
                  
       </div>
</body>
</html>