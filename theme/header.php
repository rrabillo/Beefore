<?php
   $poles =  $_SESSION['pole']->listBrut();
?>
<header role="banner">
    <div class="wrapper">
        <a href="#" rel="home">
            <h1>Beefore</h1>
        </a>
        <div class="btn-nav">
            <div class="inner"></div>
        </div>
        <nav role="navigation">
            <ul class="list-inline">
                <li><a href="#" class="is-active" rel="home">Les news</a></li>
                <?php foreach ($poles as $key => $value):?>
                    <li><a class="djur-nav"href="./<?php echo $value['name']?>"><?php echo $value['name']?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>
</header>