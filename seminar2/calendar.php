<?php

/**
 *
 * calendar.php handles the calendar of one month with recipe links.
 *
 */

include_once("php-login/session_start.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasty Recipes - Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" type="text/css" href="resources/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="resources/css/calendar.css"/>
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"/>
</head>
    
<body>
    <!-- Navbar -->
    <div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a class="active" href="calendar.php">Calendar</a></li>
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
    
    <!-- Calendar -->
    <div class="page">
    <div class="container">
        <h1>Tasty Recipes</h1>
        <h2>Calendar</h2>

        <div class = "calendar">
            <!--First Week-->
            <div class = "week">
                <p class = "weekIndication">Week 1</p>
                <div class = "day"><p>Mon 1</p></div>
                <div class = "day">
                    <a href=""><img class="img-responsive" src="resources/images/asparagus-square.jpg" title="Steak with asparagus" alt="Steak with asparagus"/></a></div>
                <div class = "day"><p>Wed 3</p></div>
                <div class = "day"><p>Thu 4</p></div>
                <div class = "day"><p>Fri 5</p></div>
                <div class = "day">
                    <a href=""><img class="img-responsive" src="resources/images/pizza-square.jpg" title="Crispy pizza" alt="Crispy pizza"/></a></div>
                <div class = "day"><p>Sun 7</p></div>
            </div>

            <!--Second Week-->
            <div class = "week">
                <p class = "weekIndication">Week 2</p>
                <div class = "day">
                    <a href="meatballs.php"><img class="img-responsive" src="resources/images/meatball-square.jpg" title="Delicious Meatballs" alt="Delicious Meatballs"/></a></div>
                <div class = "day"><p>Tue 9</p></div>
                <div class = "day"><p>Wed 10</p></div>
                <div class = "day">
                    <a href=""><img class="img-responsive" src="resources/images/shrimp-715539_640.jpg" title="Asian seafood wok" alt="Asian seafood wook"/></a></div>
                <div class = "day"><p>Fri 12</p></div>
                <div class = "day"><p>Sat 13</p></div>
                <div class = "day"><p>Sun 14</p></div>
            </div>

            <!--Third Week-->
            <div class = "week">
                <p class = "weekIndication">Week 3</p>
                <div class = "day"><p>Mon 15</p></div>
                <div class = "day"><p>Tue 16</p></div>
                <div class = "day">
                    <a href=""><img class="img-responsive" src="resources/images/burger-2762371_640.jpg" title="Beefy burger" alt="Beefy burger"/></a></div>
                <div class = "day"><p>Thu 18</p></div>
                <div class = "day"><p>Fri 19</p></div>
                <div class = "day"><p>Sat 20</p></div>
                <div class = "day">
                    <a href="pancakes.php"><img class="img-responsive" src="resources/images/pancake-square.jpg" title="Sweet pancakes" alt="Sweet pancakes"/></a></div>
            </div>

            <!--Fourth Week-->
            <div class = "week">
                <p class = "weekIndication">Week 4</p>
                <div class = "day"><p>Mon 22</p></div>
                <div class = "day"><p>Tue 23</p></div>
                <div class = "day"><p>Wed 24</p></div>
                <div class = "day"><p>Thu 25</p></div>
                <div class = "day">
                    <a href=""><img class="img-responsive" src="resources/images/noodles-square.jpg" title="Pasta Bolognese" alt="Pasta Bolognese"/></a></div>
                <div class = "day"><p>Sat 27</p></div>
                <div class = "day">
                    <a href=""><img class="img-responsive" src="resources/images/soup-square.jpg" title="Broccoli Soup" alt="Broccoli Soup"/></a></div>
            </div>

            <!--Fifth Week-->
            <div class = "week">
                <p class = "weekIndication">Week 5</p>
                <div class = "day">
                    <a href=""><img class="img-responsive" src="resources/images/salad-1672505_640.jpg" title="Healthy Fig Salad" alt="Healthy Fig Salad"/></a></div>
                <div class = "day"><p>Tue 30</p></div>
                <div class = "day"><p>Wed 31</p></div>
                <div class = "day notCalendarDay"><p>Thu 1</p></div>
                <div class = "day notCalendarDay"><p>Fri 2</p></div>
                <div class = "day notCalendarDay"><p>Sat 3</p></div>
                <div class = "day notCalendarDay"><p>Sun 4</p></div>
            </div>
        </div>
    </div>
    </div>  
</body>
</html>