<?php 
if(isset($_POST['add-pole'])){
	$_SESSION['pole']->addPole();
}
if(isset($_GET['remove'])){
	$_SESSION['pole']->remove($_GET['remove']);
}
?>
<h1>Ajouter un pôle</h1>
<form action="./poles" method="post" id="add-pole">
	<p>
		<label for="name">Nom du pôle</label>
		<input type="text" name="name" id="name">
	</p>
	<input type="submit" value="Ajouter" name="add-pole"/>
</form>	

<?php 
$_SESSION['pole']->listPoles();
?>