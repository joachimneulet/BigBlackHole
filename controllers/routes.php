<?php
include_once('../controllers/c_redtubeapi.php');
$controller = new C_redtubeapi();

if(isset($_REQUEST['action'])){
	$action = $_REQUEST['action'];
}else{
	$category = '';
	$search = '';
	$action = '';
	$videos = $controller -> getRedtubeVideos($category, $search);
}

switch($action)
{
	case 'navlink':
		$search = '';
		$category = $_POST['navlink'];
		$videos = $controller -> getRedtubeVideos($category, $search);
		include('../views/v_accueil.php');
		break;
		
	case 'searchbar':
		$search = $_POST['searchContent'];
		$category = "";
		$videos = $controller -> getRedtubeVideos($category, $search);
		include('../views/v_accueil.php');
		break;
}

?>