
<?php
require_once "Db.php";
class Incomecategory extends  Db{

   private $dbconn;
   public function __construct(){
    $this->dbconn = $this->connect();
   }

   public function insert_inc_cat($name){
      $sql= "INSERT INTO incomecategory(name) VALUES(?) ";
      $stmt=$this->dbconn->prepare($sql);
      $result= $stmt->execute([$name]);
      return $result;
      
     }
     
     public function display_inccat(){
      $sql = "SELECT * FROM incomecategory";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
     }

     public function display_active_inccat(){
      $sql = "SELECT * FROM incomecategory WHERE status = 'active' ";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
     }

     public function manage_inccat($category_id,$status){
      $new_status = ($status === 'active') ? 'inactive' : 'active';
      $sql = "Update incomecategory SET status = ? WHERE category_id =?";
      $stmt = $this->dbconn->prepare($sql);
      $result = $stmt->execute([$new_status,$category_id]);
      return $result;
      
      }

     public function addcategory($name,$category_id){
      $sql= "INSERT INTO incomecategory (name,category_id) VALUES(?,?)";
      $stmt=$this->dbconn->prepare($sql);
      $result=$stmt->execute([$name,$category_id]);
      return $result;
      
     }
     public function fetch_inccat_by_id($category_id) {
      $sql = "SELECT * FROM incomecategory WHERE category_id = ?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$category_id]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
   }

   public function update_incomecategory($name,$category_id){
      $sql = "UPDATE Incomecategory SET name =? WHERE category_id =?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$name,$category_id]);
      return true;
    }

    public function get_total_income_byuserid($user_id) {
      $sql = "SELECT SUM(amount) as total_income FROM income WHERE user_id = ?";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute([$user_id]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['total_income'];
   } 

    public function get_total_income(){
      $sql = "SELECT SUM(amount) as total_income FROM income";
      $stmt = $this->dbconn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['total_income'];
   }
}
?>
