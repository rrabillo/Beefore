<?php
require_once( dirname( __FILE__ ) . '/../../config/database.php' );
class data{
	var $db;
	function insertData($type, $data){
		switch($type)
		{
			case 'users':
				$req = $this->db->prepare("INSERT INTO USERS (nickname, password, email, rank) VALUES (:nickname, :password, :email, :rank)");
				$req->bindParam(':nickname', $nickname);
				$req->bindParam(':password', $password);
				$req->bindParam(':email', $email);
				$req->bindParam(':rank', $rank);
				$nickname = $data['nickname'];
				$password = $data['password'];
				$email = $data['email'];
				$rank = $data['rank'];
				$req->execute();
			break;
		}
	}
	function getData($type){
		switch ($type) {
			case 'users':
				$req = $this->db->prepare("SELECT * FROM users");
				$req->execute();
				$result = $req->fetchAll();
				return $result;
				break;
		}
	}
}

$db = new data();
$db->db = $dbh;
$GLOBALS['db'] = $db;