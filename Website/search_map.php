<?php
session_start(); 
$_SESSION['rate_check'] = 0;
$_SESSION['rate_offer_check'] = 0; 
$_SESSION['date_check'] = 0;
$_SESSION['own_rate_check'] = 0;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php 
            include 'main_paige/main_head.php';
        ?> 
	</head>

	<body>
            <?php if ($_SESSION['FBID']){  
              include 'main_paige/main_1.php';
            ?>
                
                    <ul class="nav nav-pills">
						<li class="active" ><a href="search_map.php">Map</a></li>
						<li><a href="search_list.php">Liste</a></li>
					</ul>
            <?php 
              include 'main_paige/main_2.php';
            ?>

				<div class="col-md-6">
					 <div id="map"></div>
				</div>				
				<div class="col-md-6" style="display:none">
					<table class="table table-striped" id="hiddntble">
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
                            foreach ($results as $row) {    
                        ?> 
                            <tr class="table_row" id="<?php echo $rowcount?>" >
                            <td id="name_list" ><?php echo $row['Ffname']?></td>
                            <td id="plz_list" ><?php echo $row['PLZ']?></td>
                            <td id="ort_list" ><?php echo $row['City']?></td>
							<?php if(!empty($row['Offer_3'])){ ?>
								<td id="offer_list" ><?php echo $row['Offer_1']?>, <?php echo $row['Offer_2']?>, <?php echo $row['Offer_3']?></td> 
							<?php } elseif (!empty($row['Offer_2'])) { ?>
								<td id="offer_list" ><?php echo $row['Offer_1']?>, <?php echo $row['Offer_2']?></td> 
							<?php } else { ?>
								<td id="offer_list" ><?php echo $row['Offer_1']?></td> 
							<?php } ?>
                            <td id="fid_list" ><?php echo $row['Fuid']?></td>   
							<td id="lat" ><?php echo $row['lat']?></td>    
							<td id="lng" ><?php echo $row['lng']?></td> 
                            <td id="email_list"><?php echo $row['Femail']?></td>    
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
        <?php }else{    
            include 'main_paige/main_3.php';
        }?>   

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>        
	</body>
</html>
