<?php

/**
 *
 * signup.php handles user creation by fetching 
 * $username and $password.
 * User is redirected to registration_red.php.
 *
 */

    include_once("session_start.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - User registration</title>
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

    <!-- Signup form -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Register new user</h2>
            <form accept-charset="UTF-8" role="form" method="get" action="registration_red.php">

                <div class="logcontainer">
                    <label>Username</label>
                    <input type="text" placeholder="Choose your username" name="username" required>

                    <label>Password</label>
                    <input type="password" placeholder="Choose a strong password" name="password" required>
        
                    <button type="submit" name="submit" value="Register">Register</button>
                </div>

                <div class="logcontainer">
                    <button type="button" class="cancelbtn"><a href="signup.php">Cancel</a></button>
                </div>
            </form>
        </div>
    </div>
        


</body>
</html>