
<?php
require_once "Db.php";
class Expensecategory extends  Db{

   private $dbconn;
   public function __construct(){
    $this->dbconn = $this->connect();
   }

   public function insert_exp_cat($category_name){
      $sql= "INSERT INTO expensecategory(category_name) VALUES(?) ";
      $stmt=$this->dbconn->prepare($sql);
      $result= $stmt->execute([$category_name]);
      return $result;
      
     }
     
     public function display_expcat(){
      $sql = "SELECT * FROM expensecategory";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
     }

     public function display_active_expcat(){
      $sql = "SELECT * FROM expensecategory WHERE status = 'active' ";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
     }

     public function manage_expcat($category_id,$status){
      $new_status = ($status === 'active') ? 'inactive' : 'active';
      $sql = "Update expensecategory SET status = ? WHERE category_id =?";
      $stmt = $this->dbconn->prepare($sql);
      $result = $stmt->execute([$new_status,$category_id]);
      return $result;
      
      }

     public function addcategory($category_name,$category_id){
      $sql= "INSERT INTO expensecategory (category_name,category_id) VALUES(?,?)";
      $stmt=$this->dbconn->prepare($sql);
      $result=$stmt->execute([$category_name,$category_id]);
      return $result;
     }
     public function fetch_expcat_by_id($category_id) {
      $sql = "SELECT * FROM expensecategory WHERE category_id = ?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$category_id]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
   }

   public function update_expensecategory($category_name,$category_id){
      $sql = "UPDATE Expensecategory SET category_name=? WHERE category_id =?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$category_name,$category_id]);
      return true;
    }
}
?>
