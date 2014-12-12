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
                   		 		<li class="active"><a href="heartglow.php">Heartglow</a></li>
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


			<div class = "jumbotron" >

				<?php
					include 'includes/treeAnimation.php';
				?>

			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Heartglow at Lulea Autumn festival
					</h2>
					<p>
						This weekend, Lulea Autumn Festival opens for the first time ever and Ljus++ will attend with the latest light installation Heartglow. The event starts on Thursday at 6 pm in Luleå City Park. Look for the tree with a heart or find us near the playground. The installation is also open on Friday and Saturday from 6 pm.
					</p>
					<p>
						<a class="btn" href="https://www.facebook.com/events/1574381059447465/">Keep track through facebook: »</a>
					</p>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h4>
						I am the tree Heartglow.
					</h4>
					<p>
						<em>
						
						<br>
						Inside me resides a light that wants to get out and flow free among the people of Luleå.
						<br>
						My life goal is to share with you my gift and spread warmth in the autumn chill, but I'm a bit rusty and need help along the way. Some kind students from the University have built a machine that starts my magic with a spark! It’s powered by human muscle power and is located at the playground.
						All who need warmth, or just an uplifting light in the autumn darkness, are welcome to pedal me to life at the playground.
						<br>
						<br>
						Hope to see you at the festival!

						<em>


					</p>
					<p>
						
					</p>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						About Heartglow
					</h2>
					<p>
						In the middle of Luleå City Park is a tree that has been selected by Ljus++ to become the tree Heartglow. It has a heart of light, but requires human interaction to come to life. The tree is connected to a playground nearby, where anyone can start its’ life cycle by using one of playgrounds’ rides. A light occurs on the playground and propagates to the tree's heart. The heart begins to beat and pump light through the trees’ crown. The lights are controlled by microprocessors deployed at the playground and in the tree. These are connected via WiFi and measures the speed of the playground ride. A more detailed technical description follows below.

					</p>
					<p>
					</p>
				</div>
			</div>

			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Technical description
					</h2>
					<p>
						

						The system is mainly composed of micro controllers called <a href="https://pinocc.io/">Pinoccio</a> ) and addressable LED strips.
						<br>
						<br>

						 Magnets are attached to the center of the bike ring. When it begins spinning, the magnets follow the movement. A Pinoccio located underneath the pillar in the bike ring center measure how fast the magnets pass by using a reed switch. It then calculates the speed in cycles per minute.
						 <br>
						<br>
						Data about the velocity is sent wirelessly through a mesh network to a Pinocchio attached to one of the poles located some meters from the bike ring. The Pinoccio at the pole has a WiFi module and pass the data on to a Web server. It also controls the animation of the lights on the pole. The higher the speed of the bike ring gets, the faster the lights change color.
						<br>
						<br>
						The Web server listens constantly for new messages and filters them. The messages contain data about the bike rings’ speed, redirected to another Pinocchio with WiFi that is attached to a tree in the center of the park. This unit then spreads the message, consisting of the velocity data, through the mesh network to all other devices in the tree, which adjusts their light animations.


						<ul class="list-unstyled">
						  <h4>Flow:</h4>
						  
						    <ul>
						      <li>The ring begins to spin.</li>
						      <li>A Pinoccio calculates how fast the magnets pass and send that data wirelessly to other 
								Pinoccios in the same group.
							</li>
						      <li>The other units in the group adapts their animations and the WiFi device transmits the information to a web server.
							</li>
						      <li>The web server filters the messages and send them to another Pinoccio which has WiFi</li>
						      <li>The Pinoccio further distribute the messages to the other units in its’ group, which then adapts the speed of their animations.
							</li>

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
						Ljus++ wants to Acknowledge
					</h2>
					<p>

						On behalf of all members in Ljus++, we want to express our gratefulness for the contributions of these gentlemen due to their generous efforts making this project possible.
						<br>
						<br>
						Thank you Prof. Peter Parnes for your dedication to supply the group not only with necessary hardware, but also your knowledge, advice and tutoring in this project.
						<br>
						<br>
						Thank you Angel David Garcia Llamas for your devotion and much appretiated desire to help the group with hardware solutions and knowledge in electronics, especially on a Saturday night at 10 pm :)
						<br>
						<br>
						Thank you Assistant Lecturer Johan Borg for support in supplying the group with advice and hardware during the most uncomfortable hours of the day.


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
