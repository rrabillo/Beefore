<?php
require_once( dirname( __FILE__ ) . '/../../config/database.php' );
class data{
	var $db;
	function insertData($type, $data){
		switch($type)
		{
			case 'users':
				$req = $this->db->prepare("INSERT INTO users (nickname, password, email, rank) VALUES (:nickname, :password, :email, :rank)");
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
			case 'pole':
				$req = $this->db->prepare("INSERT INTO poles (name) VALUES (:name)");
				$req->bindParam(':name', $name);
				$name = $data['name'];
				$req->execute();
			break;
		}
	}
	function getData($type, $id = false){
		switch ($type) {
			case 'users':
				if(!$id){
					$req = $this->db->prepare("SELECT * FROM users");
					$req->execute();
					$result = $req->fetchAll();
					return $result;
				}
				else{
					$req = $this->db->prepare("SELECT * FROM users WHERE id = $id");
					$req->execute();
					$result = $req->fetch();
					return $result;
				}
			break;
			case 'poles':
				if(!$id){
					$req = $this->db->prepare("SELECT * FROM poles");
					$req->execute();
					$result = $req->fetchAll();
					return $result;
				}
				else{
					$req = $this->db->prepare("SELECT * FROM poles WHERE id = $id LIMIT 1");
					$req->execute();
					$result = $req->fetch();
					return $result;
				}
			break;
			case 'articles':
				if(!$id){
					$req = $this->db->prepare("SELECT * FROM articles");
					$req->execute();
					$result = $req->fetchAll();
					return $result;
				}
				else{
					$req = $this->db->prepare("SELECT * FROM articles INNER JOIN poles ON articles.id_pole = poles.id WHERE poles.name = '$id' ORDER BY DATE DESC");
					$req->execute();
					$result = $req->fetchAll();
					return $result;
				}
			break;
		}
	}
	function removeData($type, $id){
		switch ($type) {
			case 'users':
				$req = $this->db->prepare("DELETE FROM users WHERE id = $id");
				$req->execute();
			break;
			case 'poles':
				$req = $this->db->prepare("DELETE FROM poles WHERE id = $id");
				$req->execute();
			break;

		}
	}
	function editData($type, $data){
		switch ($type) {
			case 'users':
				if($data['password'] != ""){
					$req = $this->db->prepare("UPDATE users SET nickname = :nickname, password = :password, email = :email, rank = :rank, id_pole = :pole WHERE id = :id");
					$req->bindParam(':password', $password);
					$password = $data['password'];
				}
				else{
					$req = $this->db->prepare("UPDATE users SET nickname = :nickname, email = :email, rank = :rank, id_pole = :pole WHERE id = :id");
				}
				$req->bindParam(':id', $id);
				$req->bindParam(':nickname', $nickname);
				$req->bindParam(':email', $email);
				$req->bindParam(':rank', $rank);
				$req->bindParam(':pole', $pole);
				$id = $data['id'];
				$nickname = $data['nickname'];
				$email = $data['email'];
				$rank = $data['rank'];
				$pole = $data['pole'];
				$req->execute();
			break;
			case 'poles':
				$req = $this->db->prepare("UPDATE poles SET name = :name WHERE id = :id");
				$req->bindParam(':id', $id);
				$req->bindParam(':name', $name);
				$id = $data['id'];
				$name = $data['name'];
				$req->execute();
				break;
		}
	}
}

$db = new data();
$db->db = $dbh;
$GLOBALS['db'] = $db;