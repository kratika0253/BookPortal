<?php
	$servername = "localhost";
    $username = "root";
	$password = "";
	$db="user";

	// Create connection
	$conn = new mysqli($servername, $username, $password , $db);

	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";


	$db = mysqli_select_db($conn,"user"); // Selecting Database from Server

	

	$sql = "SELECT * FROM books where category='".$_GET['category']."'";
	
	$book_result1 = mysqli_query($conn,$sql);
	
	?><!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Knowledge Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			
			<div class="upper-menu">
				<div class="container">
					<div class="row">

						<div class="col-md-2">
							<div id="colorlib-logo"><a href="index.html">Bibliotheca</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="active">
									<a href="courses.html">Books</a>
									
								</li>
								<li><a href="teachers.html">Audio Books</a></li>
								<li><a href="about.html">Magazines</a></li>
								<li><a href="event.html">About Us</a></li>
							
								<li><a href="contact.html">Contact</a></li>
							</ul>
							</ul>
								
      						 
						</div>
						
						


					</div>
				</div>
			</div>
		</nav>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		<div class="colorlib-search">
			<div class="container">
				<div class="row">
					<div class="col-md-12 search-wrap">
						<div class="search-wrap-2">
							<form method="post" class="colorlib-form">
			              	<div class="row">
			                <div class="col-md-9">
			                  <div class="form-group">
			                    <!-- <label for="search">Search Course</label> -->
			                    <div class="form-field">
			                      <input type="text" id="search" class="form-control" placeholder="Keyword search">
			                    </div>
			                  </div>
			                </div>
			                
			                
			                <div class="col-md-3">
			                  <input type="submit" name="submit" id="submit" value="Search course" class="btn btn-primary btn-block">
			                </div>
			              </div>
			            </form>
		            </div>
					</div>
				</div>
			</div>
		</div>
		
		

		<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big"><?php echo $_GET['category'] ?></h1>
						<h2><?php echo $_GET['category'] ?></h2>
					</div>
				</div>
				<div class="row">
						<div class="">
						
									<?php 
							$var = 0;
							while($row = mysqli_fetch_row($book_result1)){
								$var++;
							?>	
							<div class="item col-md-3 animate-box">
								<div class="classes">
									<div class="classes-img" style="background-image: url(<?php echo $row[2] ?>);">
									</div>
									<div class="wrap">
										<div class="desc">
											<span class="teacher"><?php echo $row[1]; ?></span>
											<h3><a href="courses-single.php?book=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a></h3>
										</div>
										
									</div>
								</div>
							</div>
							<?php if($var % 4 == 0) { ?> <div class="clearfix"></div> <?php } ?>
							<?php } ?>
						
					</div>
			
				</div>
			</div>	
		</div>
			<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">Categories</h1>
						<h2>Categories</h2>
					</div>
				</div>
				<div style="float:left; width: 20% ">
   				<h3><a href="categories.php?category=Career_&_Money">Career & Money</a></h3>
   				<ul>
   				<li>Entrepreneurship</li>
				<li>Money Management</li>
				<li>Website</li>
				<li>Time Management</li>
				<li>Leadership & mentoring</li>
   				</ul>
   				</div>
   				<div style="float:right; width: 20% ">
   				<h3><a href="categories.php?category=Personal_Growth">Personal growth</a></h3>
   				<ul>
				<li>Happiness</li>
				<li>Psychology</li>
				<li>Religion and Spirituality</li>
				<li>Self Improvement</li>
				</ul>
   				</div>
   				<div style="float:left; width: 20% ">
   				<h3><a href="categories.php?category=Science_&_Technology">Science & Technology</a></h3>
   				<ul>
				<li>Science</li>
				<li>Tech</li>
				</ul>
   				</div>
   				<div style="float:right; width: 20% ">
   				<h3><a href="categories.php?category=Lifestyle">Lifestyle</a></h3>
   				<ul>
				<li>Arts & Language</li>
				<li>Fashion & beauty</li>
				<li>Food & Wine</li>
				<li>Home & Garden</li>
				</ul>
   				</div>
   				<div style="float:right; width: 20% ">
   				<h3><a href="categories.php?category=Fiction">Fiction</a></h3>
   				<ul>
				<li>Classic Literature</li>
				<li>Contemporary Fiction</li>
				<li>Historical Fiction</li>
				<li>Romance</li>
				<li>Science Fiction & Fantasy</li>
				</ul>
   				</div>
   		    </div>
			</div>
		
		<div id="colorlib-subscribe" class="subs-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Subscribe Newsletter</h2>
						<p>Subscribe our newsletter and get latest update</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
							<div class="col-md-12">
							<form class="form-inline qbstp-header-subscribe">
								<div class="col-three-forth">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
									</div>
								</div>
								<div class="col-one-third">
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Subscribe Now</button>
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>Contact Info</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920"><i class="icon-phone"></i> + 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
							<li><a href="http://luxehotel.com"><i class="icon-location4"></i> yourwebsite.com</a></li>
						</ul>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Programs</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#"><i class="icon-check"></i> Diploma Degree</a></li>
								<li><a href="#"><i class="icon-check"></i> BS Degree</a></li>
								<li><a href="#"><i class="icon-check"></i> Beginner</a></li>
								<li><a href="#"><i class="icon-check"></i> Intermediate</a></li>
								<li><a href="#"><i class="icon-check"></i> Advance</a></li>
								<li><a href="#"><i class="icon-check"></i> Difficulty</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Useful Links</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#"><i class="icon-check"></i> About Us</a></li>
								<li><a href="#"><i class="icon-check"></i> Testimonials</a></li>
								<li><a href="#"><i class="icon-check"></i> Courses</a></li>
								<li><a href="#"><i class="icon-check"></i> Event</a></li>
								<li><a href="#"><i class="icon-check"></i> News</a></li>
								<li><a href="#"><i class="icon-check"></i> Contact</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-2 colorlib-widget">
						<h4>Support</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#"><i class="icon-check"></i> Documentation</a></li>
								<li><a href="#"><i class="icon-check"></i> Forums</a></li>
								<li><a href="#"><i class="icon-check"></i> Help &amp; Support</a></li>
								<li><a href="#"><i class="icon-check"></i> Scholarship</a></li>
								<li><a href="#"><i class="icon-check"></i> Student Transport</a></li>
								<li><a href="#"><i class="icon-check"></i> Release Status</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Recent Post</h4>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Creating Mobile Apps</a></h2>
								<p class="admin"><span>18 April 2018</span></p>
							</div>
						</div>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-2.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Creating Mobile Apps</a></h2>
								<p class="admin"><span>18 April 2018</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small><br> 
								<small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a>, <a href="http://pexels.com/" target="_blank">Pexels</a></small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

