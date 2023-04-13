
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "wms_management_vendor_master";

    // Columns
    public $id;
    public $vendor_code;
    public $vendor_name;
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
        $sqlQuery = "SELECT id, vendor_code,vendor_name, address  FROM  .$this->db_table " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        vendor_code = :vendor_code,
                        vendor_name = :vendor_name,
                        address = :address,
                        // user_clockout_time = :user_clockout_time,
                        // user_current_date = :user_current_date,
                        // user_total_hours = :user_total_hours,
                        // attendance_form = :attendance_form
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->vendor_code=htmlspecialchars(strip_tags($this->vendor_code));
        $this->vendor_name=htmlspecialchars(strip_tags($this->vendor_name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        // $this->user_clockout_time=htmlspecialchars(strip_tags($this->user_clockout_time));
        // $this->user_current_date=htmlspecialchars(strip_tags($this->user_current_date));
        // $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
  
   
        


        // bind data
        $stmt->bindParam(":vendor_code", $this->vendor_code);
        $stmt->bindParam(":vendor_name", $this->vendor_name);
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
        $sqlQuery = "SELECT id, vendor_code,vendor_name, address  FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->vendor_code = $dataRow['vendor_code'];
        $this->vendor_name = $dataRow['vendor_name'];
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
                        vendor_code = :vendor_code,
                        vendor_name = :vendor_name,
                        address = :address,
                        // user_clockout_time = :user_clockout_time,
                        // user_current_date = :user_current_date,
                        // user_total_hours = :user_total_hours,
                        // attendance_form = :attendance_form
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->vendor_code=htmlspecialchars(strip_tags($this->vendor_code));
        $this->vendor_name=htmlspecialchars(strip_tags($this->vendor_name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        // $this->user_clockout_time=htmlspecialchars(strip_tags($this->user_clockout_time));
        // $this->user_current_date=htmlspecialchars(strip_tags($this->user_current_date));
        // $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":vendor_code", $this->vendor_code);
        $stmt->bindParam(":vendor_name", $this->vendor_name);
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


