<?php

session_start();
include("config/config.php");


if (isset($_POST['user']) && isset ($_POST['pass'])) { 
    $username = $_POST['user'];
    $password = md5($_POST['pass']);
    $mysqli = new mysqli('$Host', '$user', '$pass', '$DB');

    if ($mysqli->connect_errno) {
        echo "Sorry, this website is experiencing problems.";
        exit;
    }

	
    $sql = "SELECT id, firstname, position, employee_ID FROM users WHERE username='$username' and password='$password'";
    if (!$result = $mysqli->query($sql)) {
        echo "sql connected but error getting result";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "Incorrect Password or username... Please try again!";
        exit;
    }else{		
		$thedata = $result->fetch_assoc();	
		$_SESSION["postion"] = $thedata['position'];		
		$_SESSION["LoggedIn"] = 'yes'; 
		$_SESSION["username"] = $username;
		$_SESSION["firstname"] = $thedata['firstname'];
		$_SESSION["rank"] = $thedata['rank'];
		$_SESSION["collar"] = $thedata['collar'];
		header ("Location: portal.php"); 
    }

    $result->free();
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Login Page ">
    <meta name="author" content="Declan Fell">
    <link rel="icon" src="img/logo2.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body >
  
     <center <div class="logo">
            
                <img src="img/logo2.png" alt="" width="10%" style="margin-top:100px" /> 
        </div></center>


    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
	  
 <div class="copyright">                <center>
<br><font color="Black">All attempts to login are recorded<br> 2016 &copy; Declan Fell<br></font></i></div></center>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  
  </body>
  
</html>
