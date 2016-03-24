<?php
require( dirname(__FILE__). '/../../config/config.php');
require( dirname(__FILE__). '/../functions.php');
require( dirname(__FILE__). '../../classes/users.php');
session_start ();
if(!isset($_SESSION['user'])){
$_SESSION['user'] = new user();
}
$GLOBALS['current_url'] = basename($_SERVER['REQUEST_URI']);
require( dirname(__FILE__). '/theme/html.php');
