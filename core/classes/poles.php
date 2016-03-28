<?php 
require_once( dirname( __FILE__ ) . '/data.php' );
class pole{
	var $id;
	var $name;
	public function listPoles(){
		$db = $GLOBALS['db'];	
		$results = $db->getData('poles');
		foreach ($results as $key => $value) {
			echo "<div class='poleslist'>
					<span>Name: ".$value['name']."</span>
					<span><a href='?remove=".$value['id']."'>Remove</a></span>
					<span><a href='edit?pole=".$value['id']."'>Edit</a></span>
				</div>";
		}
	}
	public function listBrut(){
		$db = $GLOBALS['db'];	
		$results = $db->getData('poles');
		return $results;
	}
	public function getPole(){
		$db = $GLOBALS['db'];
		$results = $db->getData('poles', $_GET['pole']);
		return $results;
	}
	public function addPole(){
		$db = $GLOBALS['db'];	
		$data = array();
		try {
			$this->validate($_POST['name']);
			$data['name'] = $_POST['name'];
			$db->insertData('pole', $data);
			bf_setMessage('success', "le pôle ".$data['name']." a bien été ajouté");
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
	public function edit($pole){
		$db = $GLOBALS['db'];
		$db->editData('poles', $pole);	
		bf_setMessage('success', 'Le pôle a bien été édité');
	}
	public function remove($id){
		$db = $GLOBALS['db'];
		$db->removeData('poles', $id);
		header('Location: ./poles');
	}
}