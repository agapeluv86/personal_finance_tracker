<?php
    require "Db.php";

    class User extends Db
    {
        private $dbconn;
        public function __construct(){
            $this->dbconn = $this->connect();
        }
    
        public function get_user_byid($id){
            $query = "SELECT * FROM user WHERE user_id=?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }




      public function check_email($email){
            $query = "SELECT * FROM user WHERE email =?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$email]);
            $result = $stmt->rowCount();
            return $result;
        }

        public function register($fname,$lname,$email,$phone,$pass1){
            $sql = "INSERT INTO user (firstname,lastname,email,phone,password) VALUES(?,?,?,?,?)"; 
            $stmt = $this->dbconn->prepare($sql);
            $hashed = password_hash($pass1,PASSWORD_DEFAULT);
            $stmt->execute([$fname,$lname,$email,$phone,$hashed]);
            $id = $this->dbconn->lastInsertId();
            return $id;

        }

        public function login($email,$password){
            
            try{
                $sql = "SELECT * FROM user WHERE email=?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result){//the email exits, get the password from the db and verify with the $password with the one(coming from the form)
                    $hashed_password = $result['password'];
                    $check = password_verify($password,$hashed_password);
                    if($check){//the password is correct, return the id of the user that has just logged in
                        return $result['user_id'];
                    }else{//the password supplied is not same with the one in the db
                        $_SESSION['errormsg'] = "Invalid password";
                        return 0;
                    }
                }else{//the email does not exits
                    $_SESSION['errormsg'] = "Invalid email";
                    return 0;
                }  
            }
            catch(PDOException $e){
                $_SESSION['errormsg'] = $e->getMessage();
                return 0;
            }
            catch(Exception $e){
                $_SESSION['errormsg'] = $e->getMessage();
                return 0;
            }
        }
        public function signout(){
             unset($_SESSION['user_id']);
             session_unset();
             session_destroy();
        }


    }
      
    

?>