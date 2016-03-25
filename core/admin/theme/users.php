<?php 
if(isset($_POST['register'])){
	$_SESSION['user']->register();
}
if(isset($_GET['remove'])){
	$_SESSION['user']->remove($_GET['remove']);
}
?>
<h1>Ajouter un utilisateur</h1>
<form action="./users" method="post" id="add-user">
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
	<select name="rank-register" form="add-user">
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	</select>
	<input type="submit" value="Ajouter" name="register"/>
</form>	

<?php 
$_SESSION['user']->listUsers();
?>