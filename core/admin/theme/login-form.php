<?php
if(isset($_POST['username'])){
	$_SESSION['user']->login();
}
?>
<?php if($_SESSION['user']->isLogged()):?>
	<?php if($_SESSION['user']->isAdmin()) :?>
		<h2>Bonjour Admin</h2>
	<?php else:?>
		<h2>Vous n'êtes pas autorisé à accéder à cette page</h2>
	<?php endif;?>
	<?php else:?>
	<h2>Veuillez vous connecter </h2>
		<form action="index.php" method="post">
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