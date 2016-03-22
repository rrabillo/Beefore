<?php
require( dirname(__FILE__). '/classes/users.php');
$user = new user();
$user->nickname = $_POST['username'];
$user->password = $user->encodePass($_POST['password']);
$user->email = $_POST['email'];
$user->rank = $_POST['rank'];
$db->insertData('users', $user);

header('Location:../');