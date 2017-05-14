<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include "../connect.php";
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_admin'];
//    echo  $$user_check." connected";

// SQL Query To Fetch Complete Information Of User
$sql = "SELECT * FROM admins where email='$user_check'";
 $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $login_session =$row['email'];
            $client_fio = $row['title'];
        }
   $conn->close();
if(!isset($login_session)){
//   $conn->close();
//    echo "disconnected";

header('Refresh:0, index.php'); // Redirecting To Home Page
}
else {
//    echo  $login_session." connected";
//    $status="connected";
//header('Location: products.php'); // Redirecting To Home Page

}
?>   