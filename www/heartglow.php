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
						<li>
							<a href="aboutUs.php">Om oss</a>
						</li>
						<li class="dropdown">
			                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Projekt <b class="caret"></b></a>
			                <ul class="dropdown-menu">
                   		 		<li class="active"><a href="heartglow.php">Hjärteglöd</a></li>
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
						Trädet Hjärteglöd på Luleå Höstfestival
					</h2>
					<p>
						Nu till helgen öppnar Luleå Höstfestival för första gången någonsin och Ljus++ finns på plats och representerar med den senaste ljusinstallationen Hjärteglöd. På torsdag klockan 18:00 drar det igång i Stadsparken. Leta efter trädet med lite extra mycket hjärta eller leta upp oss i närheten av lekparken. Installationen kommer även vara igång på fredagen och lördagen från kl 18:00.
						

					</p>
					<p>
						<a class="btn" href="https://www.facebook.com/events/1574381059447465/">Håll koll via facebook: »</a>
					</p>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h3>
						Jag är trädet Hjärteglöd. 
					</h3>
					<p>
					<em>
						Inuti mig finns ett ljus som vill ta sig ut och flöda fritt bland stadens människor. 
						Mitt livsmål är att dela med mig av min gåva och sprida värme i höstkylan. Men jag är lite ringrostig och behöver hjälp på traven. Några snälla studenter från universitetet har byggt en manick som startar min magi med ett kick! Den drivs av pedalkraft och befinner sig uppe i lekparken.
						<br>
						<br>
						Alla som fryser och behöver värme, eller bara ett upplyftande ljus i höstmörkret, är välkomna att trampa igång mig i lekparken.
						<br>
						<br>
						Hoppas vi ses på festivalen
						Hälsningar
						Hjärteglöd
					</em>

					</p>
					<p>
						
					</p>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Om ljusinstallationen Hjärteglöd
					</h2>
					<p>
						I mitten av Luleå Stadspark står ett träd som blivit utvalt av Ljus++ att bli trädet Hjärteglöd. Trädet har ett hjärta av ljus, men för att trädet ska leva krävs mänsklig interaktion. En bit från trädet finns en lekpark där vem som helst kan sätta igång trädets livscykel, med hjälp av en av lekparkens attraktioner. Ett flödande ljus uppstår på lekparken och fortplantar sig till trädets hjärta. Hjärtat börjar slå och pumpar ljus genom det trädets krona.

						<br>
						<br>

						Ljusen kontrolleras av mikrodatorer utplacerade i lekparken och i trädet. Dessa är uppkopplade via WiFi och mäter hastigheten i attraktionen på lekparken. En mer detaljerad teknisk beskrivning följer nedan.

					</p>
					<p>
					</p>
				</div>
			</div>

			<div class="row clearfix">
				<div class="col-md-12 column">
					<h2>
						Teknisk beskrivning
					</h2>
					<p>
						

						Systemet är huvudsakligen uppbyggt med mikrokontrollerkort kallade <a href="https://pinocc.io/">Pinoccio</a> samt adresserbara LED-lister.
						<br>
						<br>

						 Under navet på cykelringen sitter det magneter. När cykelringen börjar snurra följer dessa magneter med i rörelsen och en Pinoccio som sitter på stolpen under cykelringen mäter av när magneterna passerar med hjälp av en Reed-switch. Denna Pinoccio mäter tiden mellan magneterna och använder denna information till att beräkna ringens hastighet i varv per minut.
						 <br>
						<br>
						Sedan skickas hastigheten trådlöst via ett mesh-nätverk till en Pinoccio som sitter i kraftstolpen. Pinoccion i stolpen har en WiFi-modul och skickar via denna vidare informationen till en webbserver och styr även animationen som genereras i lamporna på stolpen. Ju högre hastighet ringen har, desto snabbare byter lamporna färg.
						<br>
						<br>
						Webbservern lyssnar konstant efter nya meddelanden och filtrerar dessa. De meddelanden som innehåller en hastighet skickas vidare till en annan Pinoccio med WiFi, som sitter i ett träd en bit bort. Denna enhet sprider sedan ut meddelandet, innehållandes hastigheten, via meshnätverket till alla andra enheter i trädet som sedan anpassar sina animationer därefter.



						<ul class="list-unstyled">
						  <h4>Flöde</h4>
						  
						    <ul>
						      <li>Ringen börjar snurra.</li>
						      <li>En Pinoccio mäter tiden mellan att magneterna passerar och beräknar en hastighet, som skickas trådlöst till andra Pinoccios i samma grupp. </li>
						      <li>De andra enheterna i gruppen anpassar sina animationer och enheten med WiFi skickar vidare informationen till en webbserver.</li>
						      <li>Webbservern filtrerar meddelanden och skickar det vidare till en annan Pinoccio som har WiFi</li>
						      <li>Den Pinoccion distribuerar vidare meddelandet till de andra enheterna i dennes grupp som anpassar sina animationer till hastigheten.</li>

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
						Ljus++ vill tacka.
					</h2>
					<p>

						Det är med stor upskattning, å alla medlemmar i Ljus++ vägnar, vi vill uttrycka vår tacksamhet för bidragen från dessa herrar som på grund av sina generösa insatset gör detta projekt möjligt.
						<br>
						<br>
						Tack prof. Peter Parnes för ert engagemang att förse gruppen inte bara med nödvändig hårdvara, utan även din kunskap, rådgivning och handledning i detta projekt.
						<br>
						<br>
						Tack Angel David Garcia Llamas för din hängivenhet och mycket uppskattade välvilja att hjälpa gruppen med hårdvarulösningar och kunskaper inom elektronik, särskilt kl 10 en lördagkväll:).
						<br>
						<br>
						Tack bitr. universitetslektor Johan Borg för ditt stöd i att förse gruppen med råd och nödvändig hårdvara under de mest obekväma timmarna på dygnet.

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
