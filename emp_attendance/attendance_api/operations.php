
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_user_time_log";

    // Columns
    public $id;
    public $username;
    public $emp_id;
    public $user_clockin_time;
    public $user_clockout_time;
    public $user_current_date;
    public $user_total_hours;
    public $attendance_form;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, username,emp_id, user_clockin_time, user_clockout_time, user_current_date, user_total_hours, attendance_form  FROM  . $this->db_table ORDER BY id DESC " ;
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
                        user_clockin_time = :user_clockin_time,
                        user_clockout_time = :user_clockout_time,
                        user_current_date = :user_current_date,
                        user_total_hours = :user_total_hours,
                        attendance_form = :attendance_form
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->user_clockin_time=htmlspecialchars(strip_tags($this->user_clockin_time));
        $this->user_clockout_time=htmlspecialchars(strip_tags($this->user_clockout_time));
        $this->user_current_date=htmlspecialchars(strip_tags($this->user_current_date));
        $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
  
   
        


        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":user_clockin_time", $this->user_clockin_time);
        $stmt->bindParam(":user_clockout_time", $this->user_clockout_time);
        $stmt->bindParam(":user_current_date", $this->user_current_date);
        $stmt->bindParam(":user_total_hours", $this->user_total_hours);
        $stmt->bindParam(":attendance_form", $this->attendance_form);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, username,emp_id, user_clockin_time, user_clockout_time, user_current_date, user_total_hours, attendance_form 
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
        $this->user_clockin_time = $dataRow['user_clockin_time'];
        $this->user_clockout_time = $dataRow['user_clockout_time'];
        $this->user_current_date = $dataRow['user_current_date'];
        $this->user_total_hours = $dataRow['user_total_hours'];
        $this->attendance_form = $dataRow['attendance_form'];
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        username = :username,
                        emp_id = :emp_id,
                        user_clockin_time = :user_clockin_time,
                        user_clockout_time = :user_clockout_time,
                        user_current_date = :user_current_date,
                        user_total_hours = :user_total_hours,
                        attendance_form = :attendance_form
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->user_clockin_time=htmlspecialchars(strip_tags($this->user_clockin_time));
        $this->user_clockout_time=htmlspecialchars(strip_tags($this->user_clockout_time));
        $this->user_current_date=htmlspecialchars(strip_tags($this->user_current_date));
        $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":user_clockin_time", $this->user_clockin_time);
        $stmt->bindParam(":user_clockout_time", $this->user_clockout_time);
        $stmt->bindParam(":user_current_date", $this->user_current_date);
        $stmt->bindParam(":user_total_hours", $this->user_total_hours);
        $stmt->bindParam(":attendance_form", $this->attendance_form);

 
        

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


