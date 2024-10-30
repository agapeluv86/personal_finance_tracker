<?php
error_reporting(E_ALL);
require_once "config.php";

class Db
{
private $dbname =DBNAME;
private $dbhost =DBHOST;
private $dbuser =DBUSER;
private $dbpass =DBPASS;
private $dbconnection;

protected $conn;
protected function connect(){
    {
        //connection code goes here
        $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname;";
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
        $this ->conn = new PDO($dsn, $this->dbuser, $this->dbpass, $option);
        return $this->conn;
    }catch(PDOException $e){
     //return $e->getMessage();
     return false;
    }
    }



}//end of insert_customer method

}
?>