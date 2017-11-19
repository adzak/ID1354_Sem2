<?php

session_start();
if($_SESSION['uname'])
    session_destroy();


// Handle Post
if (count($_POST))
{
    $uname = $_POST['uname'];
    $password = $_POST['psw'];
    $handle = fopen("accounts.txt", "a");
    fwrite($handle,"\n".$uname.','.$password);
    fclose($handle);
    header('Location: http://localhost/login.php');
    
}


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
    <h1>Sign up</h1>
    <div class = "transbox">
         <form method="POST" action="">
            <div class="imgcontainer">
            </div>
             
            <div class="container">
                <p>*All fields require</p>
                <label>Username</label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label>Password</label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Sign up</button>
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