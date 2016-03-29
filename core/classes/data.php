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
			case 'articles':
				$req = $this->db->prepare("INSERT INTO articles (title, content, date_post, published, filename, id_pole, id_user) VALUES (:title, :content, :date_post, :published, :filename, :id_pole, :id_user)");
				$title = $data['title'];
				$content = $data['content'];
				$published = $data['published'];
				$filename = $data['filename'];
				$id_pole = intval($data['id_pole']);
				$id_user = intval($data['id_user']);
				$date = date('Y-m-d H:i:s');  
				$req->bindParam(':title', $title);
				$req->bindParam(':content', $content);
				$req->bindParam(':published', $published);
				$req->bindParam(':filename', $filename);
				$req->bindParam(':id_pole', $id_pole);
				$req->bindParam(':id_user', $id_user);
				$req->bindParam(':date_post', $date);
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
					$req = $this->db->prepare("SELECT * FROM articles WHERE id = $id LIMIT 1");
					$req->execute();
					$result = $req->fetch();
					return $result;
				}
			break;
		}
	}

	/* Okay, c'est moche, mais pas le choix, j'aurais du prévoir avant en passant un array au lieu d'une simple variable pour les paramêtres, mais là c'est trop tard */
	function getDataArticles($ReqType, $id = false){
		switch ($ReqType) {
			case 'name':
				$req = $this->db->prepare("SELECT * FROM articles INNER JOIN poles ON articles.id_pole = poles.id WHERE poles.name = '$id' AND articles.published = 1 ORDER BY DATE_POST DESC");
				$req->execute();
				$result = $req->fetchAll();
				return $result;
			break;
			case 'author':
				$req = $this->db->prepare("SELECT * FROM articles INNER JOIN users ON articles.id_user = users.id WHERE articles.id = '$id' AND articles.published = 1 ORDER BY DATE_POST DESC");
				$req->execute();
				$result = $req->fetch();
				return $result;
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
			case 'articles':
				$req = $this->db->prepare("DELETE FROM articles WHERE id = $id");
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
			case 'articles':
				$req = $this->db->prepare("UPDATE articles SET title = :title, content = :content, published = :published WHERE id = :id");
				$req->bindParam(':id', $id);
				$req->bindParam(':title', $title);
				$req->bindParam(':content', $content);
				$req->bindParam(':published', $published);
				$id = $data['id'];
				$title = $data['title'];
				$content = $data['content'];
				$published = $data['published'];
				$req->execute();
			break;
		}
	}
}

if(isset($dbh)){
	$db = new data();
	$db->db = $dbh;
	$GLOBALS['db'] = $db;
}
else{
	$dirname = 'install/index.php';
	header("Location:".$dirname);
}