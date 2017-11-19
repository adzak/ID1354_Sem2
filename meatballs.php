<?php

session_start();

    $commentData = file('container.html');
    $i = 0;
    $accessData = array();
    foreach ($commentData as $line) {
        if(strpos($line, $_SESSION['uname']) !== false) {
            list($comment, $user) = explode('hidden>', $line);
            $accessData[$i++] = trim($user);
        }
    }
      
    if($_POST && !empty($_POST['comment'])){                                                                                                                                                                              
        $content = $_POST['comment'];
        $handle = fopen("container.html", "a");
        $t=time();
        fwrite($handle, "<b>". $_SESSION['uname']." ".gmdate("Y-m-d",$t)."</b>:<br>".$content."<p hidden>".time().",".$_SESSION['uname']."</p><br><br>"."\n");
        fclose($handle);
        header("Refresh:0");
    }
    
    if($_POST['delete']){
        
        file_put_contents('container.html','');
        
        foreach($commentData as $line){
            
            if(strpos($line, $_POST['timestamp']) === false){
                
                $handle = fopen("container.html", "a");
                fwrite($handle,$line);
                fclose($handle);
                
            }
                
            
        }
        
        header("Refresh:0");
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tasty recipes - meatballs</title>
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
	<h1>Meatballs</h1>
	<div class="transbox">
		<img alt="image of swedish meatballs" src="images/meatballs.jpg">
		<h2>Prep: 15 min | Total: 40 min | Servings: 4</h2>
		<h2>Ingredients</h2>
		<p>1 lb lean (at least 80%) ground beef<br>
		1/2 cup Progresso™ Italian-style bread crumbs<br>
		1/4 cup milk<br>
		1/2 teaspoon salt<br>
		1/2 teaspoon Worcestershire sauce<br>
		1/4 teaspoon pepper<br>
		1 small onion, finely chopped(1/4 cup)<br>
		1 egg</p>
		<h2>Steps</h2>
		<p>1. Heat oven to 400°F. Line 13x9-inch pan with foil; spray with cooking spray.<br>
		2. In large bowl, mix all ingredients. Shape mixture into 20 to 24 (1 1/2-inch) meatballs. Place 1 inch apart in pan.<br>
		3. Bake uncovered 18 to 22 minutes or until no longer pink in center.</p>
	
        
        <?php
            if($_SESSION['uname']) {
                echo'
                    <h2>Add a public comment</h2>
                    <div class="comments">
                        <form action="/meatballs.php" method = "POST">
                            <label>Comment</label>
                            <input type="text" id="comment" name="comment" placeholder="Type your comment here..">
                            <input type="submit" value="Post comment">
                        </form>
                    </div>';
            }
        
            else {
                echo '<h2>Log in to add a public comment</h2><br>';
            }
        ?>
        
		<h4>What others are saying...</h4>
		<hr>
		<div class="commentbox">

           <?php
                $commentData = file('container.html');
                        $j = 0;
                foreach ($commentData as $line) {
                    if(strpos($line, $_SESSION['uname']) !== false) {
                        echo $line;
                        $timestamp = $accessData[$j];
                        $j++;

                        echo '
                            <form method = "POST" action="/meatballs.php">
                                <input type="submit" value="delete comment" name = "delete">
                                <input type="hidden" value="'.$timestamp.'" name="timestamp">
                            </form>
                        ';        
                                                                                
                    }
                    
                    else
                        echo $line;
                }
            ?>
            
		</div>
		
	</div>
</body>
</html> 