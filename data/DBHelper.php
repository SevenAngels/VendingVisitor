<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 4/8/2018
 * Time: 12:29 AM
 */

class DBHelper
{
    public $serverIP = "35.196.103.33";
    public $username = "root";
    public $password = "gAztYFbKbkyKT7qgvkHEdW4AHZj59zwW";
    public $dbname = "vendingdata";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->serverIP;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "DB connection successful";
        }
        catch (PDOException $e)
        {
            echo "DB connection failed";
        }
    }

    public function selectAllProducts()
    {
        $stmt = $this->conn->prepare("SELECT Name FROM ?");
        $stmt->bindParam(1, $tablename);

        $tablename = "Products";
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        foreach($result as $v) {
            echo $v;
        }
    }
}

$dbh = new DBHelper();
$dbh->selectAllProducts();