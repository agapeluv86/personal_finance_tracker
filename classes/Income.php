
<?php
require_once "Db.php";
class Income extends  Db{

   private $dbconn;
   public function __construct(){
    $this->dbconn = $this->connect();
   }

   public function fetch_incomes_by_user_id($user_id) {
      $sql = "SELECT income.* , 
			incomecategory.name  FROM income
			INNER JOIN incomecategory ON income.category_id = incomecategory.category_id
			WHERE income.user_id = ?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$user_id]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
   }

   public function insertincome($desc,$amount,$date,$user,$category_id){
    $sql= "INSERT INTO income (description,amount,date,user_id,category_id) VALUES(?,?,?,?,?)";
    $stmt=$this->dbconn->prepare($sql);
    $result=$stmt->execute([$desc,$amount,$date,$user,$category_id]);
    return $result;
    
   }
  
   public function get_total_income_byuserid($user_id) {
      $sql = "SELECT SUM(amount) as total_income FROM income WHERE user_id = ?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$user_id]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['total_income'];
   }

   public function display_income(){
      $sql = "SELECT * FROM income";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
}

public function get_total_income() {
   $sql = "SELECT SUM(amount) as total_income FROM income";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result['total_income'];
}

public function fetch_income_by_id($income_id) {
   $sql = "SELECT * FROM income WHERE income_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$income_id]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}


public function update_income($description,$amount,$date,$user,$income_id,$category_id){
   $sql = "UPDATE income SET description=?,amount=?,date=?,user_id=?,category_id=? WHERE income_id =?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$description,$amount,$date,$user,$category_id,$income_id]);
   return true;
 }


 public function display_income_admin(){
   $sql = "SELECT income.*,  user.email, user.firstname, incomecategory.name
           FROM income 
           INNER JOIN user ON income.user_id = user.user_id
           INNER JOIN incomecategory ON income.category_id = incomecategory.category_id";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

public function get_total_income_by_date_range($user_id, $start_date, $end_date) {
   $sql = "SELECT SUM(amount) as total_income FROM income WHERE user_id = ? AND date BETWEEN ? AND ? ";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$user_id, $start_date, $end_date]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result['total_income'];
}

 public function delete_income($id){
   $sql = "DELETE FROM income WHERE income_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $result = $stmt->execute([$id]);
   return $result;
}

}
?>
