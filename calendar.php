<?php

session_start();

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
	<h1>Calendar</h1>
	<h3>November 2017</h3>
    <div class = "transbox">
	<div class="hint">
		<p>Click on the image of a dish to go to its recipe-page.</p>
	</div>
	<div class="weekdaysstart">
		<p>Monday</p>
	</div>
	<div class="weekdays">
		<p>Tuesday</p>
	</div>
	<div class="weekdays">
		<p>Wednesday</p>
	</div>
	<div class="weekdays">
		<p>Thursday</p>
	</div>
	<div class="weekdays">
		<p>Friday</p>
	</div>
	<div class="weekdays">
		<p>Saturday</p>
	</div>
	<div class="weekdays">
		<p>Sunday</p>
	</div>
	<div class="nextrow">
		<p>30</p>
	</div>
	<div class="one">
		<p>31</p>
	</div>
	<div class="one">
		<p>1</p>
	</div>
	<div class="one">
		<p>2</p>
	</div>
	<div class="one">
		<p>3</p>
	</div>
	<div class="one">
		<p>4</p>
	</div>
	<div class="one">
		<p>5</p>
	</div>
	<div class="nextrow">
		<p>6</p>
	</div>
    <a href="meatballs.php">
	<div class="meatballs">
		<p>7</p>
	</div>
    </a>
	<div class="one">
		<p>8</p>
	</div>
	<div class="one">
		<p>9</p>
	</div>
	<div class="one">
		<p>10</p>
	</div>
	<div class="one">
		<p>11</p>
	</div>
	<div class="one">
		<p>12</p>
	</div>
	<div class="nextrow">
		<p>13</p>
	</div>
	<div class="one">
		<p>14</p>
	</div>
	<div class="one">
		<p>15</p>
	</div>
	<div class="one">
		<p>16</p>
	</div>
	<div class="one">
		<p>17</p>
	</div>
	<div class="one">
		<p>18</p>
	</div>
	<div class="one">
		<p>19</p>
	</div>
	<div class="nextrow">
		<p>20</p>
	</div>
	<div class="one">
		<p>21</p>
	</div>
	<div class="one">
		<p>22</p>
	</div>
	<div class="one">
		<p>23</p>
	</div>
	<div class="one">
		<p>24</p>
	</div>
    <a href="pancakes.php">
	<div class="pancakes">
		<p>25</p>
	</div>
    </a>
	<div class="one">
		<p>26</p>
	</div>
	<div class="nextrow">
		<p>27</p>
	</div>
	<div class="lastrow">
		<p>28</p>
	</div>
	<div class="lastrow">
		<p>29</p>
	</div>
	<div class="lastrow">
		<p>30</p>
	</div>
	<div class="nextmonth">
		<p>1</p>
	</div>
	<div class="nextmonth">
		<p>2</p>
	</div>
	<div class="nextmonth">
		<p>3</p>
	</div>
    </div>
</body>
</html>