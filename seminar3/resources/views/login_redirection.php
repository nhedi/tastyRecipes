<!--
 * login_redirection.php shows the redirected page after a user has tried to login.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Login Status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" type="text/css" href="resources/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="resources//css/login.css"/>
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
        <?php if ($loginStatus === true) {
            echo '<li id="logout"><a href="do_logout.php">Log out</a></li>';
        } 
        else{
            echo '<li id="login"><a href="show_login.php">Log in</a></li>';
        } ?>
    </ul>
    </div>
    
    <!-- Login status -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Log in status</h2>
            <div class="imgcontainer">
                <img class="welcomepic" src="resources/images/user-1808597_640.png" alt="Avatar" class="avatar">
            </div>

            <?php if ($loginStatus === true) {
                echo "<h2>Yay!</h3>";
                echo "<h3>Welcome <b>$loggedinUser</b>! <br>You are now logged in!</h3>";
            }elseif ($loginStatus === false) {
                echo "<h2>Oops!</h3>";
                echo "<h5>Username <b>$username</b> is not registered yet OR you have given the wrong password.<br><br>Either try to <a href='show_login.php'>login again</a> with the correct password here <br>OR<br> if you don't have a registered account yet, please register one <a href='show_register.php'>here</a></h5>";
            }else{
                echo "<h2>Oops!</h3>";
                echo "<h5>The given username <b>$username</b> or password are not valid or contains illegal symbols.<br><br>Please try to <a href='show_login.php'>login again</a> with the correct username and password <br>OR<br> if you don't have a registered account yet, please register one <a href='show_register.php'>here</a></h5>";    
            } ?>
        </div>
    </div>
</body>
</html>