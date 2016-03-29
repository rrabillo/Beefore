<?php 
if(isset($_GET['remove'])){
	$_SESSION['article']->remove($_GET['remove']);
}
?>
<h1>Articles publiés</h1>
<?php 
$_SESSION['article']->listPublished();
?>
<h1>Articles en attente de validation</h2>
<?php 
$_SESSION['article']->listUnPublished();
?>