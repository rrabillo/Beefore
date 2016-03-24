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
		$req = $db->db->prepare("SELECT * FROM users WHERE nickname=:nickname LIMIT 1");
		$req->bindParam(':nickname', $nickname);
		$req->execute();
		$results = $req->fetch(PDO::FETCH_ASSOC);
		if($password === $results['password']){
			$_SESSION['user']->nickname = $nickname;
			$_SESSION['user']->rank = $results['rank'];
		}
		elseif(!$results){
			echo "utilisateur non trouvé";
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
		if(isset($_SESSION['user']->nickname)){
			return true;
		}
	}
	public function isAdmin(){
		if($this->isLogged()){
			if($_SESSION['user']->rank == 3){
				return true;
			}
		}
	}
	public function logout(){
		unset($_SESSION['user']->nickname);
		unset($_SESSION['user']->rank);
	}
	public function listUsers(){
		$db = $GLOBALS['db'];
		print_r($db->getData('users'));
	}
	public function register(){
		$db = $GLOBALS['db'];	
		$data = array();
		try {
			$this->validate($_POST['username-register']);
			$data['nickname'] = $_POST['username-register'];
			$this->validate($_POST['password-register']);
			$data['password'] = $_POST['password-register'];
			$this->validate($_POST['email-register']);
			$data['email'] = $_POST['email-register'];
			$this->validate($_POST['rank-register']);
			$data['rank'] = $_POST['rank-register'];
			$db->insertData('users', $data);
			bf_setMessage('success', "L'utilisateur ".$data['nickname']." a bien été ajouté");
		} catch (Exception $e) {
			 $e->getMessage();
		}
	}
	public function validate($field){
		if(!isset($field) || $field === ""){
			throw new Exception(bf_setMessage('error', 'Tous les champs sont requis'));
			
		}
		return true;
	}
}
