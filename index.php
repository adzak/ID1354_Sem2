<?php

session_start();

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
	<h2>Welcome to Tasty Recipes!</h2>
	<p>We've been providing fellow recipe enthusiast for years here at Tasty Recipes, and boy do we know the best recipes. Whatever you want to cook, we have it (and probably the best recipe for that dish). Wherever you're a regular or this is the first time visiting you can be sure to have all your recipe related satisfactions...satisifed. Dont know what to cook today? Check out or calender page <a href="signup.php">here!</a></p>
	<h2>Facts of the day</h2>
	<p>Just like ketchup and mustard, lingonberry jam is widely used to accompany a variety of dishes, from meatballs and pancakes to porridge and black pudding (blodpudding). But despite its sweetness, it is rarely used on bread. Thanks to the Right of Public Access (Allemansrätten), which gives everyone the freedom to roam and enjoy nature, many Swedes grow up picking lingonberries in the forest, and using these tiny tart red fruits to make a jam-like preserve.</p>
	<p>When you order a sandwich, don’t be surprised if it involves just a single slice of bread, the typical Swedish smörgås. The Swedish concept of open sandwiches dates back to the 1400s when thick slabs of bread were used as plates. In Sweden, the shrimp sandwich (räksmörgås or räkmacka) remains the option fit for a king. Piled high with a mix of boiled egg slices, lettuce, tomato and cucumber, this seafood snack is often topped with creamy romsås – crème fraîche blended with dill sprigs and roe. Shrimp sandwiches are such an integral part of Swedish culture, they have inspired a popular saying: ‘glida in på en räkmacka’ (literally ‘glide in on a shrimp sandwich,’ but roughly corresponding to the expression ‘get a free ride’), meaning to get an advantage without having done anything to deserve it.</p><img alt="image of swedish food" src="images/rsz_collage.jpg"></div>
</body>
</html>