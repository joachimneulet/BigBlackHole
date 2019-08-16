<?php
class C_redtubeapi {

	/*Retrieve videos from redtube API
	** Returns most viewed if category parameter is empty
	** Returns XML file
	*/
	function getRedtubeVideos($category, $search)
	{
		$url = "https://api.redtube.com/?data=redtube.Videos.searchVideos&output=xml&ordering=mostviewed&thumbsize=big";
		if($category){
			$url = $url."&category=".$category;
		}
		if($search){
			$url = $url."&search=".$search;
		}
		
		$xml = simplexml_load_file($url);
		return $xml;
	}
	
	function getCategoriesVideos(){
		$url = "https://api.redtube.com/?data=redtube.Categories.getCategoriesList&output=xml";
		$xml = simplexml_load_file($url);
		return $xml;
	}
}
?>