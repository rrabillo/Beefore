<?php
require_once( dirname( __FILE__ ) . '../../config/database.php' );
$data = array();
$data['nickname'] = $_POST['nickname'];
$data['password'] = $_POST['password'];
$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
$data['email'] = $_POST['email'];

$req = $dbh->prepare("INSERT INTO users (nickname, password, email, rank) VALUES (:nickname, :password, :email, :rank)");
$req->bindParam(':nickname', $nickname);
$req->bindParam(':password', $password);
$req->bindParam(':email', $email);
$req->bindParam(':rank', $rank);
$nickname = $data['nickname'];
$password = $data['password'];
$email = $data['email'];
$rank = 3;
$req->execute();
?>

<p>Le compte administrateur a bien été créé. Veuillez maintenant allez à la racine de votre site pour commencer ! Notez également qu'il est préférable de supprimer le dossier install</p>