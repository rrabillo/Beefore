<?php
ob_start();
require( dirname(__FILE__).'/../utils/kint/Kint.class.php');
require( dirname(__FILE__). '/../../config/config.php');
require( dirname(__FILE__). '/../functions.php');
require( dirname(__FILE__). '../../classes/users.php');
require( dirname(__FILE__). '../../classes/poles.php');
session_start ();
if(!isset($_SESSION['user'])){
	$_SESSION['user'] = new user();
}
if(!isset($_SESSION['pole'])){
	$_SESSION['pole'] = new pole();
}
$GLOBALS['current_url'] = basename($_SERVER['REQUEST_URI']);
$GLOBALS['current_url'] = strtok($GLOBALS['current_url'], '?');
require( dirname(__FILE__). '/theme/html.php');
ob_end_flush();