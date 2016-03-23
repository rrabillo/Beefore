<?php
if(isset($_POST['username'])){
	$_SESSION['user']->login();
}
if(isset($_POST['logout'])){
	$_SESSION['user']->logout();
}
if(isset($_POST['register'])){
	$_SESSION['user']->register();
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
<?php if($_SESSION['user']->isLogged()):?>
	<form action="" method="post">
		<input type="submit" value="Deconnexion" name="logout"/>
	</form>
<?php endif;?>

<h2>Ou inscrivez vous</h2>
<form action="index.php" method="post">
	<p>
		<label for="username-register">Username</label>
		<input type="text" name="username-register" id="username-register">
	</p>
	<p>
		<label for="password-register">Password</label>
		<input type="password" name="password-register" id="password-register">
	</p>
	<p>
		<label for="email-register">Email</label>
		<input type="text" name="email-register" id="email-register">
	</p>
	<input type="submit" value="Register" name="register"/>
</form>