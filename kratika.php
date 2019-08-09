session_start();
$errors = array();

if(isset($_POST['submit']) == "Login") {

    if(empty($_POST['username'])) { $errors[] = "Please enter Username! ";} 
    else { $username = mysql_real_escape_string($_POST['username']); }

    if(empty($_POST['password'])) { $errors[] = "Please enter Password! ";} 
    else { $password = mysql_real_escape_string($_POST['password']);}   

    if(empty($errors)) {
        $sql = mysql_query("SELECT * FROM users WHERE `username` = '".$username."' AND `password` = sha1('".$password."')");
         $row = mysql_fetch_assoc($sql);

        if($row) {  
            $_SESSION['user_login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['full_name'] = $row['full_name'];

            /*******************Send Email***************************/
            //Send user information to admin            
            $to = "xxx@XXX.com";
            $from = "XXX@xxx.com";

            //Get User Information
            $Full_Name = $row['full_name'];
            $Browser = $_SERVER['HTTP_USER_AGENT'];          
            $User_IP = $_SERVER['REMOTE_ADDR'];
            // If IP address exists
            // Get country (and City) via  api.hostip.info
            if (!empty($User_IP)) {
                $country=file_get_contents('http://api.hostip.info/get_html.php?ip='.$User_IP);
                list ($_country) = explode ("\n", $country);
                $_country = str_replace("Country: ", "", $_country);
            }                        

            $subject = $Full_Name. " logged in!";

            $message = '<html><body>';          
            $message .= '<table rules = "all" border="0" cellpadding="10">';
            $message .= "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
            $message .= "<tr style='background: #eee;'><td colspan='2'><strong>Dear Admin!</strong></td></tr>";
            $message .= "<tr><td colspan='2'>A User <strong>" .$Full_Name. "</strong> logged in with following information! </td></tr>";                
            $message .= "<tr><td width='30%'><strong>Name ID:</strong> </td><td>" . $Full_Name  . "</td></tr>";
            $message .= "<tr><td><strong>IP Address:</strong> </td><td>" . $User_IP  . "</td></tr>";
            $message .= "<tr><td><strong>Country:</strong> </td><td>" . $_country  . "</td></tr>";
            $message .= "<tr><td><strong>Browser:</strong> </td><td>" . $Browser  . "</td></tr>";                       
            $message .= "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
            $message .= "</table>";             
            $message .= "</body></html>";   
            $headers = "From: " . $from . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to, $subject, $message, $headers) or die("Error!");

            echo "<script>window.open('index.php','_self')</script>";

         } else {
            $errors[] = "Incorrect login, please try again!";
         }  
    }#Empty Errors

}#End Submit