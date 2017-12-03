<?php

/**
 * do_logout.php destroys the session and redirects the user to index.php.
 *
 */

namespace Tasty\View;
use Tasty\Util\Startup;

require_once 'classes/Tasty/Util/Startup.php';
Startup::initRequest();

# Destroy session
session_regenerate_id();
session_unset();
session_destroy();
echo "<meta http-equiv='refresh' content='0;url=index.php'>";