<?php
ob_start();
require( dirname(__FILE__).'/core/utils/kint/Kint.class.php');
require( dirname(__FILE__). '/config/config.php');
require( dirname(__FILE__). '/core/functions.php');
require( dirname(__FILE__). '/core/classes/users.php');
require( dirname(__FILE__). '/core/classes/poles.php');
require( dirname(__FILE__). '/core/classes/articles.php');
session_start ();
if(!isset($_SESSION['user'])){
	$_SESSION['user'] = new user();
}
if(!isset($_SESSION['pole'])){
	$_SESSION['pole'] = new pole();
}
if(!isset($_SESSION['article'])){
	$_SESSION['article'] = new article();
}
$GLOBALS['current_url'] = basename($_SERVER['REQUEST_URI']);
$GLOBALS['current_url'] = strtok($GLOBALS['current_url'], '?');
require( dirname(__FILE__). '/theme/html.php');
ob_end_flush();