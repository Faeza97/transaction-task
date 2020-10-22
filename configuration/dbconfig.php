<?php 
class DbConnection{
    private $DATABASE_HOST = 'localhost';
    private $DATABASE_USER = 'root';
    private $DATABASE_PASS = '';
    private $DATABASE_NAME = 'fastpay-transaction';
    public $conn;

    public function __construct(){
        try {
            $this->conn = new PDO('mysql:host=' . $this->DATABASE_HOST . ';dbname=' . $this->DATABASE_NAME . ';charset=utf8', $this->DATABASE_USER, $this->DATABASE_PASS);
        } catch (PDOException $exception) {
            exit('Failed to connect to database!');
        }
    }
    
}
$dbconnection = new DbConnection();
?>