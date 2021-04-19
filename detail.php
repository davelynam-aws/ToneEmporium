<?php
session_start();

// include database connection
include('inc/dbconnect.inc.php' );
// include the header file
include('inc/newheader.php');
// include the Breadcrumbs file
//include('inc/dynamicBreadcrumbs.php');
// include the Login Form 
include('inc/inc_loginform.php');
// include Cart Display


//include('inc/category_nav.php');
?>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#addtocartlink').click(function() {

                var randNum = Math.floor(Math.random() * 1000000000);

                $.ajax({
                    url: "/mng/mng_cart.php?action=add&rand=" + randNum,
                    dataType: 'text',
                    type: 'POST',
                    data: 'productid=' + $('#addtocartlink').attr('alt'),

                    beforeSend: function() {
                    $('#cartload').html('Loading...');
                },
                complete: function() {
                    $('#cartload').html('');
                    cartDisplayUpdate();
                    updateHeaderCart()
                    updateCartNumber()
                },
                success: function(result) {

                    if (result === "Error") {
              
                        $('#login-modal').modal('show');
                    } else {

                        $('#headercart').html('').append(result);
                    }

                }
                });
                return false; //stops link clicking
            });

        });
        
        
function confirmChoice(productId) {
    response = confirm ("Are you sure you want to delete?");
    if(response==1){
        window.location="/mng/mng_content.php?action=delete&id="+productId; 
    } else{
        return false;
    }
}

    </script>
    <?php
//This gets the ID from the database and echos out the result. 
$id = $_GET['id'];
$result = mysqli_query( $dbconnect, "SELECT * FROM `product` WHERE `product_id`={$id}");

echo mysqli_error( $dbconnect );

?>

        <!--Loop through each row from results -->
        <?php while ( $row = mysqli_fetch_array( $result ) )  { ?>

        <?PHP
        // Get related specs for product.
        $specresult = mysqli_query( $dbconnect, "SELECT * FROM `specification` WHERE `specification_id`={$row['p_spec_id']}");

        ?>

    <!-- Page Content -->
        <div class="container">
		<!--
           <div class="cartdisplaydiv">
            </div>-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-4">
					<!--
                        <img class="card-img-top img-fluid" src="<?php echo $row['p_image_one'] ?>" alt="">
                        <div class="card-body">
						-->
						<h6>Home > Double Cutaways > Gibson Custom Shop 67 SG</h6>
                            <h3 class="card-title">
                                <?php echo $row['p_name']; ?>                        
                            </h3>
							<h3>
							       <?php echo $row['p_colour']; ?>
							</h3>

							<div id="primaryImage" class="col-md-4 retro-border">
								<a href="/detail.php?id=<?php echo $row['product_id'] ?>"><img class="card-img-top" style="width:100%; height:100%;" src="<?php echo $row['p_image_one'] ?>" alt=""></a>
							</div>

                            <h4>£
                                <?php echo $row['p_sale_price']; ?>
                            </h4>
                            <p class="card-text">
                                <?php echo $row['p_description'] ?>
                            </p>

                                                  
                        
                           


                    </div>

					 <?php
			// Loop through each row from results
			while ( $specrow = mysqli_fetch_array( $specresult ) ) {
				?>
                   <H3>Specification</H3>
                                               <p class="card-text">Body: 
                                    <?php echo $specrow['s_body'] ?>
                                </p>
                                          
                                               <p class="card-text">Neck: 
                                    <?php echo $specrow['s_neck'] ?>
                                </p>
                                          
                                               <p class="card-text">Neck Shape: 
                                    <?php echo $specrow['s_neck_shape'] ?>
                                </p>
                                          
                                               <p class="card-text">Fingerboard: 
                                    <?php echo $specrow['s_fingerboard'] ?>
                                </p>
                                          
                                               <p class="card-text">Scale: 
                                    <?php echo $specrow['s_scale'] ?>
                                </p>
                                          
                                               <p class="card-text">Radius: 
                                    <?php echo $specrow['s_radius'] ?>
                                </p>
                                          
                                               <p class="card-text">Frets: 
                                    <?php echo $specrow['s_frets'] ?>
                                </p>
                                          
                                               <p class="card-text">Nut: 
                                    <?php echo $specrow['s_nut'] ?>
                                </p>
                                                          <p class="card-text">Nut Width: 
                                    <?php echo $specrow['s_nut_width'] ?>
                                </p>
                                                          <p class="card-text">Pickups: 
                                    <?php echo $specrow['s_pickups'] ?>
                                </p>
                                                          <p class="card-text">Controls: 
                                    <?php echo $specrow['s_controls'] ?>
                                </p>
                                                              <p class="card-text">Bridge: 
                                    <?php echo $specrow['s_bridge'] ?>
                                </p>
                                       <p class="card-text">Tuners:                                                       <p class="card-text">Body Material: 
                                    <?php echo $specrow['s_tuners'] ?>
                                </p>
                                </span>
              	<?php }; ?>

                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col-lg-9 -->
            </div>
            
           

        <!-- /.container -->
        <?php }; ?>
        <!--Close the loop	-->
        <!--include the Footer File	-->
        <?php include( 'footer.php' );?>