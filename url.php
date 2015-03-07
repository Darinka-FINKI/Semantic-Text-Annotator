<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Semantic Text Annotator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

        <!-- Navigation & Logo-->
   		<div class="mainmenu-wrapper">
	        <div class="container">
	        	<br />
					<div class="logo-wrapper"><a href="index.php"><img src="img/STAlogo.jpg" alt="logo" style="width: 390px"></a></div>						
			</div>
		</div>
		
        <div class="section section-white">
	    	<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="index.php">Text Area</a></li>
						  <li role="presentation"  class="active"><a href="url.php">URL</a></li>
						  <li role="presentation"><a href="pdf.php">PDF </a></li>
						</ul>
					</div>
					<div class="col-md-12"> <br/>
						<h3>Insert your link below!</h3>
						<p>Format: http://www.example.com/</p>
						<form method="post" action="#entities">
							<input name="url" id="url" type="text" class="form-control"  aria-describedby="basic-addon1" value="<?php echo (isset($_POST['url']) ? $_POST['url'] : ''); ?>"><br/>
							<button class="btn btn-default" type="submit" name="submit" id="submit">Submit</button>
						</form>
					</div>
					<div class="col-md-12"> <br/>						 
						<p id="quote" style="font-size:  18px; " >
						<?php					
							$text;
							$url="";
							if(isset($_POST['submit']))
							{
								$url=$_POST['url'];
								if($url!=null){
									include_once 'simple_html_dom.php';
									$text=file_get_html($url)->plaintext;
									//echo $text;
								}
								else{
								echo  "<p style='color: red' > Please insert an URL <p>";
								}
							}
							?>
						<p/>						
					</div>					
				</div>
			</div>
		</div>

		<div id="entities" class="section">
	    	<div class="container">
	    		<h2>Entities</h2>
				<div class="row">
						<div class="portfolio-item">							
							<?php
							include_once 'sparqlQueryExecute.php';
							 if(isset($_POST['submit'])){
								include_once 'EntityExtraction/example.php';								
								for ($i=0;$i<count($entities);$i++) {
									echo "<b>".$entities[$i]."</b><br />";
									
									$entityLinks=executeQuery($entities[$i]);
									for ($j=0;$j<count($entityLinks);$j++) {
										echo "<a href='$entityLinks[$j]'>".$entityLinks[$j]."</a><br /> ";
									}
								}
							}
							 /*$text->clear(); 
							 unset($text);*/
							?>
							
							<?php
  /* ARC2 static class inclusion 
   * 
   * SELECT DISTINCT ?subject, ?object WHERE {
  {?subject dc:title ?object. ?object  rdfs:label "Albert Einstein" ?object bif:contains "Albert Einstein"} UNION
  {?subject rdfs:label ?object. ?object rdfs:label "Albert Einstein"} UNION
  
}
LIMIT 5
   * 
   * SELECT DISTINCT ?species ?binomial ?genus ?label
  WHERE { ?species dbpedia-owl:family :Characidae;
        dbpprop:genus ?genus;
        rdfs:label ?label;
        dbpedia2:binomial ?binomial.
        filter ( langMatches(lang(?label), "en") ) }
  ORDER BY ?genus
   * */ 
   /* ARC2 static class inclusion */ 
  /*include_once('semsol/ARC2.php');  
 
  $dbpconfig = array(
  "remote_store_endpoint" => "http://dbpedia.org/sparql",
   );
 
  $store = ARC2::getRemoteStore($dbpconfig); 
 
  if ($errs = $store->getErrors()) {
     echo "<h1>getRemoteSotre error<h1>" ;
  }
 
  $query = '
  
  PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>
  PREFIX owl: <http://www.w3.org/2002/07/owl#>
  PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
  PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
  PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
  PREFIX foaf: <http://xmlns.com/foaf/0.1/>
  PREFIX dc: <http://purl.org/dc/elements/1.1/>
  PREFIX : <http://dbpedia.org/resource/>
  PREFIX dbpedia2: <http://dbpedia.org/property/>
  PREFIX dbpedia: <http://dbpedia.org/>
  PREFIX dbpprop: <http://dbpedia.org/property/>
  
SELECT DISTINCT ?species ?binomial ?genus ?label
  WHERE { ?species dbpedia-owl:family :Characidae;
        dbpprop:genus ?genus;
        rdfs:label ?label;
        dbpedia2:binomial ?binomial.
        filter ( langMatches(lang(?label), "en") ) }
  ORDER BY ?genus
  
  ';
  
  /* execute the query */
 /* $rows = $store->query($query, 'rows'); 
 
    if ($errs = $store->getErrors()) {
       echo "Query errors" ;
       print_r($errs);
    }
 
    /* display the results in an HTML table */
   /*echo "<table border='1'>
    <thead>
        <th>#</th>
        <th>Species (Label)</th>
        <th>Binomial</th>
        <th>Genus</th>
    </thead>";

    /* loop for each returned row */
  /*  foreach( $rows as $row ) { 
    print "<tr><td>". "</td>
    <td><a href='". $row['species'] . "'>" . 
    $row['label']."</a></td><td>" . 
    $row['binomial']. "</td><td>" . 
    $row['genus']. "</td></tr>";
    }
    echo "</table>" 
    */
  ?>
						</div>
				</div>
			</div>
		</div>

		
	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2013 mPurpose. All rights reserved.</div>
		    		</div>
		    	</div>
		    </div>
	    </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>

    </body>
</html>