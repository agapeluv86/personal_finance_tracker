
<?php
require_once "Db.php";
class Savingsgoal extends  Db{

   private $dbconn;
   public function __construct(){
    $this->dbconn = $this->connect();
   }

   public function insertsavingsgoal($desc,$amount,$startdate,$enddate,$user){
    $sql= "INSERT INTO savingsgoal (description,amount,start_date,end_date,user_id) VALUES(?,?,?,?,?)";
    $stmt=$this->dbconn->prepare($sql);
    $result=$stmt->execute([$desc,$amount,$startdate,$enddate,$user]);
    return $result;
    
   }
  
   public function display_savings(){
      $sql = "SELECT savingsgoal.*,  user.email  FROM savingsgoal 
      INNER JOIN user ON  savingsgoal.user_id = user.user_id"; 
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
}
public function get_total_savingsgoal() {
   $sql = "SELECT SUM(amount) as total_savingsgoal FROM savingsgoal";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result['total_savingsgoal'];
}

public function get_total_savingsgoal_byuserid($user_id) {
   $sql = "SELECT SUM(amount) as total_savingsgoal FROM savingsgoal WHERE user_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$user_id]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result['total_savingsgoal'];
}

public function fetch_savingsgoal_by_id($savings_goal_id) {
   $sql = "SELECT * FROM savingsgoal WHERE savings_goal_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$savings_goal_id]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}



 public function update_savings($desc,$amount,$startdate,$enddate,$savings_goal_id){
   $sql = "UPDATE savingsgoal SET description=?,amount=?,start_date=?,end_date=? WHERE savings_goal_id=?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$desc,$amount,$startdate,$enddate,$savings_goal_id]);
   return true;
 }

 public function fetch_savings_by_user_id($user_id){
   $sql = "SELECT savingsgoal.*,  user.email  FROM savingsgoal 
   INNER JOIN user ON  savingsgoal.user_id = user.user_id WHERE savingsgoal.user_id = ?"; 
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$user_id]);
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

 public function delete_savingsgoal($id){
   $sql = "DELETE FROM savingsgoal WHERE savings_goal_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $result = $stmt->execute([$id]);
   return $result;
}

}
?>
