<?php


if(!defined('DS'))define('DS', DIRECTORY_SEPARATOR); //Joomla doesn't define this but Nick likes to

/**
 * check for component specific css file.
*/
if($component=JRequest::getVar('option',false)){
	$component=str_replace(array('com_',' '), '', $component);


	//checks for existing css file
	$file='css'.DS.'com'.DS.$component.'.css';
	if(!file_exists(dirname(__FILE__).DS.$file)){
		//die(dirname(__FILE__).DS.$file);
		$file=false;
	}

	//checks for the same file as above, but with .php extension.
	//this allows for dynamic css to be generated, to support
	//theme setting controls.
	//note* I am importing controls from com_geolive so that must exist!
	$filep='css'.DS.'com'.DS.$component.'.php';
	if(!file_exists(dirname(__FILE__).DS.$filep)){
		//die(dirname(__FILE__).DS.$file);
		$filep=false;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	xml:lang="<?php echo $this->language; ?>"
	lang="<?php echo $this->language; ?>">


<!-- Responsive and mobile friendly stuff -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">

<jdoc:include type="head" />

<!-- Stylesheets -->
<link href="/templates/geolive/css/bootstrap.css" rel="stylesheet">
<link href="/templates/geolive/css/bootstrap-theme.css" rel="stylesheet">
<link href="/templates/geolive/css/template.css" rel="stylesheet">
<link href="/templates/geolive/css/3cols.css" rel="stylesheet">
<link href="/templates/geolive/css/4cols.css" rel="stylesheet">
<link href="/templates/geolive/css/col.css" rel="stylesheet">
<link href="/templates/geolive/css/animate.css" rel="stylesheet">
<!-- <link href="/templates/geolive/css/discussion-posts.css" rel="stylesheet"> -->



<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php 
$component=JRequest::getVar('option','');
$item=JRequest::getVar('Itemid','');
if(file_exists((dirname(__FILE__)).DS.'css'.DS.$component.'.css')){
	?>

<link rel="stylesheet"
	href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/<?php echo $component; ?>.css"
	type="text/css" />
<?php 

}else{
?>
<!-- did not find <?php echo $component ?>.css -->
<?php 	

}
?>
</head>
<body class="<?php echo $component;?> <?php echo "item_".$item; ?>">
  <jdoc:include type="message" />
		
	<?php $geolive_admin=dirname(dirname(dirname(__FILE__))).'/administrator/components/com_geolive';
	 include_once  $geolive_admin.DIRECTORY_SEPARATOR.'cms.php';	
	 ?>
	
	<jdoc:include type="modules" name="signin" />
	<jdoc:include type="modules" name="signup" />
	<jdoc:include type="modules" name="scroll" />
	
	
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img src="/templates/geolive/images/geolive-logo-nav.png"> </a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class=" <?php
					if ($item==473) {
						echo "active";
						}
                ?>"><a href="discover">Discover</a></li>
					<li class=" <?php
					if ($item==474) {
						echo "active";
						}
                ?>"><a href="learn">Learn</a></li>
					<li class=" <?php
					if ($item==711) {
						echo "active";
						}
                ?>"><a href="contact">Contact</a></li>
                	<li class="signin signin-signup <?php echo JFactory::getUser()->guest?" guest":""; ?>">
						<a id="<?php echo JFactory::getUser()->guest?"signin":"signout"; ?>" class="signin-signup"><?php echo (JFactory::getUser()->guest==1)?"Sign in":"Sign out"; ?>
					</a></li>
					<li class="signup signin-signup <?php echo JFactory::getUser()->guest?"":" hide-signup"; ?>">
						<a id="signup" class="signin-signup">Sign up</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
			
			<?php Behavior('modal');?>
		</div>
	</div>

	<div class="container mapcontainer">
		<div class="maincontent">
			<jdoc:include type="component" />
		</div>
		<div class="container">
		    <jdoc:include type="modules" name="discover" />	
		    <jdoc:include type="modules" name="contactform" />	
		</div>		
	</div>

	<div id="footer">
		<div class="container">
			<div class="section group">
				<div class="col span_1_of_3">
					<h4>Where to find us...</h4>
					<ul>
						<li>Centre for Social, Spatial &amp; Economic Justice</li>
						<li>University of British Columbia Okanagan</li>
						<li>3333 University Way</li>
						<li>Kelowna, BC V1V 1V7</li>
						<li><a href="contact">Send us an email</a>
						</li>
					</ul>
				</div>
				<div class="col span_1_of_3">
					<div class="social">
						<a class="facebook-icon"
							href="https://www.facebook.com/GeoLiveMapping"><img
							src="/templates/geolive/images/social-icons/facebook.png"
							title="Facebook Logo" alt="Facebook Logo" /> </a> <a
							class="twitter-icon" href="https://twitter.com/geolive_mapping"><img
							src="/templates/geolive/images/social-icons/twitter.png"
							alt="Twitter Logo" title="Twitter Logo" /> </a> <a
							class="google-icon"
							href="https://plus.google.com/b/107752475198439440788/107752475198439440788/about"><img
							src="/templates/geolive/images/social-icons/google.png"
							title="Google Plus Logo" alt="Google Plus Logo" /> </a>
					</div>
				</div>
				<div class="col span_1_of_3 logo">
					<a href="/"><img
						src="/templates/geolive/images/geolive-logo-footer.png"
						title="GeoLive Logo" alt="GeoLive Logo" /> </a>
					<p>
						<a href="privacy-policy">Privacy Policy</a>
					</p>
				</div>
			</div>

		</div>
	</div>


	<jdoc:include type="modules" name="learn-popups" />
	<jdoc:include type="modules" name="bottom" />
	<jdoc:include type="modules" name="sign-in-up" />

	<!-- Wow -->
	<script src="templates/geolive/js/wow.min.js"></script>

  	<script>
		new WOW().init();
		</script>
	<script src="templates/geolive/js/bootstrap.js"></script>

</body>
</html>
