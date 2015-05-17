<?php

//function which takes entity as an argument and performs sparql query for finding resources on dbpedia, returns array with urls

function executeQuery($entity){
	
$sparqlQuery="SELECT ?subject, ?object WHERE {
  {?subject <http://purl.org/dc/elements/1.1/title> ?object. ?object bif:contains \"'$entity'\"} UNION
  {?subject <http://www.w3.org/2000/01/rdf-schema#label> ?object. ?object bif:contains \"'$entity'\"} UNION
  {?subject <http://www.w3.org/2004/02/skos/core#prefLabel> ?object. ?object bif:contains \"'$entity'\"}
} LIMIT 3";


//string containing dbpedia url for the results in csv format (easiest to parse)
$dbpediaURL="http://dbpedia.org/sparql?default-graph-uri=http%3A%2F%2Fdbpedia.org&query=".urlencode($sparqlQuery)."&format=csv&timeout=0";

//sending request to dbpedia
$response=request($dbpediaURL);
//parsing the string from the response into array of urls(strings)
$splitByLine=explode("\n", $response);
$entityArray=array();
	for($i=1;$i<count($splitByLine);$i++){
		$tmp=explode(",", $splitByLine[$i]);
		array_push($entityArray,str_replace("\"", "", $tmp[0]));
	}	
	
return $entityArray;	
}


//function for sending requests to webpages
function request($url){
 
   // is curl installed?
   if (!function_exists('curl_init')){ 
      die('CURL is not installed!');
   }
   
   // get curl handle
   $ch= curl_init();

   // set request url
   curl_setopt($ch,CURLOPT_URL,$url);

   // return response, don't print/echo
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

   $response = curl_exec($ch);
   
   curl_close($ch);
   
   return $response;
}


?>