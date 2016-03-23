<?php
require( dirname(__FILE__). '/config/config.php');
require( dirname(__FILE__). '/core/functions.php');
require( dirname(__FILE__). '/core/classes/data.php');
require( dirname(__FILE__). '/core/classes/users.php');
session_start ();
$GLOBALS['user'] = new user();
require( dirname(__FILE__). '/theme/html.php');

