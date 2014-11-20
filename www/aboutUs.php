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
	<script type="text/javascript" src="js/tree.js"></script>
</head>



<div class="twinkling"></div>
<div class="clouds"></div>
<div class="stars"></div>
<div class="siluett"></div>
<div id="tree"></div>


<body>


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
							<a href="index.php">Hem</a>
						</li>
						<li  class="active">
							<a href="aboutUs.php">Om oss</a>
						</li>
						<li class="dropdown">
			                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Projekt <b class="caret"></b></a>
			                <ul class="dropdown-menu">
                   		 		<li><a href="heartglow.php">Hjärteglöd</a></li>
			                </ul>

			            </li>
			            <li>
							<a href="gallery.php">Galleri</a>
						</li>

					</ul>
					
					<form align="right">
						<p> <a href="/en/"><img src="images/UKFlag.jpg" alt="" width="30px" height="" /></a>
					</form>

				</div>
				
				</div>
				
			</nav>


			<!--  /navbar -->


			<div class="jumbotron">


				<?php
				include 'includes/treeAnimation.php'
				?>


			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Varför gör vi detta egentligen? 
					</h2>
					<p>
						
						Utöver att det är fantastiskt roligt att leka med teknik och skapa konst vill Ljus++ lämna ett avtryck hos invånarna i Luleå. Vi vill visa att man med en kombination av konstnärlig vision och modern teknik kan få människors uppmärksamhet och på så sätt förmedla budskap och information genom ”levande” installationer. Grundsyftet med projektet är att 
						med hjälp av modern teknik visa på den energi som finns runt omkring oss hela tiden. 
						Trädet Hjärteglöd är ett första steg i denna riktning där tekniken, konsten och energin är på plats. Installationen kommer efter Höstfestivalen byggas om till ett nytt konstverk som är menat att förmedla ett budskap till stadens invånare.

						

					</p>
					<!--<p>
						<a class="btn" href="#">View details »</a>
					</p>-->
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Vad händer efter Höstfestivalen?
					</h2>
					<p>
						
						Projektet har nått sin första milstolpe och det är dags att gå vidare. Hjärteglöd kommer designas om till ett nytt tekniskt ljuskonstverk inriktat på att förmedla ett nytt budskap. 
					</p>
					
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Våran mysiga lilla grupp
					</h2>
					<p>
			          	<img class="alignleft size-full wp-image-11707" title="Lulea höstfestival" src="images/groupPicture.jpg" alt="" width="100%" height="" />

			          	Från vänster till höger: Simon Ekström, Michael Königsson, Anders Ragnarsson, Harald Andersson, Per Grundtman, Johan Forsling, Martin Persson, Erik Hellström, Trolle Geuna, Peter Bell och Jimmie van Eijsden 
									
					</p>
					<p>
					</p>
				</div>
			</div>
			</div>


			<div class="row clearfix">
				<div class="col-md-12 column">
					
					<p>

						<div class='bottom-bar' align = "center">

				          <div id="bottom_container" >

				        <p>

				          <a href="http://www.artplusdata.se/"><img class="alignleft size-full wp-image-11707" title="Art plus Data" src="images/artplusdata.png" alt="" width="25%" height="" /></a></p>
				          
				         <p> <a href="http://www.ltu.se"><img class="alignleft size-full wp-image-11707" title="Lulea tekniska universitet" src="images/ltu.png" alt="" width="25%" height="" /></a>


				          
				          </p>

				        </div>

				      </div>
			          	
					</p>
					
				</div>
			</div>
		</div>
		<div class="col-md-2 column">
		</div>
	</div>
</div>
</body>
</html>
