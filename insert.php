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

	if(isset($_POST['submit'])){ 
		
		$p1=implode(',', $_POST['p1']);
		// print_r($p1);die;
		// print_r($_POST);die;
		
		$username = mysqli_real_escape_string($conn,$_POST['uname']);
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$password = mysqli_real_escape_string($conn,$_POST['psw']);

		// echo "insert into login(username,email,p1, password) values ('".$username."','".$email."','".$p1."','".crypt($password,'knowledge')."')";die;
		if($username !='' ||$email !='' ||$p1 !=''  ||$password !=''){

			$query = $conn->query("insert into login(username,email,p1, password) values ('".$username."','".$email."','".$p1."','".crypt($password,'knowledge')."')");
			// print_r($query);die;
			echo "<br/><br/><span>Data Inserted successfully...!!</span>";
			echo '<script>window.location.href = "index.php?message=success";</script>';
		}
		else{
			echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
		}
	}


?>