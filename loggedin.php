<?php

// Handle Post
if (count($_POST))
{
    // Parse users.txt
    $loginData = file('accounts.txt');
    $accessData = array();
    foreach ($loginData as $line) {
        list($username, $password) = explode(',', $line);
        $accessData[trim($username)] = trim($password);
    }

    // Parse form input
    $uname = isset($_POST['uname']) ? $_POST['uname'] : '';
    $psw = isset($_POST['psw']) ? $_POST['psw'] : '';

    // Check input versus login.txt data
    if (array_key_exists($uname, $accessData) && $psw == $accessData[$uname]) {
        session_start();
        $_SESSION['uname'] = $uname;
    } 
    
    else {
        header('Location: http://localhost/loginfailed.php');
    }
}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Tasty recipes</title>
	<link href="reset.css" rel="stylesheet" type="text/css">
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>
	<ul>
		<li><a href="index.php">HOME</a></li>
		<li><a href="recipes.php">RECIPES</a></li>
		<li><a href="calendar.php">CALENDAR</a></li>
        <li>   
            <?php
                if($_SESSION['uname'])
                    echo '
                        <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn">LOGGED IN AS: '.$_SESSION['uname'].'</a>
                        <div class="dropdown-content">
                        <a href="login.php">LOG OUT</a>
                        </div>
                        </li>
                        ';
                else
                    echo '<a href="login.php">LOGIN</a>';
            ?>
        </li>
	</ul>
	<h1>Tasty Recipes</h1>
	<div class="transbox">
	<h2>Welcome <?php echo $_SESSION['uname']?>!</h2>
	</div>
</body>
</html>
