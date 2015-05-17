<?php
include_once 'simple_html_dom.php';
//getting text from given url
$url=$_GET['url'];
$text=file_get_html($url)->plaintext;
include_once 'sparqlQueryExecute.php';
include_once 'EntityExtraction/example.php';
	//creating array for all entities and their uris
	$arrayJson = array("entities" => array());

	//go through all found entities and for every one of them execute sparql query
	for ($i = 0; $i < count($entities); $i++) {
	
		$entityLinks = executeQuery($entities[$i]);
		array_pop($entityLinks);

		//adding elements into the array
		array_push($arrayJson["entities"], array("name" => $entities[$i], "uri" => $entityLinks));
	}
		echo json_encode($arrayJson, JSON_UNESCAPED_SLASHES);
?>
