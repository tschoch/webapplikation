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

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
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
        <h2>Edit</h2>
        <p>Editiere dein Profil, sodass es deinen Wünschen entspricht</p>
      </div>
    </div>

    <div class="container">
        <?php
        require '../phplogin/dbconfig.php';
        $fuid = $_SESSION['FBID'];
        $result = mysql_query("select * from Users where Fuid='$fuid'");
        $row = mysql_fetch_array($result);
        $city = $row["City"]; 
        $nr = $row["Nr"];
        $offer_1 = $row["Offer_1"];
        $offer_2 = $row["Offer_2"];
        $offer_3 = $row["Offer_3"];
        $plz = $row["PLZ"]; 
        $street = $row["Street"]; 
        ?>
      <!-- Example row of columns -->
      <div class="row">
        <form class="form-horizontal" action="send_post.php" method="post">
        <div class="form-group col-xs-12">
				<form class="form-horizontal" role="form">
					<div class="form-group">
                        <p><?php echo $_SESSION['Ffname'];?></p>
					    <div class="col-xs-6">
							<label class="control-label col-sm-2" for="name">Name:</label>
							<div class="col-sm-10">
								<input  class="form-control" id="name" value="<?php echo $_SESSION['FULLNAME']; ?>" disabled>
							</div>
						</div>
						<div class="col-xs-6">
							<label class="control-label col-sm-2" for="offer1">Angebot:</label>
							<div class="col-sm-10">
								<input class="form-control" name="offer1" id="offer1" placeholder="Mein Angebot 1" value="<?php echo $offer_1; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
					    <div class="col-xs-6">
							<label class="control-label col-sm-2" for="email">E-Mail:</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" value="<?php echo $_SESSION['EMAIL']; ?>" disabled>
							</div>
						</div>    
						<div class="col-xs-6">
							<label class="control-label col-sm-2" for="offer2"></label>
							<div class="col-sm-10">
								<input class="form-control" name="offer2" id="offer2" placeholder="Mein Angebot 2" value="<?php echo $offer_2; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
					    <div class="col-xs-6">
							<label class="control-label col-sm-2" for="str">Strasse:</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="str" id="str" placeholder="Strasse" value="<?php echo $street; ?>" >
							</div>
						</div>
						<div class="col-xs-6">
							<label class="control-label col-sm-2" for="offer4"></label>
							<div class="col-sm-10">
								<input class="form-control" name="offer3" id="offer3" placeholder="Mein Angebot 3" value="<?php echo $offer_3; ?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
					    <div class="col-xs-6">
							<label class="control-label col-sm-2" for="strnr">Nr:</label>
							<div class="col-sm-10">
								<input class="form-control" name="nr" id="nr" placeholder="Strassennummer" value="<?php echo $nr; ?>" >
							</div>
						</div>
						<div class="col-xs-6">
							<label class="control-label col-sm-2" for="pic1">Bilder:</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" id="pic1" >
							</div>
						</div>
					</div>
					<div class="form-group">
					     <div class="col-xs-6">
							<label class="control-label col-sm-2" for="plz">PLZ:</label>
							<div class="col-sm-10">
								<input class="form-control" name="plz" id="plz" placeholder="PLZ" value="<?php echo $plz; ?>">
							</div>
						</div>
						<div class="col-xs-6">
							<label class="control-label col-sm-2" for="pic2"></label>
							<div class="col-sm-10">
								<input type="file" class="form-control" id="pic2" >
							</div>
						</div>
					</div>
					<div class="form-group">
					     <div class="col-xs-6">
							<label class="control-label col-sm-2" for="place">Ort:</label>
							<div class="col-sm-10">
								<input class="form-control" name="place" id="place" placeholder="Ort" value="<?php echo $city; ?>">
							</div>
						</div>
						<div class="col-xs-6">
							<label class="control-label col-sm-2" for="pic3"></label>
							<div class="col-sm-10">
								<input type="file" class="form-control" id="pic3" >
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-xs-12">
							<button class="btn btn-primary pull-right" type="submit">Submit</button>
						</div>
					</div>	
				</form>	
        </div>
        </form>
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
            <input type="image" style="height:40px;width:160px;" src="fb_button.png" onclick='location.href=" http://localhost/projekt_web/phplogin/fbconfig.php"'/>
        </div>
    <?php endif ?>  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
  </body>
</html>
