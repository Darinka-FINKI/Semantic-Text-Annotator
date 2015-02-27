
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
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							
								
							</li>
			        		<li><a href="#">Login</a></li>
			        	</ul>
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="index.html"><img src="img/logo.png" alt="FInki logo, FSCE" style="width: 390px"></a></li>
						<li>
							<h1>Semantic Text Annotator</h1>
						</li>
						<li>
							
						</li>
						<li class="has-submenu active">
							<a href="#"></a>
							<div class="mainmenu-submenu">
								<div class="mainmenu-submenu-inner"> 
								
									
								</div><!-- /mainmenu-submenu-inner -->
							</div><!-- /mainmenu-submenu -->
						</li>
						
					</ul>
				</nav>
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
						<br/>
						<form action="pdf.php" method="post" enctype="multipart/form-data">
    <h3>Please upload your PDF document below!</h3>
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <button class="btn btn-default" type="submit" id="submit" name="submit">Go!</button>
</form>
<?php 

if (isset($_POST['submit'])) {
						
						$ext = explode(".", $_FILES["file"]["name"]);
						$extension = $ext[count($ext) - 1];
						print_r($_FILES);
						if ($_FILES["file"]["type"] == "application/pdf") {
							if ($_FILES["file"]["error"] > 0) {
								echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
							} else {
								if(!file_exists("files")){
									mkdir("files");
								}
								
								move_uploaded_file( "files/" .  $_FILES["file"]["name"]);
								//header('Location: upload.php');
								echo " <p > Успешно прикачување! <p>";
								

								

							}
						} else {
							
							echo " <p > Невалиден формат! Внесете .pdf формат. <p>";
							//header('Location: upload.php');
						}

					}
?>

						
						   
					</div>
					
				</div>
			</div>
		</div>

		<div class="section">
	    	<div class="container">
	    		<h2>Our Work</h2>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="portfolio-item">
							
							<div class="portfolio-info">
								<ul>
									<li class="portfolio-project-name"> <h2>What is linked Data?</h2></li>
									<li class="portfolio-project-name"><h3>What is LOD?</h3></li>
									<li class="portfolio-project-name"> <h3>Can it change the world??</h></li>
									<li class="portfolio-project-name">What is Open Data?</li>
									<li class="portfolio-project-name">Is it important?</li>
									
									<li class="read-more"><a href="#" class="btn">Read more</a></li>
								</ul>
							</div>
						</div>
						<h3></h3>
						<h3></h3>
					</div>
					<div class="col-md-6">
						<div class="video-wrapper">
							
							<iframe src="//player.vimeo.com/video/36752317" width="500" height="375" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
							<p><a href="https://vimeo.com/36752317">Linked Open Data - What is it?</a> </p>
								</div>
					</div>
					
				</div>
			</div>
		</div>

		v>
	    <!-- End Testimonials -->

	    <!-- Our Clients -->
	    <div class="section">
	    	<div class="container">
	    		<h2>Our Clients</h2>
				<div class="clients-logo-wrapper text-center row">
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/canon.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/cisco.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/dell.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/ea.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/ebay.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/facebook.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/google.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/hp.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/microsoft.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/mysql.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/sony.png" alt="Client Name"></a></div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/yahoo.png" alt="Client Name"></a></div>
				</div>
			</div>
	    </div>
	    <!-- End Our Clients -->

	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-footer col-md-3 col-xs-6">
		    			<h3>Our Latest Work</h3>
		    			<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="page-portfolio-item.html"><img src="img/portfolio6.jpg" alt="Project Name"></a>
							</div>
						</div>
		    		</div>
		    		
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3>Contacts</h3>
		    			<p class="contact-us-details">
	        				<b>Address:</b> 123 Fake Street, LN1 2ST, London, United Kingdom<br/>
	        				<b>Phone:</b> +44 123 654321<br/>
	        				<b>Fax:</b> +44 123 654321<br/>
	        				<b>Email:</b> <a href="mailto:getintoutch@yourcompanydomain.com">getintoutch@yourcompanydomain.com</a>
	        			</p>
		    		</div>
		    		<div class="col-footer col-md-2 col-xs-6">
		    			<h3>Stay Connected</h3>
		    			<ul class="footer-stay-connected no-list-style">
		    				<li><a href="#" class="facebook"></a></li>
		    				<li><a href="#" class="twitter"></a></li>
		    				<li><a href="#" class="googleplus"></a></li>
		    			</ul>
		    		</div>
		    	</div>
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