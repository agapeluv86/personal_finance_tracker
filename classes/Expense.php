
<?php
require_once "Db.php"; 
class Expense extends  Db{

   private $dbconn;
   public function __construct(){
    $this->dbconn = $this->connect();
   }

   public function insertexpense($desc,$amount,$date,$user,$category_id){
    $sql= "INSERT INTO expense (description,amount,date,user_id,category_id) VALUES(?,?,?,?,?)";
    $stmt=$this->dbconn->prepare($sql);
    $result=$stmt->execute([$desc,$amount,$date,$user,$category_id]);
    return $result;
    
   } 

   public function fetch_expenses_by_user_id($user_id) {
      $sql = "SELECT expense.* , 
			expensecategory.category_name  FROM expense
			INNER JOIN expensecategory ON expense.category_id = expensecategory.category_id
			WHERE expense.user_id = ?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$user_id]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
   }
  
   public function display_expense(){
      $sql = "SELECT * FROM expense";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
}



public function get_total_expense() {
   $sql = "SELECT SUM(amount) as total_expense FROM expense";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result['total_expense'];
}

public function get_total_expense_byuserid($user_id) {
   $sql = "SELECT SUM(amount) as total_expense FROM expense WHERE user_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$user_id]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result['total_expense'];
}

public function fetch_expense_by_id($expense_id) {
   $sql = "SELECT * FROM expense WHERE expense_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$expense_id]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}

 public function update_expense($description,$amount,$date,$user,$expense_id,$category_id){
   $sql = "UPDATE expense SET description=?,amount=?,date=?,user_id=?,category_id=? WHERE expense_id =?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$description,$amount,$date,$user,$category_id,$expense_id]);
   return true;
 }

 public function display_expense_admin(){
   $sql = "SELECT expense.*,  user.email, user.firstname, expensecategory.category_name
           FROM expense 
           INNER JOIN user ON expense.user_id = user.user_id
           INNER JOIN expensecategory ON expense.category_id = expensecategory.category_id";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

public function get_total_expense_by_date_range($user_id, $start_date, $end_date) {
   $sql = "SELECT SUM(amount) as total_expense FROM expense WHERE user_id = ? AND date BETWEEN ? AND ?";
   $stmt = $this->dbconn->prepare($sql);
   $stmt->execute([$user_id, $start_date, $end_date]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result['total_expense'];
}

public function delete_expense($id){
   $sql = "DELETE FROM expense WHERE expense_id = ?";
   $stmt = $this->dbconn->prepare($sql);
   $result = $stmt->execute([$id]);
   return $result;
}
 
}


?>
