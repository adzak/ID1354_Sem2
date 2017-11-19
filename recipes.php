<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tasty recipes - recipes</title>
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
	<h1>Recipes</h1>
	<div class="transbox">
		<h2>All recipes</h2>
		<p><a href="meatballs.php">♦ Meatballs</a></p>
		<p><a href="pancakes.php">♦ Pancakes</a></p>
	</div>
</body>
</html>