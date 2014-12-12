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
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="aboutUs.php">About us</a>
						</li>
						<li class="dropdown">
			                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Project <b class="caret"></b></a>
			                <ul class="dropdown-menu">
                   		 		<li><a href="heartglow.php">Heartglow</a></li>
                   		 		<li class="active"><a href="artBench.php">ArtBench</a></li>
			                	  
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
						ArtBench på kulturen hus
					</h2>
					<p>
						/lipsum

					</p>
					
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h3>
						/lipsum
					</h3>
					<p>
					<em>
						/lipsum
						<br>
						<br>
						/lipsum
						<br>
						<br>
						/lipsum
					</em>

					</p>
					<p>
						
					</p>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						/lipsum
					</h2>
					<p>
						/lipsum

						<br>
						<br>

						/lipsum

					</p>
					<p>
					</p>
				</div>
			</div>

			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						/lipsum
					</h2>
					<p>
						

						Systemet är huvudsakligen uppbyggt med mikrokontrollerkort kallade <a href="https://pinocc.io/">Pinoccio</a> samt adresserbara LED-lister.
						<br>
						<br>

						 /lipsum
						 <br>
						<br>
						/lipsum
						<br>
						<br>
						/lipsum



						<ul class="list-unstyled">
						  <h4>/lipsum</h4>
						  
						    <ul>
						      /lipsum

						    </ul>
						  
						  
						</ul>


					</p>
					<p>
					</p>
				</div>
			</div>

			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						/lipsum
					</h2>
					<p>

						/lipsum
						<br>
						<br>
						/lipsum
						<br>
						<br>
						/lipsum
						<br>
						<br>
						/lipsum

					</p>
					<p>
					</p>
				</div>
			</div>



			</div>


			<div class="row clearfix">
				<div class="col-md-12 column">

					
					
					<div class='bottom-bar' align = "center">

				          <div id="bottom_container">

					        <p>

					          <a href="http://www.artplusdata.se/"><img class="alignleft size-full wp-image-11707" title="Art plus Data" src="images/artplusdata.png" alt="" width="25%" height="" /></a></p>
					          
					         <p> <a href="http://www.ltu.se"><img class="alignleft size-full wp-image-11707" title="Lulea tekniska universitet" src="images/ltu.png" alt="" width="25%" height="" /></a>


					          <a href="http://www.lulea.se/uppleva--gora/arrangemang/lulea-hostfestival/program.html"><img class="alignleft size-full wp-image-11707" title="Lulea höstfestival" src="images/Symbolbild-Lulea-hostfestival.jpg" alt="" width="25%" height="" /></a>
					          
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
