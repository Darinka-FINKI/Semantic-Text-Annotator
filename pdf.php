
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
						  <li role="presentation" ><a href="index.php">Text Area</a></li>
						  <li role="presentation"><a href="url.php">URL</a></li>
						  <li role="presentation" class="active"><a href="pdf.php">PDF </a></li>
						</ul>
					</div>
					<div class="col-md-12"> <br/>
						<form action="#entities" method="post"  enctype="multipart/form-data">
  						<h3>Please upload your PDF document below!</h3><br />
					    <input  type="file"  value="Upload your file:" name="file" id="file"/><br/>
					    
					    <button class="btn btn-default btn-lg" type="submit" id="submit" name="submit">Submit</button>
					    <button class="btn btn-default btn-lg" type="submit" id="jsonBtn" name="jsonBtn">JSON Format</button>
					</form>
					
				<?php 				
				$text="";
				if (isset($_POST['submit'])||isset($_POST['jsonBtn'])) {						
						$ext = explode(".", $_FILES["file"]["name"]);
						$extension = $ext[count($ext) - 1];
						
						if ($_FILES["file"]["type"] == "application/pdf") {
							if ($_FILES["file"]["error"] > 0) {
								echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
							} else {
								if(!file_exists("files")){
									mkdir("files");
								}
								move_uploaded_file( $_FILES["file"]["tmp_name"],"files/" .  $_FILES["file"]["name"]);							
								include('class.pdf2text.php');
								$a = new PDF2Text();
								$name=$_FILES["file"]["name"];
								$a->setFilename("files/".$name); 
								$a->decodePDF();
								$text=$a->output();
							}
						} else {
							 echo " <p style='color: red' > Invalid file format, please re-select <p>";
						}
					}
				?>
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
							include_once 'showResults.php';
							?>
						</div>
				</div>
			</div>
		</div>
		
			<br />
		<br />
		<br />

	    <!-- End Testimonials -->

	    
	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2015 All rights reserved</div>
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