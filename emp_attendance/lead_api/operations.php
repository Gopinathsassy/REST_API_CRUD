
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_assign_lead";

    // Columns
    public $id;
    public $lead_name;
    public $module;
    public $username;
    public $lead_empid;
    // public $start_date;
    // public $end_date;
    // public $leave_apply_time;
    // public $status;
    // public $rejected_lead_name;



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id,lead_name,module,username,lead_empid FROM  . $this->db_table ORDER BY id DESC " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

  // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        lead_name = :lead_name,
                        module = :module,
                        username = :username,
                        lead_empid = :lead_empid
    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->lead_name=htmlspecialchars(strip_tags($this->lead_name));
        $this->module=htmlspecialchars(strip_tags($this->module));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->lead_empid=htmlspecialchars(strip_tags($this->lead_empid));
       
       
   
        


        // bind data
        $stmt->bindParam(":lead_name", $this->lead_name);
        $stmt->bindParam(":module", $this->module);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":lead_empid", $this->lead_empid);
      
      
        if($stmt->execute()){
            return true;
        }
        return false;
    }


    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, lead_name,module, username, lead_empid 
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->lead_name = $dataRow['lead_name'];
        $this->module = $dataRow['module'];
        $this->username = $dataRow['username'];
        $this->lead_empid = $dataRow['lead_empid'];
        // $this->start_date = $dataRow['start_date'];
        // $this->end_date = $dataRow['end_date'];
        // $this->leave_apply_time = $dataRow['leave_apply_time'];
        // $this->status = $dataRow['status'];
        // $this->rejected_lead_name = $dataRow['rejected_lead_name'];

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        lead_name = :lead_name,
                        module = :module,
                        username = :username,
                        lead_empid = :lead_empid
                        // start_date = :start_date,
                        // end_date = :end_date,
                        // leave_apply_time = :leave_apply_time,
                        // status = :status,
                        // rejected_lead_name = :rejected_lead_name
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->lead_name=htmlspecialchars(strip_tags($this->lead_name));
        $this->module=htmlspecialchars(strip_tags($this->module));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->lead_empid=htmlspecialchars(strip_tags($this->lead_empid));
        // $this->start_date=htmlspecialchars(strip_tags($this->start_date));
        // $this->end_date=htmlspecialchars(strip_tags($this->end_date));
        // $this->leave_apply_time=htmlspecialchars(strip_tags($this->leave_apply_time));
        // $this->status=htmlspecialchars(strip_tags($this->status));
        // $this->rejected_lead_name=htmlspecialchars(strip_tags($this->rejected_lead_name));
   
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":lead_name", $this->lead_name);
        $stmt->bindParam(":module", $this->module);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":lead_empid", $this->lead_empid);
        // $stmt->bindParam(":start_date", $this->start_date);
        // $stmt->bindParam(":end_date", $this->end_date);
        // $stmt->bindParam(":leave_apply_time", $this->leave_apply_time);
        // $stmt->bindParam(":status", $this->status);
        // $stmt->bindParam(":rejected_lead_name", $this->rejected_lead_name);
 
        

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


