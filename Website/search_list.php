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
            include 'main_paige/main_head.txt';
        ?> 
	</head>

	<body>
            <?php if ($_SESSION['FBID']){  
              include 'main_paige/main_1.txt';
            ?>  
        
                    <ul class="nav nav-pills">
						<li id="map_button"><a href="search_map.php">Map</a></li>
						<li id="list_button" class="active"><a href="search_list.php">Liste</a></li>
					</ul>
            <?php 
              include 'main_paige/main_2.txt';
            ?>  
				<div class="col-md-6" id="table_height">
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
                            foreach ($results as $row) {   
                             
                        ?> 
                            <tr class="table_row" id="<?php echo $rowcount?>" onclick="function()"  >
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
                            <td id="fid_list" style="display:none;" ><?php echo $row['Fuid']?></td> 
                            <td id="email_list" style="display:none;" ><?php echo $row['Femail']?></td>    
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
          include 'main_paige/main_3.txt';
        } ?>   

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>        
	</body>
</html>
