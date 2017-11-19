<?php

session_start();

if($_SESSION['uname'])
    session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tasty recipes- calendar</title>
	<link href="reset.css" rel="stylesheet" type="text/css">
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>
	<ul>
		<li><a href="index.php">HOME</a></li>
		<li><a href="recipes.php">RECIPES</a></li>
		<li><a href="calendar.php">CALENDAR</a></li>
        <li><a href="login.php">LOGIN</a></li>
        
        
	</ul>
    <h1>LOGIN</h1>
    <div class = "transbox">
         <form method="post" action="/loggedin.php">
            <div class="imgcontainer">
            <img src="images/avatar.png" alt="Avatar" class="avatar">
            </div>
             
            <div class="container">
                <p>*All fields require</p>
                <p><a href="signup.php">Don't have an account? Sign up here!</a></p>
                <label>Username</label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label>Password</label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <input type="checkbox" checked="checked"> Remember me
                </div>

                <div class="container">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>     
    </div>
    
</body>
</html>