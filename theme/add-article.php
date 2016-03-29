<?php 
if(isset($_POST['title'])){
    $_SESSION['article']->add();
}
?>
<section role="main">

    <div class="page-title">
        <div id="banner">
            <h1>Proposez un article </h1>
        </div>
    </div>
    <div role="left">
        <?php if($_SESSION['user']->isLogged()):?>
            <form action="./add-article" method="post" enctype="multipart/form-data">
                <p>
                    <label for="title">Titre</label>
                    <input type="text" name="title" id="title">
                </p>
                <p>
                    <label for="content">Contenu</label>
                    <textarea rows="4" cols="50" name="content" id="content"></textarea>
                </p>
                <input type="file" name="img" size="30">
                <input type="submit" value="Submit">
            </form>
        <?php endif; ?>
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