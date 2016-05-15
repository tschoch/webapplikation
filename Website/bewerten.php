<?php
session_start(); 
?>
<!DOCTYPE html>
<script>
if( localStorage.getItem('bewert_check') == 0){
 location.href="search_list.php";
    alert('Zuerst ein Anbieter anwählen');
    
}
</script>
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
        <script>localStorage.setItem('bewert_check',1); </script>
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
                <button type="button" class="btn btn-primary" onclick='location.href="search_list.php"'>Search</button>
				 <button type="button" class="btn btn-primary" onclick='location.href="../phplogin/logout.php"'>Logout</button>
				</div>
			  </form>
			</div><!--/.navbar-collapse -->
		  </div>
		</nav>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
		  <div class="container">
			<h2>Bewerten</h2>
			<p>Bewerte die Dienstelistung eines Anbieters</p>
		  </div>
		</div>
        
        <div class="container">  
            <div class="row">
                <form class="form-horizontal" action="send_post_bewertung.php" method="post">
                     <div class="form-group">
                    <input type="hidden" value="somhing" name="anbieter_bewert_h" id="anbieter_bewert_h" />
                    <input type="hidden" value="somhing" name="anbieter_id_bewert_h" id="anbieter_id_bewert_h" />     
                        <p id="anbieter_bewert">Anbieter-X</p>
                         <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown">Dienstleistung
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li ><a id="drdwn_o_1" href="#">Dienstleistung_1</a></li>
                            <li ><a id="drdwn_o_2" href="#">Dienstleistung_2</a></li>
                            <li ><a id="drdwn_o_3" href="#">Dienstleistung_3</a></li>
                          </ul>
                            <p id="bewert_fid" style="display:none;"></p> 
                        </div>
                        <input type="hidden" value="offer_bewert" name="offer_bewert" id="offer_bewert"/>     
                        <br>
                         <br> 
                        <input id="range" name="range" placeholder="1-5" type="text" >/5
                         
                         <p id="rate_check" >
                         <?php 
                         if ($_SESSION['rate_check'] == 1){  
                         echo"Bewertung muss zwischen 1 und 5 sein";
                         }
                         ?>
                        </p>     
                         <br>
                         <br>  
                        <button type="submit" class="btn btn-primary">bewerten</button>
                </form> 
            </div>    
        </div>     
             
             
             
		</div>
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
