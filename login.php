<?php
session_start();
include('C:\xampp\htdocs\first-task\configuration\dbconfig.php');
if(isset($_POST["login"]))  
{  
     if(empty($_POST["username"]) || empty($_POST["password"]))  
     {  
          $message = '<label>All fields are required</label>';  
     }  
     else  
     {  
          $query = "SELECT * FROM userlogin WHERE username = :username AND password = :password";  
          $statement = $db->prepare($query);  
          $statement->execute(  
               array(  
                    'username'     =>     $_POST["username"],  
                    'password'     =>     $_POST["password"]  
               )  
          );  
          $count = $statement->rowCount();  
          if($count > 0)  
          {  
               $_SESSION["username"] = $_POST["username"];  
               header("location:login_success.php");  
          }  
          else  
          {  
               $message = '<label>Wrong Data</label>';            }  
     }  
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>Transaction data PHP </title>
</head>
<body>
  <div>
  <form action="login.php" method="post">
  <div class="container">
  <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
  <h1>User Login</h1>
    <hr>
    <label for="name"><b>Username</b></label>
    <input type="text" placeholder="Type Your Username" name="username" id="username" >
    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Type your Password" name="password" id="password" >
    <button type="submit" name="login" class="loginbtn">Login</button>
  </div>
  </form>
  </div>
</body>
</html>
