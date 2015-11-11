
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup Page</title>
<link rel="stylesheet" href="public/css/style2.css">
</head>

<body>
       <div id="wrapper">
              <div id="header">
                     <div id="logo-signup">
                           <img src="public/img/fast.jpg">
                     </div>
              </div>
       </div>       
              <?php
			           if(isset($_GET["id"])){
				          echo "<div id='".$_GET["id"]."'>".$_GET["v"]."</div>";
						  
			           }
              ?> 
              <div id="signup-wrapper">  
                   <h2>Signup</h2>
                   <hr>
                   <form method="post" action="signup-user.php">
                   <input type="text" name="fname" placeholder="First Name"><br>
                   <input type="text" name="lname" placeholder="Last Name"><br>
                   <input type="text" name="rollno" placeholder="Roll Number"><br>
                   <input type="text" name="username" placeholder="username"><br>
                   <input type="text" name="degree" placeholder="Degree"><br>
                   <input type="text" name="batch" placeholder="Batch"><br>
                   <input type="text" name="gender" placeholder="Gender"><br>
                   <input type="date" name="dob" placeholder="Date of Birth"><br>
                   <input type="email" name="email" placeholder="E-mail"><br>
                   <input type="password" name="password" placeholder="password"><br>
                   <button type="submit" name="submit" value="ok">Signup</button>
                   </form>   
              </div>
              <div id="signup-info">
                    Please login <a href="index.php">here</a>       
              </div>
       </div>
</body>
</html>