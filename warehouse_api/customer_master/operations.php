
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "wms_management_customer_master";

    // Columns
    public $id;
    public $customer_code;
    public $customer_name;
    public $address;
    // public $user_clockout_time;
    // public $user_current_date;
    // public $user_total_hours;
    // public $attendance_form;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, customer_code,customer_name, address  FROM  .$this->db_table " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        customer_code = :customer_code,
                        customer_name = :customer_name,
                        address = :address,
                        // user_clockout_time = :user_clockout_time,
                        // user_current_date = :user_current_date,
                        // user_total_hours = :user_total_hours,
                        // attendance_form = :attendance_form
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->customer_code=htmlspecialchars(strip_tags($this->customer_code));
        $this->customer_name=htmlspecialchars(strip_tags($this->customer_name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        // $this->user_clockout_time=htmlspecialchars(strip_tags($this->user_clockout_time));
        // $this->user_current_date=htmlspecialchars(strip_tags($this->user_current_date));
        // $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
  
   
        


        // bind data
        $stmt->bindParam(":customer_code", $this->customer_code);
        $stmt->bindParam(":customer_name", $this->customer_name);
        $stmt->bindParam(":address", $this->address);
        // $stmt->bindParam(":user_clockout_time", $this->user_clockout_time);
        // $stmt->bindParam(":user_current_date", $this->user_current_date);
        // $stmt->bindParam(":user_total_hours", $this->user_total_hours);
        // $stmt->bindParam(":attendance_form", $this->attendance_form);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, customer_code,customer_name, address  FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->customer_code = $dataRow['customer_code'];
        $this->customer_name = $dataRow['customer_name'];
        $this->address = $dataRow['address'];
        // $this->user_clockout_time = $dataRow['user_clockout_time'];
        // $this->user_current_date = $dataRow['user_current_date'];
        // $this->user_total_hours = $dataRow['user_total_hours'];
        // $this->attendance_form = $dataRow['attendance_form'];
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        customer_code = :customer_code,
                        customer_name = :customer_name,
                        address = :address,
                        // user_clockout_time = :user_clockout_time,
                        // user_current_date = :user_current_date,
                        // user_total_hours = :user_total_hours,
                        // attendance_form = :attendance_form
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->customer_code=htmlspecialchars(strip_tags($this->customer_code));
        $this->customer_name=htmlspecialchars(strip_tags($this->customer_name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        // $this->user_clockout_time=htmlspecialchars(strip_tags($this->user_clockout_time));
        // $this->user_current_date=htmlspecialchars(strip_tags($this->user_current_date));
        // $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":customer_code", $this->customer_code);
        $stmt->bindParam(":customer_name", $this->customer_name);
        $stmt->bindParam(":address", $this->address);
        // $stmt->bindParam(":user_clockout_time", $this->user_clockout_time);
        // $stmt->bindParam(":user_current_date", $this->user_current_date);
        // $stmt->bindParam(":user_total_hours", $this->user_total_hours);
        // $stmt->bindParam(":attendance_form", $this->attendance_form);

 
        

        if($stmt->execute()){
            return true;
        }
        return false;
    }


    // DELETE
    function deletetest(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

}
?>


