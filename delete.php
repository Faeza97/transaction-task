<?php
session_start();  
include('configuration/dbconfig.php');
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
$stmt= $dbconnection->conn->prepare("DELETE FROM transaction WHERE id=:id");
$stmt->bindParam(":id",$id,PDO::PARAM_INT);
$stmt->execute();
$_SESSION['message'] = "deleted!";  
header("Location:index.php");
}
?>