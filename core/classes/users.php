<?php 
require_once( dirname( __FILE__ ) . '/data.php' );
class user{
	var $id;
	var $nickname;
	var $password;
	var $email;
	var $rank;
	var $pole;

	public function login(){
		$db = $GLOBALS['db'];
		$nickname = $_POST['username'];
		$password = $_POST['password'];
		$req = $db->db->prepare("SELECT * FROM users WHERE nickname=:nickname LIMIT 1");
		$req->bindParam(':nickname', $nickname);
		$req->execute();
		$results = $req->fetch(PDO::FETCH_ASSOC);
		if(password_verify($password, $results['password'])){
			$_SESSION['user']->nickname = $nickname;
			$_SESSION['user']->rank = $results['rank'];
			$_SESSION['user']->id = $results['id'];
			$_SESSION['user']->pole = $results['id_pole'];
		}
		elseif(!$results){
			echo "utilisateur non trouvé";
		}
		else{
			echo 'mauvais password';
		}
	}
	public function encodePass($password){
		$password = password_hash($password, PASSWORD_DEFAULT);
		return $password;
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
		$results = $db->getData('users');
		foreach ($results as $key => $value) {
			$pole = $db->getData('poles', $value['id_pole']);
			echo "<div class='userlist'>
					<span>Name: ".$value['nickname']."</span>
					<span>email: ".$value['email']."</span>
					<span>pole: ".$pole['name']."</span>
					<span>rank: ".$value['rank']."</span>
					<span><a href='?remove=".$value['id']."'>Remove</a></span>
					<span><a href='edit?user=".$value['id']."'>Edit</a></span>
				</div>";
		}
	}
	public function getUser(){
		$db = $GLOBALS['db'];
		$results = $db->getData('users', $_GET['user']);
		return $results;
	}
	public function register(){
		$db = $GLOBALS['db'];	
		$data = array();
		try {
			$this->validate($_POST['username-register']);
			$data['nickname'] = $_POST['username-register'];
			$this->validate($_POST['password-register']);
			$data['password'] = $_POST['password-register'];
			$data['password'] = $this->encodePass($data['password']);
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
	public function remove($id){
		$db = $GLOBALS['db'];
		$db->removeData('users', $id);
		header('Location: ./users');
	}
	public function edit($user){
		$db = $GLOBALS['db'];
		if($user['password'] != ""){
			$user['password'] = $this->encodePass($user['password']);
		}
		$db->editData('users', $user);	
		bf_setMessage('success', 'L\'utilisateur a bien été édité');
	}
}
