<?php
include_once 'sparqlQueryExecute.php';

if (isset($_POST['submit']) || isset($_POST['jsonBtn'])) {

	include_once 'EntityExtraction/example.php';
	//creating array for all entities and their uris
	$arrayJson = array("entities" => array());

	//go through all found entities and for every one of them execute sparql query
	for ($i = 0; $i < count($entities); $i++) {
		if (isset($_POST['submit'])) {
			echo "<b>" . $entities[$i] . "</b><br />";
		}
		$entityLinks = executeQuery($entities[$i]);
		array_pop($entityLinks);

		//adding elements into the array
		array_push($arrayJson["entities"], array("name" => $entities[$i], "uri" => $entityLinks));

		if (isset($_POST['submit'])) {
			for ($j = 0; $j < count($entityLinks); $j++) {
				echo "<a href='$entityLinks[$j]'>" . $entityLinks[$j] . "</a><br /> ";
			}
		}
	}
	
	//is JSON button is clicked return JSON format
	if (isset($_POST['jsonBtn'])) {
		echo json_encode($arrayJson, JSON_UNESCAPED_SLASHES);
	}

}
?>