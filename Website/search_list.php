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
        <link href="stylesheet.css" rel="stylesheet">
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	    <script src="script.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js key=AIzaSyDAG3EVkm45lkKfYQwQ3c471LzIm1Ifzj4&signed_in=true&callback=initMap" async defer></script>
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
				 <button type="button" class="btn btn-primary" onclick='location.href="edit.php"'>Edit</button>
				 <button type="button" class="btn btn-primary" onclick='location.href="../phplogin/logout.php"'>Logout</button>
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

        
         <?php
        require '../phplogin/dbconfig.php';
        require 'search.php';
        ?>
        
        
		<div class="container">
		  <!-- Example row of columns -->
		  <div class="row">
            <form class="form-horizontal" action="" method="post">
			<div class="col-md-12">
				<form class="form-horizontal">
			<div class="form-group">
				  <div class="col-xs-4">
					  <input class="form-control" id="search" name="search" placeholder="Suchbegriff"  type="text">
				  </div>
				  <div class="col-xs-4">
					  <input class="form-control" id="place" name="place" placeholder="Ort" type="text">
				  </div>
				  <div class="col-xs-4">
					  <input class="form-control" id="range" name="range" placeholder="Umkreis in km"  type="text">
				  </div>
			  </div>
			  <div class="form-group">
				  <div class="col-xs-12">
					<button type="submit" class="btn btn-primary pull-right">Suche</button>
				  </div>
			  </div>	
		  </form>
			</div>
            </form>    
		  </div>
		<hr>
			<div class="row"> 
				 <div class="form-group">
				  <div class="right col-xs-12">
					<ul class="nav nav-pills">
						<li><a href="search_map.php">Map</a></li>
						<li class="active"><a href="search_list.html">Liste</a></li>

					</ul>
				  </div>
				</div>	
			</div>	            
			<hr>	            
			<div class="row"> 
				<div class="col-md-6 well">
					<div class="col-md-6">
						<h2 id="anb_visit" >Anbieter </h2>
						<p id="ort_visit" >PLZ Ort</p>
						<br>
						<p id="offer_visit" >spezialisiert auf Angebot_1, Angebot2, Angebot_3</p>
						<div class="rating">
							<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
						</div>
					</div> 

					<div class="col-md-6">
						<br>
						<br>
						<br>
						<img id="pic" src="uploads/10_1" style="width:100%"/>  
                        <p id="img_label"></p>
					</div>
				</div>   
				<div class="col-md-6">
					<table class="table table-striped" id="tableId">
						<thead>
						<tr>
							<th>Name</th>
							<th>PLZ</th>
							<th>Ort</th>
							<th>Angebot</th>
						</tr>
						</thead>
						<tbody>
                            
                        <?php   
                            $rowcount = 1;
                            while($row = mysql_fetch_array($results)) {    
                        ?> 
                            <tr class="table_row" id="<?php echo $rowcount?>" onclick="function()"  >
                            <td id="name_list" ><?php echo $row['Ffname']?></td>
                            <td id="plz_list" ><?php echo $row['PLZ']?></td>
                            <td id="ort_list" ><?php echo $row['City']?></td>
                            <td id="offer_list" ><?php echo $row['Offer_1']?>, <?php echo $row['Offer_2']?>, <?php echo $row['Offer_3']?></td>
                            <td id="fid_list" style="display:none;" ><?php echo $row['Fuid']?></td>    
                            </tr> 
                        <?php
                            $rowcount++;
                            }
                        ?>
						</tbody>
					</table>
				</div>
			</div>
		<hr>
		  <footer>
			<p>&copy; 2016 Schoch/Mosberger</p>
		  </footer>
            
		</div> <!-- /container -->
        <?php else: ?>   
       <!-- Before login --> 
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand">Car Parts</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  <form class="navbar-form navbar-right">
				</div>
			  </form>
			</div><!--/.navbar-collapse -->
		  </div>
		</nav>
        
        <div class="jumbotron">
		  <div class="container" style="text-align: center">
            <br>  
			<h1>Willkommen bei CarParts</h1>
		  </div>
		</div>
        <div class="container" style="text-align: center">
            <h2>Not Connected</h2>
            <h2>Login with Facebook</h2>
            <br>
            <input type="image" style="height:40px;width:160px;" src="fb_button.png" onclick='location.href=" ../phplogin/fbconfig.php"'/>
        </div>
        <?php endif ?>   

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>        
	</body>
</html>
