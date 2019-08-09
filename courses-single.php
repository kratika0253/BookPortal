
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


	$sql = "SELECT * FROM books where bookname='".$_GET['book']."'";
  	$book_result = mysqli_query($conn,$sql);
  	$row = mysqli_fetch_row($book_result);
	
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
		
	

	<div id="page">
	
			<nav class="colorlib-nav" role="navigation">
			<div class="upper-menu">
				<div class="container">
					<div class="row">

						<div class="col-md-4">
							<div id="colorlib-logo"><a href="index.php">Bibliotheca</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li ><a href="index.php">Home</a></li>
								<li class="active">
									<a href="courses.php">Books</a>
									
								</li>
								<li><a>Audio Books</a></li>
								<li><a>Magazines</a></li>
								
							
								<li><a href="contact.php">Contact Us</a></li>
								
								<li>
									<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
								</li>

								<li>
									<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;"> Login As Admin</button>
								</li>
								
							</ul>
							
								
      						 
						</div>


							<?php if(isset($_GET["message"]) && $_GET["message"] == "success") { ?>
							<div id="idmsg" class="modal" style="display: block">
								<form class="modal-content animate">
									<div class="imgcontainer">
      						 <span onclick="document.getElementById('idmsg').style.display='none'" class="close" title="Close Modal">&times;</span>
    
   							 </div>
   							 <div class="mycontainer">
									Hello
								</div>
								</form>
							</div>
						<?php } ?>
						<div class="text-right">
							<div id="id01" class="modal">
  
 							 <form class="modal-content animate" action="check.php" method="post">
    							<div class="imgcontainer">
      						 <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    
   							 </div>

    						<div class="mycontainer">
      						<label for="uname" style="float: left;"><b>Username or Email</b></label>
      						<input type="text" placeholder="Enter Username" name="uname" required size="30">

      						<label for="psw" style="float: left;"><b>Password</b></label>
      						
      						<input type="password" placeholder="Enter Password" name="psw" required size="8">
        
      						<button type="submit" name="submit" style="background-color: black">Login</button>
      						<label>
        					<input type="checkbox" checked="checked" name="remember"> Remember me
     				    	</label>
     				    	
   				 			</div>

  			  				<div class="mycontainer" style="background-color:#f1f1f1">
      
     		 				<button class="register" style="background-color:black; width:25%; color:white" onclick="document.getElementById('id03').style.display='block'; document.getElementById('id01').style.display='none'"><a href="#">Register</a></button>
     		 				<span class="psw"><a href="#">Forgot password?</a></span>
     		 				
							</div>
 		 					</form>
							 </div>

						<script>
// Get the modal
						var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
    					if (event.target == modal) {
        				modal.style.display = "none";
    					}
						}
						</script>

					</div>
					<div class="text-right">
							<div id="id03" class="modal">
  
 							 <form class="modal-content animate" action="insert.php" method="post">
    							<div class="imgcontainer">
      						 <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
    
   							 </div>

    						<div class="mycontainer">
      						<label for="uname" style="float: left;"><b>Username</b></label>
      						<input type="text" placeholder="Enter Username" name="uname" required size="30">

      						<label for="email" style="float: left;"><b>Email</b></label>
      						<input type="email" placeholder="Enter Email-ID" name="email" required size="50">

      						<label class="p" for="p1" style="float: left;">Preferred Categories:</label><br>
      						<br>
      						<input type="checkbox" name="p1[]" id="p2" value="Career_and_Money"> 

      						<label for="p2">Career and Money</label><br>
      						<input type="checkbox" name="p1[]" id="p3" value="Science_and_Technology"> 

      						<label for="p3" >Science and Technology</label><br>
      						<input type="checkbox" name="p1[]" id="p4" value="Fiction"> 

      						<label for="p4">Fiction</label><br>
      						<input type="checkbox" name="p1[]" id="p5" value="Lifestyle"> 

      						<label for="p5">Lifestyle</label><br>
      						<input type="checkbox" name="p1[]" id="p6" value="Personal_Growth"> 
      						<label for="p6">Personal Growth</label><br>

      						<label for="psw" style="float: left;"><b>Password</b></label>
      						
      						<input type="password" placeholder="Enter Password" name="psw" required size="8">
        
      						<button type="submit" name="submit" style="background-color: black">Register</button>
      						<label>
        					<input type="checkbox" checked="checked" name="remember"> Remember me
     				    	</label>
     				    	
   				 			</div>

  			  				

 		 					</form>
							 </div>

						<script>
