
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" onclick='location.href="delete_cookie.php"'>Car Parts</a>
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