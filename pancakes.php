<?php

session_start();

    $commentData = file('containerpancakes.html');
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
        $handle = fopen("containerpancakes.html", "a");
        $t=time();
        fwrite($handle, "<b>". $_SESSION['uname']." ".gmdate("Y-m-d",$t)."</b>:<br>".$content."<p hidden>".time().",".$_SESSION['uname']."</p><br><br>"."\n");
        fclose($handle);
        header("Refresh:0");
    }
    
    if($_POST['delete']){
        
        file_put_contents('containerpancakes.html','');
        
        foreach($commentData as $line){
            
            if(strpos($line, $_POST['timestamp']) === false){
                
                $handle = fopen("containerpancakes.html", "a");
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
	<title>Tasty recipes - pancakes</title>
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
	<h1>Pancakes</h1>
	<div class="transbox">
		<img alt="image of pancakes" src="images/pancakes.jpeg">
        <h2>Prep: 10 min | Total: 30 min | Servings: 4</h2>
        <h2>Ingredients</h2>
        <p>1 1/2 cups all-purpose flour<br>
        2 tablespoons sugar<br>
        1 tablespoon baking powder<br>
        3/4 teaspoon salt<br>
        1 1/4 cups milk<br>
        1 large egg<br>
        4 tablespoons butter, melted<br>
        1 teaspoon vanilla extract</p>
        <h2>Steps</h2>
        <p>1 In large bowl, whisk flour, sugar, baking powder and salt. Add milk,<br>butter and egg; stir until flour is moistened.<br>2 Heat 12-inch nonstick skillet or griddle over medium heat until drop of water sizzles; brush lightly with oil.<br>In batches, scoop batter by scant 1/4-cupfuls into skillet, spreading to 3 1/2 inches each.<br>Cook 2 to 3 minutes or until bubbly and edges are dry.<br>With wide spatula, turn; cook 2 minutes more or until golden. <br>Transfer to platter or keep warm on a cookie sheet in 225°F oven.<br>3 Repeat with remaining batter, brushing griddle with more oil if necessary.</p>
	
        
        <?php
            if($_SESSION['uname']) {
                echo'
                    <h2>Add a public comment</h2>
                    <div class="comments">
                        <form action="/pancakes.php" method = "POST">
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
                $commentData = file('containerpancakes.html');
                        $j = 0;
                foreach ($commentData as $line) {
                    if(strpos($line, $_SESSION['uname']) !== false) {
                        echo $line;
                        $timestamp = $accessData[$j];
                        $j++;

                        echo '
                            <form method = "POST" action="/pancakes.php">
                                <input type="submit" value="Delete comment" name = "delete">
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