
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_leave_apply";

    // Columns
    public $id;
    public $username;
    public $emp_id;
    public $reason;
    public $leave_days;
    public $start_date;
    public $end_date;
    public $lead_name;
    public $leave_apply_time;
    public $status;
    public $rejected_reason;



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id,username,emp_id,reason,leave_days,start_date,end_date,leave_apply_time,status,rejected_reason,lead_name  FROM  . $this->db_table ORDER BY id DESC " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

  // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        username = :username,
                        emp_id = :emp_id,
                        reason = :reason,
                        leave_days = :leave_days,
                        start_date = :start_date,
                        end_date = :end_date,
                        leave_apply_time = :leave_apply_time,
                        status = :status,
                        rejected_reason = :rejected_reason,
                        lead_name = :lead_name
    
    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->reason=htmlspecialchars(strip_tags($this->reason));
        $this->leave_days=htmlspecialchars(strip_tags($this->leave_days));
        $this->start_date=htmlspecialchars(strip_tags($this->start_date));
        $this->end_date=htmlspecialchars(strip_tags($this->end_date));
        $this->leave_apply_time=htmlspecialchars(strip_tags($this->leave_apply_time));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->rejected_reason=htmlspecialchars(strip_tags($this->rejected_reason));
         $this->lead_name=htmlspecialchars(strip_tags($this->lead_name));
   
        


        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":reason", $this->reason);
        $stmt->bindParam(":leave_days", $this->leave_days);
        $stmt->bindParam(":start_date", $this->start_date);
        $stmt->bindParam(":end_date", $this->end_date);
        $stmt->bindParam(":leave_apply_time", $this->leave_apply_time);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":rejected_reason", $this->rejected_reason);
        $stmt->bindParam(":lead_name", $this->lead_name);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }


    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, username,emp_id, reason, leave_days, start_date, end_date, leave_apply_time , status , rejected_reason,lead_name 
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
        $this->username = $dataRow['username'];
        $this->emp_id = $dataRow['emp_id'];
        $this->reason = $dataRow['reason'];
        $this->leave_days = $dataRow['leave_days'];
        $this->start_date = $dataRow['start_date'];
        $this->end_date = $dataRow['end_date'];
        $this->leave_apply_time = $dataRow['leave_apply_time'];
        $this->status = $dataRow['status'];
        $this->rejected_reason = $dataRow['rejected_reason'];
        $this->lead_name = $dataRow['lead_name'];
       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        username = :username,
                        emp_id = :emp_id,
                        reason = :reason,
                        leave_days = :leave_days,
                        start_date = :start_date,
                        end_date = :end_date,
                        leave_apply_time = :leave_apply_time,
                        status = :status,
                        rejected_reason = :rejected_reason,
                        lead_name = :lead_name
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->reason=htmlspecialchars(strip_tags($this->reason));
        $this->leave_days=htmlspecialchars(strip_tags($this->leave_days));
        $this->start_date=htmlspecialchars(strip_tags($this->start_date));
        $this->end_date=htmlspecialchars(strip_tags($this->end_date));
        $this->leave_apply_time=htmlspecialchars(strip_tags($this->leave_apply_time));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->rejected_reason=htmlspecialchars(strip_tags($this->rejected_reason));
        $this->lead_name=htmlspecialchars(strip_tags($this->lead_name));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":reason", $this->reason);
        $stmt->bindParam(":leave_days", $this->leave_days);
        $stmt->bindParam(":start_date", $this->start_date);
        $stmt->bindParam(":end_date", $this->end_date);
        $stmt->bindParam(":leave_apply_time", $this->leave_apply_time);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":rejected_reason", $this->rejected_reason);
        $stmt->bindParam(":lead_name", $this->lead_name);
        

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


