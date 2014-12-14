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
	<!--<script type="text/javascript" src="js/tree.js"></script>-->
	
</head>
<!--
-->

<div class="twinkling"></div>
<div class="clouds"></div>
<div class="stars"></div>
<div class="siluett"></div>
<?php
include 'bench/bench.php'

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
						<li class="active">
							<a href="index.php">Hem</a>
						</li>
						<li>
							<a href="aboutUs.php">Om oss</a>
						</li>
						<li class="dropdown">
			                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Projekt <b class="caret"></b></a>
			                <ul class="dropdown-menu">
                   		 		<li><a href="heartglow.php">Hjärteglöd</a></li>
                   		 		<li><a href="artBench.php">ArtBench</a></li>
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

			<!-- Content -->

			<div class="jumbotron">

				<div class="row clearfix">
				<div class="col-md-12 column">

					<h2>
						Provsitt ArtBench på Kulturens Hus!
					</h2>
					
					<p>
						Under vecka 50 kommer Ljus++ ställa ut två exemplar av ljusinstallationen ArtBench
						i Kulturens Hus. Konstverket är en del i ett samarbete med projektet Art+Data,
						i vilket totalt fyra interaktiva bänkar skapats.					</p>	
					
						<a class="btn" href="artBench.php">Projektet ArtBench »</a>
					</p>

					<P>
						Ps.<br>
						Bänkarna på sidan visar hur bänkarna lyser på kulturens hus just nu.
					</P>
				</div>
			</div>


				

				<div class="row clearfix">
				<div class="col-md-12 column">

					<h2>
						Trädet Hjärteglöd på Luleå Höstfestival
					</h2>
					
					<p>
						Den första milstolpen i projektet nås i Luleå Stadspark under Höstfestivalen den 30 oktober till 2 november. Ljus++ presenterar Trädet Hjärteglöd, en interaktiv ljusinstallation som sprider liv och värme i höstens mörker. Gå till startsidan för att läsa mer om installationen Hjärteglöd.
					</p>
					<p>
						<a class="btn" href="heartglow.php">Projektet Hjärteglöd »</a>
					</p>

					<P>
						Trädet som lyser upp hemsidan är direkt kopplat emot trädet nere i stan, så när någon cyklar på cykelkarusellen samlas data in och lyser up sidan genom att ta ett medelvärde av karusellens hastigheten.
					</P>
				</div>
			</div>


			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Ljus++
					</h2>
					<p>
						Ljus++ är ett projekt som genomförs i kursen Projekt i Informations- och Kommunikationsteknik vid luleå tekniska universitet. Projektgruppen består av elva studenter som läser till civilingenjörer i programmen datateknik och Arena MMT. Projektet startade i september 2014 och pågår till december 2014. 

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


