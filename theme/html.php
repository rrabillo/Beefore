<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 is-ie-7" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 is-ie8" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Beefore</title>
        <meta name="description" content="">
        <meta name="viewport" content="initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="img/fav.png" />
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/calendar.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/custom_2.css" />
        <script src="assets/js/modernizr.custom.63321.js"></script>
        <script>
            document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');
        </script>
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <!--[if lt IE 9]><script type="text/javascript"> document.createElement("header"); document.createElement("footer"); document.createElement("section"); document.createElement("aside"); document.createElement("nav"); document.createElement("article"); document.createElement("figure"); document.createElement("figcaption"); </script><![endif]-->
        <script>
            $(function () {
                $("#banner").addClass('slideUp');
                $(".btn-nav").click(function(e){
                    e.preventDefault();
                    $(this).toggleClass("open");
                    $('[role="navigation"]').slideToggle("600");
                });
            })

            $(function () {
                $("#sidebar").addClass('slideUp');
                $(".btn-nav").click(function(e){
                    e.preventDefault();
                    $(this).toggleClass("open");
                    $('[role="navigation-cms"]').slideToggle("600");
                });
            })
        </script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
<body role="document">
<?php bf_header(); ?>
<?php if($GLOBALS['current_url'] == 'add-article'):?>
    <?php bf_addArticle(); ?>
<?php elseif (isset($_GET['article'])): ?>
    <?php bf_displayArticle(); ?>
<?php else:?>
    <?php bf_page(); ?>
<?php endif; ?>
<?php bf_footer(); ?>
</body>
</html>