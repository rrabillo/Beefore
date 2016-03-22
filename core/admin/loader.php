<?php
require( dirname(__FILE__). '/../../config/config.php');
require( dirname(__FILE__). '/../back.php');
require( dirname(__FILE__). '../../classes/users.php');
session_start ();
$GLOBALS['user'] = new user();
require( dirname(__FILE__). '/theme/html.php');