// Get the modal
						var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
    					if (event.target == modal) {
        				modal.style.display = "none";
    					}
						}
						</script>

					</div>


					<div class="text-right">
						<div id='id02' class='modal'>
							<form class="modal-content animate" action="admincheck.php" method="post">
    							<div class="imgcontainer">
      						 <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    
   						</div>

   						<div class="mycontainer">
      						<label for="uname" style="float: left;"><b>Administrator Username</b></label>
      						<input type="text" placeholder="Enter Username" name="uname" required size="30">

      						<label for="psw" style="float: left;"><b>Password</b></label>
      						
      						<input type="password" placeholder="Enter Password" name="psw" required size="8">
        
      						<button type="submit" name="submit" style="background-color: black" href="index.php">Login</button>
      						<label>
        					<input type="checkbox" checked="checked" name="remember"> Remember me
     				    	</label>
     				    	
   				 			</div>

 		 					</form>



					</div>
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
		
		<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row row-pb-lg">
							<div class="col-md-12 animate-box">
								<div class="classes class-single">
									<div class="classes-img" style="background-image: url(<?php echo $row[2] ?>);">
									</div>
									<div class="desc desc2">
										<h3><a><?php echo $row[0] ?></a></h3>
										
										<blockquote>
											<?php echo $row[4] ?>
										</blockquote>
		
									
										<p><a href="<?php echo $row[3]; ?>" class="btn btn-primary btn-outline btn-lg">Live Preview</a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-pb-lg animate-box">
							<div class="col-md-12">
								<h2 class="colorlib-heading-2">23 Comments</h2>
								<div class="review">
						   		<div class="user-img" style="background-image: url(images/person1.jpg)"></div>
						   		<div class="desc">
						   			<h4>
						   				<span class="text-left">Jacob Webb</span>
						   				<span class="text-right">24 March 2018</span>
						   			</h4>
						   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
						   			<p class="star">
					   					<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
						   			</p>
						   		</div>
						   	</div>
						   	<div class="review">
						   		<div class="user-img" style="background-image: url(images/person2.jpg)"></div>
						   		<div class="desc">
						   			<h4>
						   				<span class="text-left">Jacob Webb</span>
						   				<span class="text-right">24 March 2018</span>
						   			</h4>
						   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
						   			<p class="star">
					   					<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
						   			</p>
						   		</div>
						   	</div>
						   	<div class="review">
						   		<div class="user-img" style="background-image: url(images/person3.jpg)"></div>
						   		<div class="desc">
						   			<h4>
						   				<span class="text-left">Jacob Webb</span>
						   				<span class="text-right">24 March 2018</span>
						   			</h4>
						   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
						   			<p class="star">
					   					<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
						   			</p>
						   		</div>
						   	</div>
							</div>
						</div>
				
						<div class="row animate-box">
							<div class="col-md-12">
								<h2 class="colorlib-heading-2">Say something</h2>
								<form action="#">
									<div class="row form-group">
										<div class="col-md-6">
											<!-- <label for="fname">First Name</label> -->
											<input type="text" id="fname" class="form-control" placeholder="Your firstname">
										</div>
										<div class="col-md-6">
											<!-- <label for="lname">Last Name</label> -->
											<input type="text" id="lname" class="form-control" placeholder="Your lastname">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="email">Email</label> -->
											<input type="text" id="email" class="form-control" placeholder="Your email address">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="subject">Subject</label> -->
											<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Post Comment" class="btn btn-primary">
									</div>
								</form>	
							</div>
						</div>
					</div>

					<!-- SIDEBAR: start -->
					<div class="col-md-4 animate-box">
						<div class="sidebar">
							<div class="side">
								<h3 class="sidebar-heading">Categories</h3>
								<div class="block-24">
				               <ul>
				                  <li><a>Career & Money</a></li>
				                  <li><a>Science & Technology</a></li>
				                  <li><a>Fiction</a></li>
				                  <li><a>Lifestyle</a></li>
				                  <li><a>Personal Growth</a></li>
				                  
				               </ul>
				            </div>
							</div>
						
						</div>
					</div>
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

