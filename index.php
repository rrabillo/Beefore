<?php
require( dirname(__FILE__). '/loader.php');
?>
<form action="./core/post.php" method="post">
	    <p>
	        <label for="username">username</label>
	        <input type="text" name="username" id="username">
	    </p>
	    <p>
	        <label for="password">Password</label>
	        <input type="password" name="password" id="password">
	    </p>
	    <p>
	        <label for="email">Email</label>
	        <input type="email" name="email" id="email">
	    </p>
	    <p>
	        <label for="rank">Rank</label>
	        <input type="text" name="rank" id="rank">
	    </p>
	    <input type="submit" value="Submit">
</form>