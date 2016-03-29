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
		$results = $db->getData('articles', $pole_name);
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
}
