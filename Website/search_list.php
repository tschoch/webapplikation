<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Car Parts</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

	    <script>
			function initMap() {
			  var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 7,
				center: {lat: 46.8209, lng: 8.4078}
			  });
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAG3EVkm45lkKfYQwQ3c471LzIm1Ifzj4&signed_in=true&callback=initMap"
        async defer></script>
		<style>
			#map {
				width: 560px;
				height: 400px;
			}
				.rating {
		  unicode-bidi: bidi-override;
		  direction: rtl;
		  text-align: left;
		}
		.rating > span {
		  display: inline-block;
		  position: relative;
		  width: 1.1em;
		}
		.rating > span:hover,
		.rating > span:hover ~ span {
		  color: transparent;
		}
		.rating > span:hover:before,
		.rating > span:hover ~ span:before {
		   content: "\2605";
		   position: absolute;
		   left: 0;
		   color: gold;
		}
		</style>
		  
	</head>

	<body>
        <?php if ($_SESSION['FBID']): ?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="search_list.php">Car Parts</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  <form class="navbar-form navbar-right">
				<div class="form-group">
				 <button type="submit" class="btn btn-primary"><a href="edit.html" style="color: white">Edit</a></button>
				 <button type="submit" class="btn btn-primary"><a href="../phplogin/logout.php" style="color: white">Logout</a></button>
				</div>
			  </form>
			</div><!--/.navbar-collapse -->
		  </div>
		</nav>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
		  <div class="container">
			<h2>Suche</h2>
			<p>Suche nach einem Anbieter in deiner Umgebung</p>
		  </div>
		</div>

		<div class="container">
		  <!-- Example row of columns -->
		  <div class="row">
			<div class="col-md-12">
				<form class="form-horizontal">
			<div class="form-group">
				  <div class="col-xs-4">
					  <input class="form-control" id="search" name="search" placeholder="Suchbegriff" required="" type="text">
				  </div>
				  <div class="col-xs-4">
					  <input class="form-control" id="place" name="place" placeholder="Ort" required="" type="text">
				  </div>
				  <div class="col-xs-4">
					  <input class="form-control" id="range" name="range" placeholder="Umkreis in km" required="" type="text">
				  </div>
			  </div>
			  <div class="form-group">
				  <div class="col-xs-12">
					<button class="btn btn-primary pull-right">Suche</button>
				  </div>
			  </div>	
		  </form>
			</div>
		  </div>
		<hr>
			<div class="row"> 
				 <div class="form-group">
				  <div class="right col-xs-12">
					<ul class="nav nav-pills">
						<li><a href="search_map.html">Map</a></li>
						<li class="active"><a href="search_list.html">Liste</a></li>

					</ul>
				  </div>
				</div>	
			</div>	
			
			<hr>	
			
			<div class="row"> 
				<div class="col-md-6 well">
					<div class="col-md-6">
						<h2>Anbieter 1</h2>
						<p>9320 Arbon</p>
						<br>
						<p>spezialisiert auf innenausbau</p>
						<div class="rating">
							<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
						</div>
					</div>
					
					<div class="col-md-6">
						<br>
						<br>
						<br>
						<img src="bild1.jpg" style="width:100%"/>
					</div>
				</div>
				
				<div class="col-md-6">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>Name</th>
							<th>PLZ</th>
							<th>Ort</th>
							<th>Angebot</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>John</td>
							<td>John</td>
							<td>Doe</td>

							<td>John</td>
						</tr>
						<tr>
							<td>Mary</td>
							<td>Moe</td>
							<td>mary@example.com</td>
							<td>John</td>
						</tr>
						<tr>
							<td>July</td>
							<td>Dooley</td>
							<td>july@example.com</td>
							<td>John</td>
						</tr>
						<tr>
							<td>July</td>
							<td>John</td>
							<td>July</td>
							<td>July</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			

		<hr>
		  <footer>
			<p>&copy; 2016 Schoch/Mosberger</p>
		  </footer>
		</div> <!-- /container -->


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
		    <?php else: ?>   
       <!-- Before login --> 
        <div class="container">
            <h1>Login with Facebook</h1>
           Not Connected
            <div>
                <a href=" http://localhost/projekt_web/phplogin/fbconfig.php">Login with Facebook</a>
            </div>
        </div>
        <?php endif ?>   
        
        
	</body>
</html>
