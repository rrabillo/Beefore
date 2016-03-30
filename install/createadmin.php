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

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 is-ie-7" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 is-ie8" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Beefore - Installation</title>
        <meta name="description" content="">
        <meta name="viewport" content="initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="img/fav.png" />
        <link rel="stylesheet" href="../assets/css/normalize.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/calendar.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/custom_2.css" />
        <script src="../assets/js/modernizr.custom.63321.js"></script>
        <script>
            document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');
        </script>
        <script src="js/jquery-1.10.2.min.js"></script>        
    </head>

<body>
    <section role="main" class="admin_created"> 
		<p>Le compte administrateur a bien été créé. Veuillez maintenant allez à la racine de votre site pour commencer ! Notez également qu'il est préférable de supprimer le dossier install</p>
		<a href="../index.php">Retour</a>
	</section>
</body>	