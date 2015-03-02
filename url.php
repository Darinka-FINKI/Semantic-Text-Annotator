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
					<div class="logo-wrapper"><a href="index.php"><img src="img/STAlogo.jpg" alt="FInki logo, FSCE" style="width: 390px"></a></div>						
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
						<form method="post" action="">
						 <input name="url" id="url" type="text" class="form-control"  aria-describedby="basic-addon1"><br/>
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

		<div class="section">
	    	<div class="container">
	    		<h2>Our Work</h2>
				<div class="row">
						<div class="portfolio-item">							
							<?php
							 if(isset($_POST['submit'])){
								include_once 'EntityExtraction/example.php';								
								for ($i=0;$i<count($entities);$i++) {
									echo $entities[$i]."<br />";
								}
							}
							 /*$text->clear(); 
							 unset($text);*/
							?>
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