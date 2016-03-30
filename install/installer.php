<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 is-ie-7" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 is-ie8" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Beefore - Création admin</title>
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

    <body  class="create_admin">

<?php
$data = array();
$data['baselocation'] = $_POST['baselocation'];
$data['basename'] = $_POST['base_name'];
$data['baseuser'] = $_POST['baseuser'];
	if(isset($_POST['basepass'])){
		$data['basepass'] = $_POST['basepass'];
	}
	else{
		$data['basepass'] = "";
	}

try {
	$dbh = new PDO("mysql:dbname=".$data['basename'].";host=".$data['baselocation'],$data['baseuser'],$data['basepass']."");
	$canInstall = true;
}
catch (Exception $e) {
	die('Erreur : '.$e->getMessage());
}
if($canInstall){
	$req = $dbh->prepare("CREATE TABLE `poles`(`id` int(11) NOT NULL AUTO_INCREMENT,`name` varchar(255) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1");
	$req->execute();
	$req = $dbh->prepare("CREATE TABLE `users` ( `id` int(11) NOT NULL AUTO_INCREMENT, `nickname` varchar(255) NOT NULL, `password` varchar(255) NOT NULL, `email` varchar(255) NOT NULL, `rank` int(1) NOT NULL, `id_pole` int(11) NULL, PRIMARY KEY (`id`), KEY `id_pole` (`id_pole`), CONSTRAINT `user_pole_fk` FOREIGN KEY (`id_pole`) REFERENCES `poles` (`id`) ON DELETE NO ACTION ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1");
	$req->execute();
	$req = $dbh->prepare("CREATE TABLE `articles` ( `id` int(11) NOT NULL AUTO_INCREMENT, `title` varchar(255) NOT NULL, `content` longtext NOT NULL, `date_post` timestamp NOT NULL, `published` tinyint(1) NOT NULL, `filename` varchar(255) NOT NULL, `id_pole` int(11) NOT NULL, `id_user` int(11) NOT NULL, PRIMARY KEY (`id`), KEY `id_pole` (`id_pole`), KEY `id_user` (`id_user`), CONSTRAINT `article_pole_fk` FOREIGN KEY (`id_pole`) REFERENCES `poles` (`id`), CONSTRAINT `article_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1");
	$req->execute();
	echo "<i>Les tables ont été créées, génération du fichier database...</i>";
	$myfile = fopen("../config/database.php", "w") or die("Impossible de générer le fichier... vérifiez les permissions");
	$txt = "<?php\n";
	fwrite($myfile, $txt);
	$txt = "define('SQL_HOST', '".$data['baselocation']."');\n";
	fwrite($myfile, $txt);
	$txt = "define('SQL_USER', '".$data['baseuser']."');\n";
	fwrite($myfile, $txt);
	$txt = "define('SQL_PASS', '".$data['basepass']."');\n";
	fwrite($myfile, $txt);
	$txt = "define('SQL_DBNAME', '".$data['basename']."');\n";
	fwrite($myfile, $txt);
	$txt = "try {\n";
	fwrite($myfile, $txt);
	$txt = '	$dbh = new PDO("mysql:dbname=".SQL_DBNAME.";host=".SQL_HOST,SQL_USER,SQL_PASS."");';
	fwrite($myfile, $txt);
	$txt = "\n}\n";
	fwrite($myfile, $txt);
	$txt = 'catch (Exception $e) {';
	fwrite($myfile, $txt);
	$txt = "\n";
	fwrite($myfile, $txt);
	$txt = '	die("Erreur : ".$e->getMessage());';
	fwrite($myfile, $txt);
	$txt = "\n}\n";
	fwrite($myfile, $txt);
	$txt = "?>\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	echo "<br><i>Le fichier a été créé.</i>";
	echo "<br><p>Les tables nécéssaires à Beefore on bien été installée, veuillez maintenant créer un compte administrateur</p>";
}
?>
<?php if($canInstall): ?>

    	<section role="main" class="create_admin">
			<form action="createadmin.php" method="post" enctype="multipart/form-data" id="create_admin">
				<p>
			        <label for="nickname">Pseudo</label>
			        <input type="text" name="nickname" id="nickname">
			    </p>
			    <p>
			        <label for="password">Mot de passe</label>
			        <input type="password" name="password" id="password">
			    </p>
			    <p>
			        <label for="email">Email</label>
			        <input type="email" name="email" id="email">
			    </p>
			    <input type="submit" value="Submit">
			</form>
		</section>
	</body>

<?php endif; ?>