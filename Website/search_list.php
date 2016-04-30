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
			<?php
                while($search = mysql_fetch_array($result)){
                $column_fid[] = $search['Fuid'];
                $column_city[] = $search['City'];
                $column_plz[] = $search['PLZ']; 
                $column_o_1[] = $search['Offer_1'];
                $column_o_2[] = $search['Offer_2'];
                $column_o_3[] = $search['Offer_2'];
                }
            
                $cloumn_counter = $_POST['cloumn_counter'];
                
                if (empty($cloumn_counter)){
                $cloumn_counter = 0;
                }
            
                $fid    =  $column_fid[$cloumn_counter];
                $ort    =  $column_city[$cloumn_counter];
                $plz    =  $column_plz[$cloumn_counter];
                $o_1    =  $column_o_1[$cloumn_counter];
                $o_2    =  $column_o_2[$cloumn_counter];
                $o_3    =  $column_o_3[$cloumn_counter];
            
                
                $pid = $fid;
                $filename = 'uploads/'.$fid.'_1';
                if (!file_exists ($filename)){
                    $pid = "12345";  
                }
                if (empty($fid)) {
                    $ort    =  "Stadt";
                    $plz    =  "PLZ";
                    $o_1    =  "Angebot_1";
                    $o_2    =  "Angebot_2";
                    $o_3    =  "Angebot_3";
                }
            ?>
			<div class="row"> 
				<div class="col-md-6 well">
					<div class="col-md-6">
						<h2>Anbieter <?php $cloumn_counter++; echo $cloumn_counter; ?></h2>
						<p><?php echo $plz; ?> <?php echo $ort; ?></p>
						<br>
						<p>spezialisiert auf <?php echo $o_1?>, <?php echo $o_2?>, <?php echo $o_3?></p>
						<div class="rating">
							<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
						</div>
					</div> 

                    
					<div class="col-md-6">
						<br>
						<br>
						<br>
						<img id="pic" src="uploads/<?php echo $pid; ?>_1" style="width:100%"/>
                        
                        <!--   slideshow  -->
                           <?php  
                            $pid = $fid;
                            $filename_2 = 'uploads/'.$fid.'_2';
                            $filename_3 = 'uploads/'.$fid.'_3';
                        
                            if (file_exists ($filename_2) && !file_exists ($filename_3)){ 
                                echo "Auf bild Klicken für mehr"
                            ?>
                            <script>
                            var pic = 1;      
                            $(document).ready(function(){
                                $("#pic").click(function(){ 
                                    pic++;
                                    if(pic>2){
                                        pic = 1;   
                                    }
                                    var pid = <?php echo json_encode($pid); ?>;
                                    var pfad = "uploads/"+pid +"_"+pic;
                                    $("#pic").attr('src',pfad);
                                });
                            });
                            </script>
                        
                            <?php }elseif(file_exists ($filename_2) && file_exists ($filename_3)){
                            echo "Auf bild Klicken für mehr"
                            ?>
                            <script>
                            var pic = 1;      
                            $(document).ready(function(){
                                $("#pic").click(function(){ 
                                    pic++;
                                    if(pic>3){
                                        pic = 1;   
                                    }
                                    var pid = <?php echo json_encode($pid); ?>;
                                    var pfad = "uploads/"+pid +"_"+pic;
                                    $("#pic").attr('src',pfad);
                                });
                            });
                            </script>

                        <?php } ?>
                        
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
                            $rowcount = 0;
                            while($row = mysql_fetch_array($results)) {
        
                        ?> 
                            <tr id="<?php echo $rowcount?>" onclick="function()" >
                            <td><?php echo $row['Ffname']?></td>
                            <td><?php echo $row['PLZ']?></td>
                            <td><?php echo $row['City']?></td>
                            <td><?php echo $row['Offer_1']?>, <?php echo $row['Offer_2']?>, <?php echo $row['Offer_3']?>,</td>
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
