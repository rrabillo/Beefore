<?php 
$articles = $_SESSION['article']->listArticlebyPoleName($GLOBALS['current_url']);
$polelist = $_SESSION['pole']->listBrut();
$_SESSION['pole']->id = false;
$canSee = false;
foreach ($polelist as $key => $value) {
    if($value['name'] == $GLOBALS['current_url']){
       $_SESSION['pole']->id = $value['id'];
    }
}
if($_SESSION['pole']->id == $_SESSION['user']->pole || $_SESSION['user']->rank == 3){
    $canSee = true;
}
?>
<section role="main">

    <div class="page-title">
        <div id="banner">
            <h1><?php echo $GLOBALS['current_url'];?></h1>
        </div>
    </div>
    <div role="left">
        <?php if($_SESSION['user']->isLogged()):?>
            <?php if($canSee): ?>
                <?php foreach ($articles as $key => $value): ?>
                    <div class="disp-tr dcom">
                        <div class="disp-tc">
                            <img src="uploads/<?php echo $value['filename']; ?>" alt="" class="img-actu">
                            <h2><?php echo $value['title'] ?></h2>
                            <p><i><?php echo $_SESSION['article']->getExcerpt($value['content']); ?>...</i></p>
                            <a href="<?php echo $GLOBALS['current_url']; ?>?article=<?php echo $value['0'] ?>" class="btn btn-small">Afficher la suite</a>
                        </div>
                    </div>
                
                <?php endforeach; ?>
            <?php else:?>
                <h2>Vous n'êtes pas autorisé à afficher le contenu</h2>
            <?php endif; ?>
        <?php else:?>
        <h2> Veuillez vous connecter pour afficher les articles</h2>
        <?php endif ?>
        </div>
    <div role="right">
        <div class="disp-t">
            <div class="disp-tr">
                <div class="profil">
                    <div class="profil-img"></div> 
                </div>
                <?php bf_loginform();?>
            </div>
            <div class="disp-tv">
                <div class="disp-event">
                    <h2>Evenement</h2>

                    <!-- CALENDAR -->
                    <div class="container"> 
                        <section class="main">
                            <div class="custom-calendar-wrap">
                                <div id="custom-inner" class="custom-inner">
                                    <div class="custom-header clearfix">
                                        <nav>
                                            <span id="custom-prev" class="custom-prev"></span>
                                            <span id="custom-next" class="custom-next"></span>
                                        </nav>
                                        <h2 id="custom-month" class="custom-month"></h2>
                                        <h3 id="custom-year" class="custom-year"></h3>
                                    </div>
                                    <div id="calendar" class="fc-calendar-container"></div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <span>Aujourd'hui: <br>
                        Match de basketball DSI de 12h à 14h</span>
                    <a href="#" class="btn btn-small pills">En savoir +</a>
                </div>
            </div>
            <div class="disp-tv">
                <div class="disp-deals">
                    <h2>Bons plans</h2>
                    <div class="actu-bonplan"><span>50% de réduction sur les produits asus pendant le mois de mars - <a href="#" class="btn btn-small">Cliquez ici</a></span></div>
                    <div class="actu-bonplan"><span>Billets pour disneyland à 15€ - <a href="#" class="btn btn-small">Cliquez ici</a></span></div>       

                    <!-- <a href="#" class="btn btn-small pills">Je suis intéressé</a> -->
                </div>
            </div>
        </div>
    </div>

</section>