<?php

/**
 * logout.php destroys the session and redirects the user to index.php.
 *
 */

    include_once("session_start.php");

    # Destroy session
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;url=../index.php'>";