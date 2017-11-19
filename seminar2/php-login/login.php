<?php

/**
 *
 * login.php has has a form where you can log in. 
 * When pressing submit you are redirected to login_red.php.
 *
 */

    include_once("session_start.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Login</title>
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

    <!-- Login form -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Log in</h2>
            <form accept-charset="UTF-8" role="form" method="get" action="login_red.php">
                <div class="imgcontainer">
                    <img class="welcomepic" src="../resources/images/user-1808597_640.png" alt="Avatar" class="avatar">
                </div>

                <div class="logcontainer">
                    <label>Username</label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label>Password</label>
                    <input type="password" placeholder="Enter Password" name="password" required>
        
                    <button type="submit" name="submit" value="Login">Login</button>
                    <label>Don't have an account? <a href="signup.php">Sign up</a></label>
                </div>

                <div class="logcontainer">
                    <button type="button" class="cancelbtn"><a href="login.php">Cancel</a></button>
                </div>
            </form>
        </div>
    </div>
        


</body>
</html>