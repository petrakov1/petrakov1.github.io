<?php
session_start(); 
// Starting Session
$error=''; // Variable To Store Error Message
//if (isset($_POST['submit'])) {
//        echo "tet";

//echo "test";
if (empty($_POST['username']) || empty($_POST['password'])) {
echo "Username or Password is empty";
}
else
{

// Define $username and $password
$usernamel=$_POST['username'];
$passwordl=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
 include "../connect.php";
// To protect MySQL injection for Security purpose
$usernamel = stripslashes($usernamel);
$passwordl = stripslashes($passwordl);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);
//    echo "username:".$usernamel;
//    
//    echo $passwordl;
//// Selecting Database
//$db = mysql_select_db("f3studio", $connection);
//// SQL query to fetch information of registerd users and finds user match.
                $sql = "SELECT * FROM admins where email='$usernamel'";

//$query = mysql_query(", $connection);
//$rows = mysql_num_rows($query);
    $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        
            if (password_verify($passwordl, $row["hash"])) {
                $_SESSION['login_admin']=$usernamel; // Initializing Session
//    echo "OK";
//       header('Location: products.php');
//header('Location: ' . $_SERVER['HTTP_REFERER']);
//header("location: profile.php");
    // Success!
}
else {
    echo "Username or Password is invalid";

    // Invalid credentials
}
            
        
//if ($rows == 1) {
 // Redirecting To Other Page
} else {
echo "Username or Password is invalid";
}
                        $conn->close();

//mysql_close($connection); // Closing Connection
//}
}
?>