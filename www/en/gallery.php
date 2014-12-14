<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ljus++</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<!--<script type="text/javascript" src="js/tree.js"></script>
	-->
</head>
<!--
-->

<div class="twinkling"></div>
<div class="clouds"></div>
<div class="stars"></div>
<div class="siluett"></div>
<?php
include 'bench.php'

?>

<body class="bodybg">
<div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column">


			<!--  navbar -->
			<nav class="navbar navbar-inverse" role="navigation">
				<div class='navbar-inner'>
				<div class="navbar-header">
  			       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

					 
					 <span class="sr-only">Toggle navigation</span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					</button> 

					<a class="navbar-brand" href="index.php">Ljus++</a>
				</div>
				
				<div class="navbar-collapse collapse">
        		<ul class="nav navbar-nav nav">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="aboutUs.php">About us</a>
						</li>
						<li class="dropdown">
			                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Project <b class="caret"></b></a>
			                <ul class="dropdown-menu">
                   		 		<li><a href="heartglow.php">HeartGlow</a></li>
								<li><a href="artBench.php">ArtBench</a></li>

			                </ul>

			            </li>
			            <li class="active">
							<a href="gallery.php">Gallery</a>
						</li>

					</ul>
					
					<form align="right">
						<p> <a href="../"><img src="images/swedish-flag.jpg" alt="" width="30px" height="" /></a>
					</form>

				</div>
				
				</div>
				
			</nav>
			<!--  /navbar -->

			<!-- Content -->

			<div class="jumbotron">


				

			<div class="row clearfix">
				<div class="col-md-12 column">


						<style> 
						.mosaicflow__column { float:left; } 
						.mosaicflow__item img { display:block; width:100%; height:auto; } 
						</style>

					<!--
						<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 
					-->
						<script src="../js/jquery.mosaicflow.min.js"></script>


					<h2>
						Gallery
					</h2>
					<p>
						<?php
						$dirname = "../gallery/";

						$folders = glob($dirname."*");
						foreach($folders as $folder){
							$test = explode(".", $folder);
							echo '<h3>'.$test[3].'</h3>';

							echo '<div class="clearfix mosaicflow">';

							$images = glob($folder."/*.jpg");
							foreach($images as $image) {
								$test1 = explode("/", $image);
								
								
								$src = ''.$test1[0].'/'.$test1[1].'/'.$test1[2].'/thumb/'.$test1[3].'';
								//echo $src;

								echo '	
								<div class="mosaicflow__item"> 
								<a href = "'.$image.'"><img width="500" height="300" src="'.$src.'" alt=""> </a>
								</div> 
								';
							
							}
							echo '</div>'; 

						}	
	
					//	$images = glob($dirname."*.jpg");
					//	foreach($images as $image) {
					//	echo '<img src="'.$image.'" / width = "50%"><br />';
					//	}

						?>

					</p>
					




				</div>
			</div>


			
			</div>

			<!-- \Content -->

			<!-- Advetisment -->


			<div class="row clearfix">
				<div class="col-md-12 column">

					
					
					<div class='bottom-bar' align = "center">

				          <div id="bottom_container" >

				        <p>

				          <a href="http://www.artplusdata.se/"><img class="alignleft size-full wp-image-11707" title="Art plus Data" src="images/artplusdata.png" alt="" width="25%" height="" /></a></p>
				          
				         <p> <a href="http://www.ltu.se"><img class="alignleft size-full wp-image-11707" title="Lulea tekniska universitet" src="images/ltu.png" alt="" width="25%" height="" /></a>


				          
				          </p>

				        </div>

				      </div>
					
				</div>
			</div>


			<!-- Advetisment -->

			
		</div>
		<div class="col-md-2 column">
		</div>
	</div>

</div>









</body>


</html>


