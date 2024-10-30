<?php
require_once "Db.php";
class Admin extends Db{

    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }
   
    public function get_admin_id($id){
       
            $query = "SELECT * FROM admin WHERE admin_id=?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }


    

    // public function register($username,$password)
    //     {
    //         // sql
    //         $sql = "INSERT INTO admin (admin_username,admin_pass) VALUES(?,?)";
    //         // prepare
    //         $stmt = $this->dbconn->prepare($sql);
    //         // execute
    //         // $hashed = password_hash($password,PASSWORD_DEFAULT);
    //         $stmt->execute([$username,$password]);
    //         $id = $this->dbconn->lastInsertId();
    //         return $id;

    //     }

       
    public function login($username, $password){
        $sql = "SELECT * FROM admin WHERE admin_username = ? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $pass = $result['admin_pass'];
     
        if($pass != $password){
            $_SESSION['errormsg'] = "Invalid password";

        }else{
            return $result['admin_id'];
        }

    }


    public function display_expense(){
        $sql = "SELECT * FROM admin";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
  }
    public function signout(){
        unset($_SESSION['admin_id']);
        session_unset();
        session_destroy();
   }
}

?>