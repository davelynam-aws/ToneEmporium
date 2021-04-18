<?php


session_start();
// include database connection
include('inc/dbconnect.inc.php');
// include the header file
include('inc/header.php');
// include the Breadcrumbs file
//include('inc/dynamicBreadcrumbs.php');
// include the login Script
include('inc/inc_loginform.php');

include('inc/category_nav.php');

?>

<div class="container" align="center">
	<div class="header-slider">
		<div class="header-slider-image">
			<img class="d-block img-fluid" src="images/Global/Gibson Custom Shop 67 Hero.png" alt="Gibson Customer Shop 67">
		</div>
		<div class="header-slider-image">
			<img class="d-block img-fluid" src="images/Global/Fender 60s Strat Hero.png" alt="Fender American Original 60s Stratocaster">
		</div>
		<div class="header-slider-image">
			<img class="d-block img-fluid" src="images/Global/LSL Badbone Hero.png" alt="LSL Instruments Bad Bone">
		</div>			
	</div>
</div>
	
<?php


// Display All Products
//$general_result = mysqli_query( $dbconnect, "SELECT * FROM `product` ORDER BY RAND() LIMIT 3" );

$general_result = mysqli_query( $dbconnect, "SELECT * FROM `product` WHERE `p_category` != 'Accessories'" );

?>

		<!-- Display the product detail in the container -->
		<div class="container">
			<div class="search-container">
			
				<div class="card">
					<h5 class="card-header card text-white mb-3" style="background-color: #D76339;">Featured Products</h5>
					<div class="row pl-3 pr-3">
<?php
			// Loop through each row from results
			while ( $row = mysqli_fetch_array( $general_result ) ) {
				?>
						<div class="col-lg-4 col-md-6 mb-4">
							<div class="card h-100 border-primary mb-3">
                                
								<div class="image-container">
									<a href="/detail.php?id=<?php echo $row['product_id'] ?>"><img class="card-img-top" style="width:100%; height:100%;" src="<?php echo $row['p_image_thumb'] ?>" alt=""></a>
								</div>
								<div class="card-body" style="text-align: center;">
					
									<!--This if statement ensures the spacing of the card objects are aligned
										when the product name is less than or equal to 24 characters long, which
										would mean the product name does not span two rows.-->
							
													<h4 class="card-title">
										<a style="color:
												  #707070; font-size: 20px;
												 "href="/detail.php?id=<?php echo $row['product_id'] ?>">
											<?php echo $row['p_name']; ?>
										</a>
									</h4>
  
			
									
									
									 <p class="card-text">
										<?php echo $row['p_colour'] ?>
									</p>
									<button class="btn" style="background-color: #8A3617; color: #fff; width: 100%;" data="<?php echo $row['product_id'] ?>">
									ADD TO CART
									</button>
									
									<h4 class="text-success" style="margin-top: 20px;">
										In Stock
									</h4>
									
									<h1>£
										<?php echo $row['p_sale_price']; ?>
									</h1>
									
									<div class="row">
									<div class="card-text col-md-6" style="text-decoration: line-through;">
										RRP <?php echo  $row['p_rrp'] ?>
									</div>
									
									<div class="row text-success col-md-6">
										Save £<?php echo $row['p_rrp'] - $row['p_sale_price']; ?>
									</div>
				
									</div>
									
									
								
									<!--
									<h5>
										<?php echo $row['p_category']; ?>
									</h5>
									<p class="card-text">
										<?php echo $row['p_image_thumb']; ?>
									</p>
									-->
								
								</div>
								<div class="card-footer bg-transparent border-primary">
									<div class="btn btn-success quickAdd" data="<?php echo $row['product_id'] ?>">Add <i class="fa fa-shopping-basket"></i></div>
									<!--This is the see product button-->
									<a href="/detail.php?id=<?php echo $row['product_id'] ?>" class="btn btn-primary float-right">See Product</a>
								</div>
							</div>
						</div>
						<?php }; ?>
						<!--Close while loop-->
					</div>
				</div>
		
		
              



				<!--Close Container-->
			</div>
			<!--Close search-container-->
		</div>
		<!--Close Row-->
		<!-- include the Footer File -->
		<?php include( 'footer.php' );?>
