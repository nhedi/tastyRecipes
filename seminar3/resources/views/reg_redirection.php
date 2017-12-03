<!--
 * reg_redirection.php shows the redirected page after a user has tried to register a new user account.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Registration status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" type="text/css" href="resources/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="resources/css/login.css"/>
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"/>
</head>
    
<body>
    <!-- Navbar -->
    <div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="show_calendar.php">Calendar</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Recipes</a>
            <div class="dropdown-content">
                <a href="show_meatballs.php">Meatballs</a>
                <a href="show_pancakes.php">Pancakes</a>
            </div>
        </li>
        <li id="login"><a href="show_login.php">Log in</a></li>
    </ul>
    </div>

    <!-- Registration status -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Registration status</h2>
            <div class="imgcontainer">
                <img class="welcomepic" src="resources/images/user-1808597_640.png" alt="Avatar" class="avatar">
            </div>
            
            <?php
            if ($regStatus === true) {
                echo "<h2>Yay!</h3>";
                echo "<h5>You are registered with username <b>$registeredUser</b>, please login <a href='show_login.php'>here!</a> <br><br>We invite you to check out the <a href='show_calendar.php'>Calendar</a> page <br>or make a comment on any of our recipes!</h5>";
            }elseif($regStatus === false){
                echo "<h2>Oops!</h3>";
                echo "Username <b>$username</b> already taken, please <a href='show_register.php'>try a new one</a>.";
            }else{
                echo "<h2>Oops!</h3>";
                echo "The given username <b>$username</b> or password are not valid or contains illegal symbols,<br> please <a href='show_register.php'>register again</a> with some new registration data.";
            }?>
        </div>
    </div>       
</body>
</html>