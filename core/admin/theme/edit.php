<?php
$check = function($output) {
	if(isset($_GET['user'])){
		$results  = $_SESSION['user']->getUser();
		return $results[$output];
	}
	if(isset($_GET['pole'])){
		$results  = $_SESSION['pole']->getPole();
		return $results[$output];
	}
};
$getPoleList = function(){
	$results  = $_SESSION['pole']->listBrut();
	return $results;
};
?>
<?php if(isset($_GET['user'])): ?>
<?php
	if(isset($_POST['edit'])){
		$values = array();
		$values['id'] = $_GET['user'];
		$values['nickname'] = $_POST['username-register'];
		$values['password'] = $_POST['password-register'];
		$values['email'] = $_POST['email-register'];
		$values['rank'] = $_POST['rank-register'];
		$values['pole'] = $_POST['pole-register'];
		$_SESSION['user']->edit($values);
	}
?>
<h1>Editer un utilisateur</h1>
<form action="./edit?user=<?php echo $_GET['user']; ?>" method="post" id="add-user">
	<p>
		<label for="username-register">Username</label>
		<input type="text" name="username-register" id="username-register" value="<?php echo $check('nickname');?>">
	</p>
	<p>
		<label for="password-register">Password</label>
		<input type="password" name="password-register" id="password-register" value="">
	</p>
	<p>
		<label for="email-register">Email</label>
		<input type="text" name="email-register" id="email-register" value="<?php echo $check('email');?>">
	</p>
	<p>
	<label for="pole-register">Pôle</label>
	<select name="pole-register" form="add-user">
		<?php foreach ($getPoleList() as $key => $value): ?>
				<option value="<?php echo $value['id'] ?>"<?php if($check('id_pole') == $value['id']) echo "selected"; ?>><?php echo $value['name'] ?></option>
		<?php endforeach; ?>
	</select> 	
	</p>
	<p>
	<label for="rank-register">Rang</label>	
	<select name="rank-register" form="add-user">
	  <option value="1" <?php if($check('rank') == 1) echo "selected"; ?>>1</option>
	  <option value="2" <?php if($check('rank') == 2) echo "selected"; ?>>2</option>
	  <option value="3" <?php if($check('rank') == 3) echo "selected"; ?>>3</option>
	</select>
	</p>
	<input type="submit" value="Editer" name="edit"/>
</form>	
<?php endif;?>

<?php if(isset($_GET['pole'])): ?>
<?php
	if(isset($_POST['edit'])){
		$values = array();
		$values['id'] = $_GET['pole'];
		$values['name'] = $_POST['name'];
		$_SESSION['pole']->edit($values);
	}
?>
<h1>Editer un pôle</h1>
<form action="./edit?pole=<?php echo $_GET['pole']; ?>" method="post" id="add-user">
	<p>
		<label for="name">Nom</label>
		<input type="text" name="name" id="name" value="<?php echo $check('name');?>">
	</p>
	<input type="submit" value="Editer" name="edit"/>
</form>	
<?php endif;?>