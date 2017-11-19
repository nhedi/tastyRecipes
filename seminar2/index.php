<?php

/**
 *
 * index.php is the index page of the Tasty Recipes web site.
 *
 */

include_once("php-login/session_start.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <link rel="stylesheet" type="text/css" href="resources/css/main.css"/>
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"/>
</head>
    
<body>
    <!-- Navbar -->
    <div class="nav">
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="calendar.php">Calendar</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Recipes</a>
            <div class="dropdown-content">
                <a href="meatballs.php">Meatballs</a>
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

    <!-- Welcome page -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Welcome to Tasty Recipes!</h2>
        <p>Here you can find tasty recipes from all over the world! <br/> If you want to find a monthly plan of what dishes to cook each day,<br/> please visit our <a class="link" href="calendar.php">Calendar</a> page.</p>
        
        <br/>
        
        <img class="img-responsive welcomepic" src="resources/images/noodles-square.jpg" alt="noodels"/>
        <img class="img-responsive welcomepic" src="resources/images/salad-1672505_640.jpg" alt="fig salad"/>
        <img class="img-responsive welcomepic" src="resources/images/soup-square.jpg" alt="soup"/>
        </div>
    </div>
        


</body>
</html>