<?php
class article {
	var $title;
	var $date;
	var $published;
	var $content;
	var $id_user;
	var $id_pole;

	public function listArticlebyPoleName($pole_name){
		$db = $GLOBALS['db'];	
		$results = $db->getDataArticles('name', $pole_name);
		return $results;
	}
	public function getArticleWithAuthor($id){
		$db = $GLOBALS['db'];	
		$results = $db->getDataArticles('author', $id);
		return $results;
	}
	public function add(){
		$db = $GLOBALS['db'];	
		$data = array();
		try {
			$this->validate($_POST['title']);
			$data['title'] = $_POST['title'];
			$this->validate($_POST['content']);
			$data['content'] = $_POST['content'];
			$data['id_user'] = $_SESSION['user']->id;
			$data['id_pole'] = $_SESSION['user']->pole;
			$data['published'] = 0;
			$data['img_url'] = $_FILES['img'];
			$content_dir = dirname(__FILE__).'/../../uploads/';
			$tmp_file = $_FILES['img']['tmp_name'];
			if(!is_uploaded_file($tmp_file)){
				exit("Le fichier est introuvable");
			}
			// on vérifie maintenant l'extension
		    $type_file = $_FILES['img']['type'];
		    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png') ){
		        exit("Le fichier n'est pas une image");
		    }
		    $name_file = $_FILES['img']['name'];
		    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) ){
		        exit("Impossible de copier le fichier dans $content_dir");
		    }
		    $data['filename'] = $name_file;
			$db->insertData('articles', $data);
			bf_setMessage('success', "L'article a bien été posté, il est attente de validation");
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
	public function listArticles(){
		$db = $GLOBALS['db'];	
		$results = $db->getData('articles');
		foreach ($results as $key => $value) {
			echo "<div class='articleslist'>
					<span>Titre: ".$value['title']."</span>
					<span>Contenu: ".$value['content']."</span>
					<span>Date du post: ".$value['date_post']."</span>
					<span>Publié: ".$value['published']."</span>
					<span><a href='?remove=".$value['id']."'>Remove</a></span>
					<span><a href='edit?pole=".$value['id']."'>Edit</a></span>
				</div>";
		}
	}
	public function listPublished(){
		$db = $GLOBALS['db'];	
		$results = $db->getData('articles');
		foreach ($results as $key => $value) {
			if($value['published'] == 1){
			echo "<div class='articleslist'>
					<span>Titre: ".$value['title']."</span>
					<span>Contenu: ".$value['content']."</span>
					<span>Date du post: ".$value['date_post']."</span>
					<span>Publié: Oui</span>
					<span><a href='?remove=".$value['id']."'>Remove</a></span>
					<span><a href='edit?article=".$value['id']."'>Edit</a></span>
				</div>";
			}
		}
	}
	public function listUnPublished(){
		$db = $GLOBALS['db'];	
		$results = $db->getData('articles');
		foreach ($results as $key => $value) {
			if($value['published'] == 0){
			echo "<div class='articleslist'>
					<span>Titre: ".$value['title']."</span>
					<span>Contenu: ".$value['content']."</span>
					<span>Date du post: ".$value['date_post']."</span>
					<span>Publié: Non</span>
					<span><a href='?remove=".$value['id']."'>Remove</a></span>
					<span><a href='edit?article=".$value['id']."'>Edit</a></span>
				</div>";
			}
		}
	}
	public function getArticle(){
		$db = $GLOBALS['db'];
		$results = $db->getData('articles', $_GET['article']);
		return $results;
	}
	public function remove($id){
		$db = $GLOBALS['db'];
		$db->removeData('articles', $id);
		header('Location: ./articles');
	}
	public function edit($article){
		$db = $GLOBALS['db'];
		$db->editData('articles', $article);	
		bf_setMessage('success', 'L\'article a bien été édité');
	}
	public function getExcerpt($article){
		$article = strip_tags($article);
		$excerpt = substr($article, 0, 150);
		return $excerpt;
	}
}
