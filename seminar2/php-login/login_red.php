<?php

/**
 *
 * login_red.php verifies a user by matching the $username and it's corresponding $password in the textfile.
 * If username or password is wrong you are told to try and log in again at login.php.
 * If you don't have an account yet you are encouraged to register at signup.php.
 *
 */

    include_once("session_start.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Login Successful</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

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

    <!-- Login status -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Log in</h2>
            <form accept-charset="UTF-8" role="form" method="get" action="login_red.php">
                <div class="imgcontainer">
                    <img class="welcomepic" src="../resources/images/user-1808597_640.png" alt="Avatar" class="avatar">
                </div>
            </form>
            
            <?php
				$readFromFile = fopen("users.txt", "r") or die("Unable to open file!");
				$username = $_GET["username"];
				$password = $_GET["password"];
				while(!feof($readFromFile)) {
					if(trim(fgets($readFromFile)) === $username) {
						if(trim(fgets($readFromFile)) === $password) {
							$_SESSION["user"] = $username;
							echo "<h2>Yay!</h3>";
                            echo "<h3>Welcome {$_SESSION['user']}! <br>You are now logged in!</h3>";
							break;
						}
						echo "<h3>Wrong password, <a href='login.php'>try again.</a></h3>";
						echo "<h3>If you don't have a registered account yet, please register one <a href='signup.php'>here</a></h3>";
						break;
					}
					fgets($readFromFile);
					fgets($readFromFile);
                }
                
                if(fgets($readFromFile) ===  false) {
                    echo "<h2>Oops!</h3>";
                    echo "<h5>That username is not registered yet,<br>please <a href='login.php'>try again</a> with an existing account.</h5>";
                    echo "<h3>If you don't have an account yet, please register <a href='signup.php'>here</a></h3>";
                }
                fclose($readFromFile);
            ?>
        </div>
    </div>
</body>
</html>