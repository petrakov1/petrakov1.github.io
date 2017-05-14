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

//header('Refresh:0, index.php'); // Redirecting To Home Page
}
else {
//    echo  $login_session." connected";
//    $status="connected";
header('Location: products.php'); // Redirecting To Home Page

}
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <!--    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
    <script src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="../css/fonts/stylesheet.css" rel="stylesheet">

    <script src="../js/jquery-2.1.4.min.js"></script>
    <!--[if lt IE 10]>
    <link rel="stylesheet" href="https://rawgit.com/codefucker/finalReject/master/reject/reject.css" media="all" />
    <script type="text/javascript" src="https://rawgit.com/codefucker/finalReject/master/reject/reject.min.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
      
       <div id="login">
           <form method="post" id="form"> 
               <h1>Вход</h1>
               <input type="text" name="username" placeholder="Логин">
               <input type="password" name="password" placeholder="Пароль">
               <input type="submit" name="submit" class="button-grey" value="войти" >
           </form>
           
       </div>
        <div id="powered">
            <p>Созданно с любовью людьми из PHINK</p>
        </div>

</body>
<script>
// $(function () {

        $('#form').on('submit', function (e) {
             e.preventDefault();
//        if($("#form").valid()){
         
            $.ajax({  
                url: "loginscript.php", 
                type: "post",
                data: $(this).serialize(),
                success: function(res){
                    if(res == "")
                    {
                          window.location.replace("products.php");  
                    }
                    else{
                    alert(res);  
                        
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
           alert(textStatus, errorThrown);
        }
            });  
      
//        }
        });

//      });
    </script>
</html>