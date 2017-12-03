<!--
 * register.php has has a form where you can register a new user account. 
 * User is redirected to reg_redirection.php when the Register-button is clicked.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - User registration</title>
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

    <!-- Signup form -->
    <div class="page">
        <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Register new user</h2>
            <form accept-charset="UTF-8" role="form" method="post" action="do_register.php">

                <div class="logcontainer">
                    <label>Username</label>
                    <input type="text" placeholder="Choose your username" name="username" required>

                    <label>Password</label>
                    <input type="password" placeholder="Choose a strong password" name="password" required>
        
                    <button type="submit" name="submit" value="Register">Register</button>
                </div>

                <div class="logcontainer">
                    <button type="button" class="cancelbtn"><a href="show_register.php">Cancel</a></button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>