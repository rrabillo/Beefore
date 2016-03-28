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
}
