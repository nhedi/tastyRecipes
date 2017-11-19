<?php

/**
 *
 * registration_red.php handles account creation with the given $username and it's corresponding $password.
 * If username is already taken you are encouraged to try a new one.
 * If the registration is successful, user is redirected to index.php in 5 seconds.
 *
 */

    include_once("session_start.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Registration status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="refresh" content="5;url=login.php"/>

    <link rel="stylesheet" type="text/css" href="../resources/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="../resources/css/login.css"/>
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"/>
</head>
    
<body>
    <!-- Navbar -->
    <div class="nav">
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../calendar.php">Calendar</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Recipes</a>
            <div class="dropdown-content">
                <a href="../meatballs.php">Meatballs</a>
                <a href="../pancakes.php">Pancakes</a>
            </div>
        </li>
        <?php if (empty($_SESSION['user'])) {
            echo '<li id="login"><a href="login.php">Log in</a></li>';
        } 
        elseif (isset($_SESSION['user'])) {
            echo '<li id="logout"><a href="logout.php">Log out</a></li>';
        } ?>
    </ul>
    </div>

    <!-- Registration status -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Registration status</h2>
            <form accept-charset="UTF-8" role="form" method="get" action="registration_red.php">
                <div class="imgcontainer">
                    <img class="welcomepic" src="../resources/images/user-1808597_640.png" alt="Avatar" class="avatar">
                </div>
            </form>
            
            <?php
                $readFromFile = fopen("users.txt", "r+") or die("Unable to open file!");
                $username = $_GET["username"];
                $password = $_GET["password"];
                
                while(!feof($readFromFile)) {
                    if(trim(fgets($readFromFile)) === $username) {
                        echo "Username already taken, please <a href='signup.php'>try a new one</a>.";
                        break;
                    }
                    fgets($readFromFile);
                    fgets($readFromFile);
                }

                if(fgets($readFromFile) ===  false) {
                    $txt = PHP_EOL . $username;
                    fwrite($readFromFile, $txt);
                    $txt = PHP_EOL . $password;
                    fwrite($readFromFile, $txt);
                    $txt = PHP_EOL . "end";
                    fwrite($readFromFile, $txt);
                    echo "<h5>You are registered with username {$_SESSION["user"]}! <br>We are redirecting you to login page in 5 seconds..</h5>";
                }
                fclose($readFromFile);
            ?>
        </div>
    </div>
        
</body>
</html>