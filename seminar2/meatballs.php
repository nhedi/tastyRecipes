<?php

/**
 *
 * meatballs.php is the recipe page for Meatballs.
 * It contains the title, picture, brief summary, ingredients, instructions and user comments.
 * Logged in users are able to leave a new comment and delete their own comment.
 * If you want to make a comment but is not logged in yet you are encouraged to do so first.
 *
 */

    include_once("php-login/session_start.php");

    # Setting page where user's at
    $_SESSION['page'] = 0;

    # If a comment has been added
    if($_POST['comment']){
        $content = $_POST['comment'];
        $handle = fopen("php-login/commentsMeatballs.txt", "a") or die("Unable to open comments!");
        fwrite($handle, "\n". $_POST['timestamp']. "\n". $_SESSION['user']. "\n". $content);
        fclose($handle);
    } 

    # If a comment has been deleted
    if ($_POST['delete']) {
        $c = copy("php-login/commentsMeatballs.txt", "php-login/copyMeatballs.txt");
        $copy = fopen("php-login/copyMeatballs.txt", "r") or die("Unable to open comments copy file!");
        $readComments = fopen("php-login/commentsMeatballs.txt", "a") or die("Unable to open empty comments file!");
        file_put_contents('php-login/commentsMeatballs.txt', '');
                     
        while(!feof($copy)) {
            $id = fgets($copy);
            $u = fgets($copy);
            $c = fgets($copy);

            if(trim($_POST['delete']) !== trim($id)) {
                fwrite($readComments, $id. $u. $c);
            }
        }
        fclose($readComments); 
        fclose($copy);
    }

    # Recipe data
    $recipes = 'resources/xml/meatballs.xml';
    $xml = simplexml_load_file($recipes) or die("Can't load file.");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Meatballs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" type="text/css" href="resources/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="resources/css/recipes.css"/>
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"/>
    
</head>
    
<body>
    <!-- Navbar -->
    <div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="calendar.php">Calendar</a></li>
        <li class="dropdown">
            <a class="active dropbtn" href="javascript:void(0)">Recipes</a>
            <div class="dropdown-content">
                <a class="active" href="meatballs.php">Meatballs</a>
                <a href="pancakes.php">Pancakes</a>
            </div>
        </li>
        <?php if (empty($_SESSION['user'])) {
            echo '<li id="login"><a href="php-login/login.php">Log in</a></li>';
        } 
        elseif (isset($_SESSION['user'])) {
            echo '<li id="logout"><a href="php-login/logout.php">Log out</a></li>';
        } ?>
    </ul>
    </div>

    <!-- Recipe section -->
    <div class="page">
        <div class="container">
            <h1>Tasty Recipes</h1>
                <?php foreach($xml->recipe as $recipe) {
                    echo "<h2>$recipe->title</h2>";
                }?>
            
            <img class="img-responsive" src="resources/images/meatball-743755_640.jpg" alt="meatballs"/>
            
                <?php foreach($recipe->text as $text) {
                    echo "<p>$recipe->text</p>";
                }?>

            <h3>Ingredients, 4 servings</h3>
            <ul>
                <?php foreach($recipe->ingredients->children() as $child) {
                    echo "<li>$child</li>";
                }?>
            </ul>
            <h3>Instructions</h3>
            <ol>
                <?php foreach($recipe->instructions->children() as $child) {
                    echo "<li>$child</li>";
                }?>
            </ol>
        </div>
    </div>
    
    <!-- Comment section -->
    <div class="comment">
        <div class="container">
            <?php if (isset($_SESSION['user'])) {    
                require_once 'php-login/commentForm.php';
                include 'commentForm';
            } ?>
            
            <h3>Conversation:</h3>
            <div class="section group">
                <div class="commentbox">
                <div class="col span_4_of_4">
                
                <?php
				    $readComments = fopen("php-login/commentsMeatballs.txt", "r") or die("Unable to open file!");
                     
                    while(!feof($readComments)) {
                        $id = fgets($readComments);
                        $u = fgets($readComments);
                        $c = fgets($readComments);
                        echo "<b><br><br>". $u. ":<br></b>";
                        echo $c;
                        if(trim($u) === $_SESSION['user']) {
                            echo("<form action='meatballs.php' method='post'>");
                            echo("<input type='hidden' name='delete' value='$id'/>");
                            echo("<input type='submit' value='Delete'/>");
                            echo("</form>");
                        } 
                    }
                    fclose($readComments);
            
                    if (empty($_SESSION['user'])) {    
                        echo "<h3>Also want to make a comment on this recipe?<br>Please <a href='php-login/login.php'>log in</a> first!</h3>";
                    } 
                ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>