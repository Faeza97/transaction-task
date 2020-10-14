<?php
require_once('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Transaction data PHP </title>
</head>
<body>
<div>
  <?php
  if(isset($_POST['submit'])) {
  $name             = $_POST['name'];
  $email            = $_POST['email'];
  $mobile           = $_POST['mobile'];
  $address          = $_POST['address'];
  $amount           = $_POST['amount'];
  $comment          = $_POST['comment'];

  $sql = "INSERT INTO transaction (name , email , mobile , address , amount , comment) VALUES (?,?,?,?,?,?)";
  $stmtinsert = $db->prepare($sql);
  // $names = array($name , $email , $mobile , $address , $amount , $comment);
  // $result = $stmtinsert->execute($names);
  $result = $stmtinsert->execute([$name , $email , $mobile , $address , $amount , $comment]);
  if($result){
    echo "Successfully saved in the db";
  } else{
    echo "error while saving it in the db";
  }
  // echo $name , " " , $email , " " ,  $mobile , " " , $address , " " , $amount, " " , $comment;
 }
  ?>
</div>

  <div>
  <form action="transaction.php" method="post">
  <div class="container-fluid">
  <h1>Transaction Form</h1>
    <p>Please fill in this form to Pay</p>
    <hr>
    <label for="name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Your Name" name="name" id="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="mobileph"><b>Mobile Number</b></label>
    <input type="text" placeholder="Enter Mobile Number" name="mobile" id="mobile" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" id="address" required>
    
    <label for="amount"><b>Amount</b></label>
    <input type="number" placeholder="Amount" name="amount" id="amount" required>

    <label for="comment"><b>Comments</b></label>
    <textarea rows="7" cols="50" placeholder="Comments" name="comment" id="comment" ></textarea>

    <button type="submit" name="submit" class="submitbtn">Submit</button>
  </div>

  <!-- <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div> -->
  </form>
  </div>
</body>
</html>
