<?php

/**
 *
 * meatballs.php is the recipe page for Meatballs.
 * It contains the title, picture, brief summary, ingredients, instructions and user comments.
 * Logged in users are able to leave a new comment and delete their own comment.
 * If you want to make a comment but is not logged in yet you are encouraged to do so first.
 *
 */

    # Setting page where user's at
    $_SESSION['page'] = 0;

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
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
    <script type="text/javascript" src="resources/js/tasty.js"></script>
</head>
    
<body>
    <!-- Navbar -->
    <div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="show_calendar.php">Calendar</a></li>
        <li class="dropdown">
            <a class="active dropbtn" href="javascript:void(0)">Recipes</a>
            <div class="dropdown-content">
                <a class="active" href="show_meatballs.php">Meatballs</a>
                <a href="show_pancakes.php">Pancakes</a>
            </div>
        </li>
        <?php if (empty($_SESSION['user'])) {
            echo '<li id="login"><a href="show_login.php">Log in</a></li>';
        } 
        elseif (isset($_SESSION['user'])) {
            echo '<li id="logout"><a href="do_logout.php">Log out '.$contr->getUsername().'</a></li>';
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
    <?php 
        include 'resources/fragments/commentSection.php';
    ?>
</body>
</html>