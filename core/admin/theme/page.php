<?php 
if(isset($_POST['logout'])){
	$_SESSION['user']->logout();
}
?>
<section>
<article>
	<h1>Welcome on BeeFore</h1>
	<hr>
	<?php if($_SESSION['user']->isAdmin()):?>
		<?php if($GLOBALS['current_url'] == "users"):?>
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