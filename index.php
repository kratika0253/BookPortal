<?php
	session_start();
	$servername = "localhost";
    $username = "root";
	$password = "";
	$db="user";

	echo "Username: " . $_SESSION["username"];

	// Create connection
	$conn = new mysqli($servername, $username, $password , $db);

	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";


	$db = mysqli_select_db($conn,"user"); // Selecting Database from Server


	$sql = "SELECT * FROM books";
  	$book_result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($book_result);

  	$sql1 = "SELECT * FROM login";
  	$book_result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_row($book_result1);
	
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Knowledge Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
<style>
	#register
{
  float:right;
  background-color: black;
  width:25%;
  color:white;
}
</style>

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

						<div class="col-md-4">
							<div id="colorlib-logo"><a href="index.php">Bibliotheca</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li class="active"><a href="index.php">Home</a></li>
								<li>
									<a href="courses.php">Books</a>
									
								</li>
								<li><a>Audio Books</a></li>
								<li><a>Magazines</a></li>
								
							
								<li><a href="contact.php">Contact Us</a></li>
								
								<li>
									<?php 
									if(!isset($_SESSION["username"])){
									?>
									<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
								<?php } else { ?>
									<button onclick="clearSession();" style="width:auto;">Logout</button>

								<?php } ?>
								</li>

								<li>
									<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;"> Login As Admin</button>
								</li>
								
							</ul>
							
							<script type="text/javascript">
								function clearSession(){
									alert("A");
									<?php session_destroy(); ?>
									window.location.reload();
								}
							</script>
								
      						 
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

    						<!-- <div class="mycontainer">
      						<label for="uname" style="float: left;"><b>Username</b></label>
      						<input type="text" placeholder="Enter Username" name="uname" required size="30">

      						<label for="email" style="float: left;"><b>Email</b></label>
      						<input type="email" placeholder="Enter Email-ID" name="email" required size="50">

      						<label class="p" for="p1" style="float:left;">Preferred Categories:</label><br>
      						<br>
      						<input type="checkbox" name="p1[]" id="p2" value="Career_and_Money"> 

      						<label for="p2">Career and Money</label><br>
      						<input type="checkbox" name="p1[]" id="p3" value="Science_and_Technology" > 

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
 -->
  			  				<div class="mycontainer">

      						<!-- <div> 
      						<label style="float: left;" for="email"><b>Email</b></label>
							</div>
      						<input type="email" placeholder="Enter Email-ID" name="email" required size="30">
 -->
  			  				<div>	
      						<label style="float: left;" for="uname" ><b>Username</b></label>
							</div>
      						<input type="text" placeholder="Enter Username" name="uname" required size="30">
      						
  			  				<div>	
      						<label style="float: left;" for="email" ><b>Email</b></label>
							</div>
      						<input type="text" placeholder="Enter Email" name="email" required size="30">
      						
							<div>
      						<label  style="float: left;" for="psw"><b>Password</b></label>
        					</div>
      						<input type="password" placeholder="Enter Password" name="psw" required size="8">
        					
      						<div style="float: left;">
      						<label for="p1">Preferred Categories:</label><br>
      						<br>


      						<input class="checkbox_input" style="margin-right: 32px;" type="checkbox" name="p1[]" id="p2" value="Career_and_Money"> 
      						<label for="p2">Career and Money</label><br>

      						<input class="checkbox_input" type="checkbox" name="p1[]" id="p3" value="Science_and_Technology" >
      						<label for="p3" >Science and Technology</label> <br>

      						<input class="checkbox_input" type="checkbox" name="p1[]" id="p4" value="Fiction">
      						<label for="p4">Fiction</label> <br>


      						<input class="checkbox_input" type="checkbox" name="p1[]" id="p5" value="Lifestyle">
      						<label for="p5">Lifestyle</label> <br>

      						<input class="checkbox_input" type="checkbox" name="p1[]" id="p6" value="Personal_Growth">
      						<label for="p6">Personal Growth</label> <br>


      						</div>


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
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h2>Live in your own world</h2>
					   					<h1>Read in ours</h1>
					   					
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						<h2>Let thoughts navigate the pristine texts</h2>
					   					<h1>Defying all routines</h1>
					   					
					   				</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						
					   					<h2>Face no disappointment with best reads.</h2>
					   					
					   				</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 col-md-pull-1 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
				   						
					   					<h2>Thoughts persist,</h2>
					   					<h1>Words cease to exist</h1>
					   					
					   				</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	
			  	</ul>
		  	</div>
		</aside>

		
		
		<div id="colorlib-services">
			<div class="container">
				<div class="row">
					<div class="col-md-12 services-wrap">
						<div class="row">
							<div class="col-md-4 col-sm-6 text-center animate-box">
								<a href="services.html" class="services">
									<span class="icon">
										<i class="flaticon-paper"></i>
									</span>
									<div class="desc">
										<h3>Books</h3>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-sm-6 text-center animate-box">
								<a href="services.html" class="services">
									<span class="icon">
										<i class="flaticon-"></i>
									</span>
									<div class="desc">
										<h3>Audiobooks</h3>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-sm-6 text-center animate-box">
								<a href="services.html" class="services">
									<span class="icon">
										<i class="flaticon-"></i>
									</span>
									<div class="desc">
										<h3>Magazines</h3>
									</div>
								</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="colorlib-classes">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">Popular Reads</h1>
						<h2>Popular Reads</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel">
							<?php 
							while($row = mysqli_fetch_row($book_result)){
							?>	
							<div class="item">
								<div class="classes">
									<div class="classes-img" style="background-image: url(<?php echo $row[2] ?>);">
									</div>
									<div class="wrap">
										<div class="desc">
											<span class="teacher">
												<?php echo $row[1]; ?></span>
											<h3><a href="courses-single.php?book=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a></h3>
										</div>
										
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div id="colorlib-counter" class="colorlib-counters">
			<div class="container">
				<div class="col-md-7">
					<div class="about-desc">
						<div class="about-img-1 animate-box" style="background-image: url(images/about-img-2.jpg);"></div>
						<div class="about-img-2 animate-box" style="background-image: url(images/about-img-1.jpg);"></div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12 colorlib-heading animate-box">
							<h1 class="heading-big">Who are we</h1>
							<h2>Who are we</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 animate-box">
							<p><strong>Even the all-powerful Pointing has no control about the blind texts</strong></p>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
						</div>
						<div class="col-md-6 col-sm-6 animate-box">
							<div class="counter-entry">
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="1539" data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label">Subscribers</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 animate-box">
							<div class="counter-entry">
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="3653" data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label">Regular Visitors</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 animate-box">
							<div class="counter-entry">
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="2300" data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label">Readers</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 animate-box">
							<div class="counter-entry">
								<div class="desc">
									<span class="colorlib-counter js-counter" data-from="0" data-to="200" data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label">Countries</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		
		

		<!-- <div class="colorlib-blog colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Recent News</h2>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 animate-box">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
								<p class="meta"><span class="day">18</span><span class="month">Apr</span></p>
							</a>
							<div class="desc">
								<h2><a href="blog.html">Creating Mobile Apps</a></h2>
								<p class="admin"><span>Posted by:</span> <span>James Smith</span></p>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
							</div>
						</article>
					</div>
					<div class="col-md-6">
						<div class="f-blog animate-box">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">How to Create Website in Scratch</a></h2>
								<p class="admin"><span>04 March 2018</span></p>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</div>
						<div class="f-blog animate-box">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-2.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">How to Convert PSD File to HTML File?</a></h2>
								<p class="admin"><span>04 March 2018</span></p>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</div>
						<div class="f-blog animate-box">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-3.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">How to Build Games App in Mobile</a></h2>
								<p class="admin"><span>04 March 2018</span></p>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

	
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
				<div class="row row-pb-md" align="center">
					<div class="col-md-4 colorlib-widget">
						<h4>Contact Info</h4>
						
					</div>
					<div class="col-md-4 colorlib-widget">
						<h4>About Us</h4>
					
					</div>
					<div class="col-md-4 colorlib-widget">
						<h4>Help</h4>
						
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

