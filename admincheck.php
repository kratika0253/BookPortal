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
        
        $username = mysqli_real_escape_string($conn,$_POST['uname']);
        $password = mysqli_real_escape_string($conn,$_POST['psw']);
    }

$sqll = "SELECT * FROM adminlogin WHERE username='".$username."'";
	$result= mysqli_query($conn,$sqll);
	$count=mysqli_num_rows($result);

	echo $count;
	if($count==1)
	{
    $row = mysqli_fetch_assoc($result);
    
    // SALT is 'knowledge'
    // For encrypt password into different form

    if ($password== $row['password']){
        // session_register("username");
        // session_register("password"); 
        echo "Login Successful";
         echo '<script>window.location.href = "adminindex.php?message=success";</script>';
    }
    else {
        echo "Wrong Username or Password";
        return false;
    }
    }
else{
    echo "Wrong Username";
    return false;
}

?>
