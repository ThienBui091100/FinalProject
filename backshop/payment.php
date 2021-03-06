<?php
    include_once "db/connect.php";
if (session_id()==='') {session_start();}
if (isset($_SESSION["dangnhap_home"])) {
	$dangnhap_home = $_SESSION['dangnhap_home'];
}else{
	$dangnhap_home = "";
}
if (isset($_SESSION["khachhang_id"])) {
	$khachhang_id = $_SESSION['khachhang_id'];
}else{
	$khachhang_id = 0;
}

if(isset($_POST['capnhatsoluong'])){
	
    for($i=0;$i<count($_POST['product_id']);$i++){
        $sanpham_id = $_POST['product_id'][$i];
        $soluong = $_POST['soluong'][$i];
        $giasanpham = $_POST['giasanpham'][$i];
        $amount = $soluong * $giasanpham ;
        if($soluong<=0){
            $sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id' AND khachhang_id=$khachhang_id");
        }else{
            $sql_update = mysqli_query($con,"UPDATE tbl_giohang SET soluong='$soluong',amount=$amount WHERE sanpham_id='$sanpham_id' AND khachhang_id=$khachhang_id");
        }
    }
    header('Location:index.php?quanly=giohang');
}
if(isset($_POST['thanhtoandangnhap'])){
   $mahang = rand(0,9999);
   $tinhtrang=0;
   $huydon=0;
   $thanhtoan=0;
    for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $giasanpham = $_POST['thanhtoan_giasanpham'][$i];
            $amount = $soluong * $giasanpham ;
            $sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,soluong,mahang,khachhang_id,tinhtrang,huydon,amount,thanhtoan) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$tinhtrang','$huydon','$amount','$thanhtoan')");
            $sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id,tinhtrangdon,huydon,amount,thanhtoan) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$tinhtrang','$huydon','$amount','$thanhtoan')");
        }
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Payment</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Back Fashion by Group1 | Payment :: Group1"
	/>
	<link rel="shortcut icon" href="admin/giaodien/images/favicon.png" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	
	<!-- //web fonts -->

</head>

