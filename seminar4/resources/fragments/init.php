<?php

/* 
 * This code must be executed before a HTTP request can be handled.
 */

use Tasty\Util\Startup;

require_once 'classes/Tasty/Util/Startup.php';
Startup::initRequest();