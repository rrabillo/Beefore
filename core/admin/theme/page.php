<?php 
if(isset($_POST['logout'])){
	$_SESSION['user']->logout();
}
?>
<section id="content-bo">
<article>
	<h1>Bienvenue sur l'administration de Beefore</h1>
	<hr>
	<?php if($_SESSION['user']->isAdmin()):?>
		<?php if($GLOBALS['current_url'] == "users"):?>
			<?php bf_usersAdmin(); ?>
		<?php endif;?>
		<?php if($GLOBALS['current_url'] == "poles"):?>
			<?php bf_usersAdmin(); ?>
		<?php endif;?>
		<?php if($GLOBALS['current_url'] == "edit"):?>
			<?php bf_usersAdmin(); ?>
		<?php endif;?>
	<?php else:?>
		<?php bf_loginform();?>
	<?php endif;?>

<?php if($_SESSION['user']->isLogged()):?>
	<form action="" method="post">
		<input type="submit" value="Deconnexion" name="logout"/>
	</form>
<?php endif;?>

</article>
</section>