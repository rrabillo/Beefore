<?php
require( dirname(__FILE__). '/../../config/config.php');
require( dirname(__FILE__). '/../functions.php');
require( dirname(__FILE__). '../../classes/users.php');
session_start ();
$_SESSION['user'] = new user();
$GLOBALS['current_url'] = basename($_SERVER['PHP_SELF']);
require( dirname(__FILE__). '/theme/html.php');
