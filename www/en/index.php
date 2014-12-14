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
	
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
	<!--<script type="text/javascript" src="js/tree.js"></script>
	-->
</head>

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
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="aboutUs.php">About us</a>
						</li>
						<li class="dropdown">
			                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Project <b class="caret"></b></a>
			                <ul class="dropdown-menu">
                   		 		<li><a href="heartglow.php">Heartglow</a></li>
								<li><a href="artBench.php">ArtBench</a></li>

			                </ul>

			            </li>
			            <li>
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



			<div class="jumbotron">

				<div class="row clearfix">
				<div class="col-md-12 column">

					<h2>
						Artbench at kulturens hus
					</h2>
					
					<p>
						Now that heart glow is completed and the project begins to pull an end, it's time to present our latest work ArtBench.
					</p>	
					<p>
						ArtBench is an interactive art project where two benches are connected to each other and illuminates the respective seat 
					</p>
					<p>
						<a class="btn" href="artBench.php">Projektet ArtBench »</a>
					</p>

					<P>
						Ps.<br>
						The benches on the site shows how the benches are used right now.
					</P>
				</div>
				</div>


				<div class="row clearfix">
				<div class="col-md-12 column">

					<h2>
						Heartglow
					</h2>
					
					<p>
						During Luleå Autumn festival, on October 30th to November 2nd, the first milestone will be reached in the city park. Ljus++ presents the Heartglow Tree, an interactive light installation that spreads life and warmth through the autumn chill. Check out the website to read more about the installation Heartglow.
					</p>
					<p>
						<a class="btn" href="heartglow.php">Project Heartglow »</a>
					</p>
					<p>
						The tree that are lighting up the webpage are directly connected to the tree downtown, so when someone are playing on the carousel bicycle it are givin us data to light up the page.
					</p>

				</div>
			</div>

			<div class="row clearfix">
				<div class="col-md-12 column">
					
					
					<h2>
						Ljus++
					</h2>
					<p>
						Ljus++ is a project carried out in the course Project in Information and Communication Technology, at Luleå University of Technology. The team consists of eleven students from Computer Science and Arena MMT. The project started in September 2014 and will run until December 2014. 

					</p>
					<!--<p>
						<a class="btn" href="#">View details »</a>
					</p>-->
				</div>
			</div>


			
			</div>


			<div class="row clearfix">
				<div class="col-md-12 column">

					
					
					<div class='bottom-bar' align = "center">

				          <div id="bottom_container" >

				        <p>

				          <a href="http://www.artplusdata.se/"><img class="alignleft size-full wp-image-11707" title="Art plus Data" src="images/artplusdata.png" alt="" width="25%" height="" /></a></p>
				          
				         <p> <a href="http://www.ltu.se"><img class="alignleft size-full wp-image-11707" title="Lulea tekniska universitet" src="../images/ltu.png" alt="" width="25%" height="" /></a>


				          
				          </p>

				        </div>

				      </div>
					
				</div>
			</div>
			
		</div>
		<div class="col-md-2 column">
		</div>
	</div>

</div>
</body>
</html>
