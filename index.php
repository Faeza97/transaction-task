<?php  
session_start();  
include('configuration/dbconfig.php');

//login code
$sql = 'SELECT *  FROM transaction';
$q = $dbconnection->conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);

if(isset($_SESSION["username"]))  
 {   //<script>alert("Successfully logined")</script>
    echo '<div class="container">
    <h3>  Welcome - '.$_SESSION["username"].'</h3>
    <a href="logout.php"><button type="button" class="btn btn-warning" style="float: right;">LOGOUT</button></a>
    </div>';
 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Admin Panel</h2>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Comment</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $q->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']) ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo htmlspecialchars($row['amount']); ?></td>
                    <td><?php echo htmlspecialchars($row['comment']); ?></td>
                    <td>
                        <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit </a>
                        <a href="delete.php?delete=<?php echo $row['id']; ?>"
                            onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
</body>
</div>

</html>