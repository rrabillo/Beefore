<?php 
require_once( dirname( __FILE__ ) . '/data.php' );
class user{
	var $id;
	var $nickname;
	var $password;
	var $email;
	var $rank;

	public function login(){
		$db = $GLOBALS['db'];
		$nickname = $_POST['username'];
		$password = $_POST['password'];
		$req = $db->prepare("SELECT * FROM users WHERE nickname=:nickname LIMIT 1");
		$req->bindParam(':nickname', $nickname);
		$req->execute();
		$results = $req->fetch(PDO::FETCH_ASSOC);
		if($password === $results['password']){
			$_SESSION['logged'] = $nickname;
			$_SESSION['rank'] = $results['rank'];
		}
		else{
			echo 'mauvais password';
		}
	}
	public function encodePass($password){
		// $password = hash('sha256', $password);
		// return $password;
	}
	public function isLogged(){
		if(isset($_SESSION['logged'])){
			return true;
		}
	}
	public function isAdmin(){
		if($this->isLogged()){
			if($_SESSION['rank'] == 3){
				return true;
			}
		}
	}
	public function logout(){
		unset($_SESSION['logged']);
		unset($_SESSION['rank']);
	}
}
