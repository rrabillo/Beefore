<?php
if(isset($_POST['username'])){
	$_SESSION['user']->login();
	header('Location: ./');
}
if(isset($_POST['logout'])){
	$_SESSION['user']->logout();
	header('Location: ./');
}
?>
<?php if($_SESSION['user']->isLogged()):?>
	<h2>Bonjour <?php echo $_SESSION['user']->nickname ?></h2>
	<?php else:?>
	<h2>Veuillez vous connecter </h2>
		<form action="./" method="post">
		    <p>
		        <label for="username">username</label>
		        <input type="text" name="username" id="username">
		    </p>
		    <p>
		        <label for="password">Password</label>
		        <input type="password" name="password" id="password">
		    </p>
	    <input type="submit" value="Submit">
	</form>
<?php endif;?>
<?php if($_SESSION['user']->isLogged()):?>
                <div class="profil">
                	<form action="" method="post" class="logout">
						<input type="submit" value="Deconnexion" name="logout" class="btn btn-small btn-padding"/>
					</form>
                    <a href="./add-article" class="btn btn-small btn-padding">Proposer un article</a>
                </div>
                <hr style="color: #fgfgfg; margin: 0 20px 0 20px;" />
<?php endif;?>
