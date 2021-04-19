<?php

// include database connection
include('dbconnect.inc.php');

// Search Element (Product or Category)
if (isset($_GET[ 'bathroom'] )) {
    $result = mysqli_query($dbconnect, "SELECT * FROM `product` WHERE `p_name` LIKE '%{$_GET['bathroom']}%' or `p_category` LIKE '%{$_GET['bathroom']}%'" );

} else if(isset($_GET['cat'])) {

    // Display the Category
    $result = mysqli_query($dbconnect, "SELECT * FROM `product` WHERE `p_category`='{$_GET['cat']}'");

} else {

    // Display All Products
    $result=mysqli_query($dbconnect,"SELECT * FROM `product`");
};

?>

<!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Tone Emporium | The Home Of Tone </title>
        <!-- Favicon -->
        <link rel="icon" type="icon/png" href="/images/Logo/favicon.png">

        <!--JQuery CSS-->
        <link rel="stylesheet" type="text/css" href="../js/jquery-ui.css" />

        <!-- JQuery -->
        <script src="/js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>

        <!-- Font Awsome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

        <!-- bootstrap -->
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-reboot.min.css">

        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Slick.js -->
        <link type="text/css" rel="stylesheet" href="/css/slick.css">
        <link type="text/css" rel="stylesheet" href="/css/slick-theme.css">
        <script src="/js/slick.min.js"></script>
        
        <!-- Overrides -->
        <link rel="stylesheet" type="text/css" href="/css/core.css">
        <script src="/js/core.js"></script>
    </head>

    <body>


		<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
			<div class="container">
				<div class="row col">
					<a href="../index.php" style="color: #fff"><i class="fas fa-shipping-fast"></i> Free Next Day Delivery</a>
				</div>
				<div >
					<a  href="../index.php" style="color: #fff; margin-right:5px;">News</a>
				</div>
				<div style="margin-left: 10px; margin-right: 10px;">
					|
				</div>
				<div >
					<a href="../index.php" style="color: #fff">Our Stores</a>
				</div>
				<div style="margin-left: 10px; margin-right: 10px;">
					|
				</div>
				<div >
					<a href="../index.php" style="color: #fff">Contact Us</a>
				</div>
				<div style="margin-left: 10px; margin-right: 10px;">
					|
				</div>
				<div >
					<a href="../index.php" style="color: #fff">01253 666 666</a>
				</div>
			</div>
	
<!--
			<div>
				<div class="flex-container">
					<a href="../index.php"><img style="width: 100%;height:100%;" src="../images/Logo/logowhitelong.png"/></a>
				</div>
			</div>
-->

		</nav>
