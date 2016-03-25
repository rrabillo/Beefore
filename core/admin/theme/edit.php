<?php
$check = function($output) {
	if(isset($_GET['user'])){
		$results  = $_SESSION['user']->getUser();
		return $results[$output];
	}
};

if(isset($_POST['edit'])){
	
}	
?>
<h1>Editer un utilisateur</h1>
<form action="./edit" method="post" id="add-user">
	<p>
		<label for="username-register">Username</label>
		<input type="text" name="username-register" id="username-register" value="<?php echo $check('nickname');?>">
	</p>
	<p>
		<label for="password-register">Password</label>
		<input type="password" name="password-register" id="password-register" value="<?php echo $check('password');?>">
	</p>
	<p>
		<label for="email-register">Email</label>
		<input type="text" name="email-register" id="email-register" value="<?php echo $check('email');?>">
	</p>
	<select name="rank-register" form="add-user">
	  <option value="1" <?php if($check('rank') == 1) echo "selected"; ?>>1</option>
	  <option value="2" <?php if($check('rank') == 2) echo "selected"; ?>>2</option>
	  <option value="3" <?php if($check('rank') == 3) echo "selected"; ?>>3</option>
	</select>
	<input type="submit" value="Ajouter" name="edit"/>
</form>	