<body>
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
							<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
								<i class="fas fa-map-marker mr-2"></i>Select Location</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-truck mr-2"></i>Track Order</a>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0786 585 686
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Register </a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal(select-location) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>
				<i class="fas fa-map-marker"></i> Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>Tp.HCM</option>
					<option>H?? N???i</option>
					<option>C???n Th??</option>
					<option>Vinh</option>
					<option>C???n Th??</option>
					<option>V??nh Long</option>
				</optgroup>
				
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->

	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Log In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<a href="checkemail.php" style="font-size: 15px;">Forgotten Your Password</a>
					<form action="#" method="post">
						
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" class="form-control" placeholder=" " name="Name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="Password" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								Register Now</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Your Name</label>
							<input type="text" class="form-control" placeholder=" " name="Name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="Email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Confirm Password</label>
							<input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Register">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">

						<a href="index.php" class="font-weight-bold font-italic">
							<img src="image/logo2.png" alt=" " class="img-fluid">
						</a>
					
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="#" method="post">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" type="submit">Search</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="#" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option value="Pants">Pants</option>
							<option value="Shoes">Shoes</option>
							<option value="Shirt">Shirt</option>
							<option value="T-Shirt">T-Shirts</option>
							<option value="Sportswear">Sportswear</option>
							<option value="Hat">Hat</option>
							<option value="Socks">Socks</option>
							<option value="Ties">Ties</option>
							<option value="Cameras & Camcorders">Dresses</option>
							<option value="Home Audio & Theater">Handbag</option>
						</select>
					</form>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Shoes & Socks
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">Shoes & Socks</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product.html">Nike</a>
												</li>
												<li>
													<a href="product.html">Adidas</a>
												</li>
												<li>
													<a href="product.html">New Balance</a>
												</li>
												<li>
													<a href="product.html">ASICS</a>
												</li>
												<li>
													<a href="product.html">Puma</a>
												</li>
												<li>
													<a href="product.html">Skechers</a>
												</li>
												<li>
													<a href="product.html">Fila</a>
												</li>
												<li>
													<a href="product.html">Bata</a>
												</li>
												
											</ul>
										</div>
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product.html">Nike</a>
												</li>
												<li>
													<a href="product.html">Adidas</a>
												</li>
												<li>
													<a href="product.html">Marc</a>
												</li>
												<li>
													<a href="product.html">Bonjour</a>
												</li>
												<li>
													<a href="product.html">Puma</a>
												</li>
												<li>
													<a href="product.html">SuperSox</a>
												</li>
												<li>
													<a href="product.html">Jockey</a>
												</li>
												<li>
													<a href="product.html">Rebox</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Shirt & T-Shirt
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">Shirt & T-Shirt</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product2.html">Jack & Jones</a>
												</li>
												<li>
													<a href="product2.html">United Colors of Benetton</a>
												</li>
												<li>
													<a href="product2.html">Wrogn</a>
												</li>
												<li>
													<a href="product2.html">H&M</a>
												</li>
												<li>
													<a href="product2.html">Tommy Hilfiger</a>
												</li>
												<li>
													<a href="product2.html">Spykar</a>
												</li>
												<li>
													<a href="product2.html">Levis</a>
												</li>
												<li>
													<a href="product2.html">Zara</a>
												</li>
												
											</ul>
										</div>
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="product2.html">Arrow Shirts</a>
												</li>
												<li>
													<a href="product2.html">Peter England</a>
												</li>
												<li>
													<a href="product2.html">Van Heusen</a>
												</li>
												<li>
													<a href="product2.html">Zodiac</a>
												</li>
												<li>
													<a href="product2.html">Louis Phillipe</a>
												</li>
												<li>
													<a href="product2.html">John Players</a>
												</li>
												<li>
													<a href="product2.html">Park Avenue</a>
												</li>
												<li>
													<a href="product2.html">Parx</a>
												</li>
												
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="about.html">About Us</a>
						</li>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="product.html">New Arrivals</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="product.html">Shoes & Socks</a>
								<a class="dropdown-item" href="product2.html">Shirts & T-Shirts</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="checkout.html">Checkout Page</a>
								<a class="dropdown-item" href="payment.html">Payment Page</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->

	<!-- banner-2 -->
	<!-- <div class="page-head_agile_info_w3l"> -->

	<!-- </div> -->
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Payment Page</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- payment page-->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>P</span>ayment</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<ul class="resp-tabs-list hor_1">
						<li>Cash on delivery (COD)</li>
						<li>Credit/Debit</li>
						<li>Net Banking</li>
						<li>Paypal Account</li>
					</ul>
					<div class="resp-tabs-container hor_1">

						<div>
							<form action="thanhtoanthanhcong.php" method="post">
							<div class="vertical_post check_box_agile">
								<h5>COD</h5>
								<div class="checkbox">
									<div class="check_box_one cashon_delivery">
										<label class="anim">
											<input type="checkbox" class="checkbox">
											<span> We also accept Credit/Debit card on delivery. Please Check with the agent.</span>
										</label>
										<br>
									</div>
									<input type="submit" value="Payment at home" class="btn btn-success">
								</div>
							</div>
							</form>
						</div>
						<div>
							<form action="thanhtoanthanhcong.php" method="post" class="creditly-card-form agileinfo_form">
								<div class="creditly-wrapper wthree, w3_agileits_wrapper">
									<div class="credit-card-wrapper">
										<div class="first-row form-group">
											<div class="controls">
												<label class="control-label">Name on Card</label>
												<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
											</div>
											<div class="w3_agileits_card_number_grids my-3">
												<div class="w3_agileits_card_number_grid_left">
													<div class="controls">
														<label class="control-label">Card Number</label>
														<input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
														    autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
													</div>
												</div>
												<div class="w3_agileits_card_number_grid_right mt-2">
													<div class="controls">
														<label class="control-label">CVV</label>
														<input class="security-code form-control" ???? inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
													</div>
												</div>
												<div class="clear"> </div>
											</div>
											<div class="controls">
												<label class="control-label">Expiration Date</label>
												<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
											</div>
										</div>
										<button class="submit mt-3">
											<span>Make a payment </span>
										</button>
									</div>
								</div>
							</form>

						</div>
						<div>
							<div class="vertical_post">
								<form action="thanhtoanthanhcong.php" method="post">
									<h5>Select From Popular Banks</h5>
									<div class="swit-radio">
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio" checked="">
													<i></i>ACB</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>VietComBank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>MSB Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>CITI Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>Techcom Bank</label>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<h5>Or Select Other Bank</h5>
									<div class="section_room_pay">
										<select class="year">
											<option value="">=== Other Banks ===</option>
											<option value="PVB-NA">Viet Nam Public Bank</option>
											<option value="OCB-NA">Dong Phuong Bank</option>
											<option value="TPB-NA">Ngan Hang Tien Phong TPBank</option>
											<option value="AGRIBANK-NA">Vietnam Bank for Agriculture and Rural Development</option>
											<option value="Ocean Bank-NA">Ngan Hang Dai Duong</option>
											<option value="GPBANK-NA">Global Petro Bank</option>
											
										</select>
									</div>
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Name on Card</label>
											<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
										</div>
										<div class="w3_agileits_card_number_grids my-3">
											<div class="w3_agileits_card_number_grid_left">
												<div class="controls">
													<label class="control-label">Card Number</label>
													<input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
														autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
												</div>
											</div>
										</div>
										<div class="controls">
											<label class="control-label">Expiration Date</label>
											<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
										</div>
									</div>
									<input type="submit" value="PAY NOW">
								</form>
							</div>
						</div>
						<div>
							<div id="tab4" class="tab-grid" style="display: block;">
								<div class="row">
									<div class="col-md-6 pay-forms">
										<img class="pp-img" src="images/paypal.png" alt="Image Alternative text" title="Image Title">
										<p>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
										<a class="btn btn-primary">Checkout via Paypal</a>
									</div>
									<div class="col-md-6 number-paymk">
										<form action="thanhtoanthanhcong.php" method="post" class="creditly-card-form-2 shopf-sear-headinfo_form">
											<section class="creditly-wrapper payf_wrapper">
												<div class="credit-card-wrapper">
													<div class="first-row form-group">
														<div class="controls">
															<label class="control-label">Card Holder </label>
															<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
														</div>
														<div class="paymntf_card_number_grids my-2">
															<div class="fpay_card_number_grid_left">
																<div class="controls">
																	<label class="control-label">Card Number</label>
																	<input class="number credit-card-number-2 form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
																	    autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="???????????? ???????????? ???????????? ????????????">
																</div>
															</div>
															<div class="fpay_card_number_grid_right mt-2">
																<div class="controls">
																	<label class="control-label">CVV</label>
																	<input class="security-code-2 form-control" ????="" inputmode="numeric" type="text" name="security-code" placeholder="?????????">
																</div>
															</div>
															<div class="clear"> </div>
														</div>
														<div class="controls">
															<label class="control-label">Valid Thru</label>
															<input class="expiration-month-and-year-2 form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
														</div>
													</div>
													<input class="submit" type="submit" value="Proceed Payment">
												</div>
											</section>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Plug-in Initialisation-->
			</div>
		</div>
	</div>
	<!-- //payment page -->

	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>soft, smooth feet</h6>
								<h4 class="mt-2 mb-3">Nike</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="image/nike.jpg" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>T-Shirt</h6>
								<h4 class="mt-2 mb-3">Sportswear</h4>
								<p>Free shipping for order over 1,000,000 VND</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle section -->

	<!-- footer -->
	<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Fashion :</h2>
				<p class="footer-main mb-4">
					Back Fashion is a website specializing in selling fashion items of famous brands in the world. 
					We are constantly updating new products from suppliers. 
					In addition to the available models from famous fashion brands, besides, we also provide products that we design ourselves such as hats, ties???</p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Free Shipping</h3>
								<p>on orders over 1,000,000 VND</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Fast Delivery</h3>
								<p>World Wide</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Big Choice</h3>
								<p>of Products</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Categories</h3>
						<ul>
							<li class="mb-3">
								<a href="product.html">Shoes </a>
							</li>
							<li class="mb-3">
								<a href="product.html">Pants</a>
							</li>
							<li class="mb-3">
								<a href="product.html">Socks</a>
							</li>
							<li class="mb-3">
								<a href="product2.html">Hat</a>
							</li>
							<li class="mb-3">
								<a href="product.html">Handbag</a>
							</li>
							<li>
								<a href="product2.html">Shirts</a>
							</li>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
						<ul>
							<li class="mb-3">
								<a href="about.html">About Us</a>
							</li>
							<li class="mb-3">
								<a href="contact.html">Contact Us</a>
							</li>
							<li class="mb-3">
								<a href="help.html">Help</a>
							</li>
							<li class="mb-3">
								<a href="faqs.html">Faqs</a>
							</li>
							<li class="mb-3">
								<a href="terms.html">Terms of use</a>
							</li>
							<li>
								<a href="privacy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> 243 Hoang Dieu, VN</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> 0786 585 686 </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +28 321456 </li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:backfashion@gmail.com"> mail backfashion@gmail.com</a>
							</li>
							<li>
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:backfashionvn@gmail.com"> mail backfashionvn@gmail.com</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3">Newsletter</h3>
						<p class="mb-3">Free Delivery on your first order!</p>
						<form action="thanhtoanthanhcong.php" method="post">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
								<input type="submit" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="#">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a class="icon gp" href="#">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
		<!-- //footer third section -->

		<!-- footer fourth section -->
		<div class="agile-sometext py-md-5 py-sm-4 py-3">
			<div class="container">
				<!-- brands -->
				<div class="sub-some">
					<h5 class="font-weight-bold mb-2">T-Shirt</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Jack & Jones</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">United Colors of Benetton</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Wrogn</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">H&M</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Tommy Hilfiger</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2"> Spykar</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Levis</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Zara</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Sell Old</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Used Mobiles</a>
						</li>
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Shirts :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Arrow Shirts </a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Peter England</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Van Heusen</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Zodiac</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Louis Phillipe</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">John Players</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Park Avenue</a>
						</li>
						<li>
							<a href="product.html" class="border-right pr-2">Parx</a>
						</li>
						
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Pants :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Levi's</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Wrangler</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Diesel</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Lee Jeans</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Pepe Jeans</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">True Religion</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Calvin Klein</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Armani Jeans</a>
						</li>
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Hat :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Lock & Co. Hatters</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">New Era </a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Christys???</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Borsalino</a>
						</li>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">Brixton</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Goorin</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Akubra</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Stetson</a>
						</li>
						
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Tie :</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Eton Shirts</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">The Tie Bar</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Charles Tyrwhitt</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Brooks Brothers </a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Suitsupply</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Dapper Lapel</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Rampley & Co.</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Turnbull & Asser</a>
						</li>
						
					</ul>
				</div>
				<div class="sub-some mt-4">
					<h5 class="font-weight-bold mb-2">Sportwear</h5>
					<ul>
						<li class="m-sm-1">
							<a href="product.html" class="border-right pr-2">NIKE</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Adidas</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">Puma</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2"> UNDER ARMOUR</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">NEW BALANCE</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">LULULEMON ATHLETICA</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">COLUMBIA SPORTSWEAR</a>
						</li>
						<li class="m-sm-1">
							<a href="product2.html" class="border-right pr-2">ASICS</a>
						</li>
						
					</ul>
				</div>
				<!-- //brands -->
				<!-- payment -->
				<div class="sub-some child-momu mt-4">
					<h5 class="font-weight-bold mb-3">Payment Method</h5>
					<ul>
						<li>
							<img src="images/pay2.png" alt="">
						</li>
						<li>
							<img src="images/pay5.png" alt="">
						</li>
						<li>
							<img src="images/pay1.png" alt="">
						</li>
						<li>
							<img src="images/pay4.png" alt="">
						</li>
						<li>
							<img src="images/pay6.png" alt="">
						</li>
						<li>
							<img src="images/pay3.png" alt="">
						</li>
						<li>
							<img src="images/pay7.png" alt="">
						</li>
						<li>
							<img src="images/pay8.png" alt="">
						</li>
						<li>
							<img src="images/pay9.png" alt="">
						</li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
		</div>
		<!-- //footer fourth section (text) -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">?? 2021 Back Fashion by
				<a href="#"> Group1</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- easy-responsive-tabs -->
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>

	<script>
		$(document).ready(function () {
			//Horizontal Tab
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>
	<!-- //easy-responsive-tabs -->

	<!-- credit-card -->
	<script src="js/creditly.js"></script>
	<link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />
	<script>
		$(function () {
			var creditly = Creditly.initialize(
				'.creditly-wrapper .expiration-month-and-year',
				'.creditly-wrapper .credit-card-number',
				'.creditly-wrapper .security-code',
				'.creditly-wrapper .card-type');


			$(".creditly-card-form .submit").click(function (e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
					// Your validated credit card output
					console.log(output);
				}
			});
		});
	</script>

	<!-- creditly2 (for paypal) -->
	<script src="js/creditly2.js"></script>
	<script>
		$(function () {
			var creditly = Creditly2.initialize(
				'.creditly-wrapper .expiration-month-and-year-2',
				'.creditly-wrapper .credit-card-number-2',
				'.creditly-wrapper .security-code-2',
				'.creditly-wrapper .card-type');

			$(".creditly-card-form-2 .submit").click(function (e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
					// Your validated credit card output
					console.log(output);
				}
			});
		});
	</script>

	<!-- //credit-card -->


	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>