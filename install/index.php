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
    <section role="main" class="install">    
        <h1>Bienvenue dans l'installation de Beefore</h1>
        <p>
            Veuillez remplir les champs suivants pour continuer
        </p>
        <form action="installer.php" method="post" enctype="multipart/form-data" id="install_bdd">
            <p>
                <label for="baselocation">Adresse de la base</label>
                <input type="text" name="baselocation" id="baselocation">
            </p>
            <p>
                <label for="base_name">Nom de la base</label>
                <input type="text" name="base_name" id="base_name">
            </p>
            <p>
                <label for="baseuser">Utilisateur de la base</label>
                <input type="text" name="baseuser" id="baseuser">
            </p>
            <p>
                <label for="basepass">Mot de passe  de la base</label>
                <input type="text" name="basepass" id="basepass">
            </p>
            <input type="submit" value="Submit">
        </form>
    </section>
</body>