<?php	
/**
   Copyright 2013 AlchemyAPI

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/

						
							
	require_once 'alchemyapi.php';
	$alchemyapi = new AlchemyAPI();
	
	if(isset($_POST['text'])){
		$demo_text=$_POST['text'];
	}
	else{
		$demo_text=$text;
	}
	$entities=array();

	$response = $alchemyapi->entities('text',$demo_text, array('sentiment'=>1));	
	

	if ($response['status'] == 'OK') {
			
	//	echo "## Entities ##"."<br />";//, PHP_EOL;
		foreach ($response['entities'] as $entity) {
		//	echo 'entity: ', $entity['text'], PHP_EOL;
			array_push($entities,$entity['text']); 
			/*echo 'type: ', $entity['type'], PHP_EOL;
			echo 'relevance: ', $entity['relevance'], PHP_EOL;
			echo 'sentiment: ', $entity['sentiment']['type']; 			
			if (array_key_exists('score', $entity['sentiment'])) {
				//echo ' (' . $entity['sentiment']['score'] . ')', PHP_EOL;
			} else {
				echo PHP_EOL;
			}*/
		}
	} else {
		echo 'Error in the entity extraction call: ', $response['statusInfo'];
	}
	
?>
