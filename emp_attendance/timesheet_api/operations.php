
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_timesheet";

    // Columns
    public $id;
    public $username;
    public $emp_id;
    public $today_date;
    public $hours;
    public $image;
    public $job_name;
    public $task_name;
    public $posting_date;
    public $work_status;
    public $description;
    public $project_name;
    public $project_code;
    public $rejected_reason;
    public $status;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id,username,emp_id,today_date,hours,image,job_name,project_code,task_name,posting_date,work_status,description,project_name,rejected_reason,status  FROM " . $this->db_table  ;
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
                        today_date = :today_date,
                        hours = :hours,
                        image = :image,
                        job_name = :job_name,
                        task_name = :task_name,
                        posting_date = :posting_date,
                        work_status = :work_status,
                        description = :description,
                        project_name = :project_name,
                        project_code = :project_code,
                        rejected_reason = :rejected_reason,
                        status = :status
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->today_date=htmlspecialchars(strip_tags($this->today_date));
        $this->hours=htmlspecialchars(strip_tags($this->hours));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->job_name=htmlspecialchars(strip_tags($this->job_name));
        $this->task_name=htmlspecialchars(strip_tags($this->task_name));
        $this->posting_date=htmlspecialchars(strip_tags($this->posting_date));
        $this->work_status=htmlspecialchars(strip_tags($this->work_status));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->project_name=htmlspecialchars(strip_tags($this->project_name));
        $this->project_code=htmlspecialchars(strip_tags($this->project_code));
        $this->rejected_reason=htmlspecialchars(strip_tags($this->rejected_reason));
        $this->status=htmlspecialchars(strip_tags($this->status));
  
   
        


        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":today_date", $this->today_date);
        $stmt->bindParam(":hours", $this->hours);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":job_name", $this->job_name);
        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":posting_date", $this->posting_date);
        $stmt->bindParam(":work_status", $this->work_status);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":project_name", $this->project_name);
        $stmt->bindParam(":project_code", $this->project_code);
        $stmt->bindParam(":rejected_reason", $this->rejected_reason);
        $stmt->bindParam(":status", $this->status);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, username,emp_id, today_date, hours, image, job_name,project_code, task_name,posting_date,work_status,description,project_name,rejected_reason,status  FROM  ". $this->db_table ."
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
        $this->today_date = $dataRow['today_date'];
        $this->hours = $dataRow['hours'];
        $this->image = $dataRow['image'];
        $this->job_name = $dataRow['job_name'];
        $this->task_name = $dataRow['task_name'];
        $this->posting_date = $dataRow['posting_date'];
        $this->work_status = $dataRow['work_status'];
        $this->description = $dataRow['description'];
        $this->project_name = $dataRow['project_name'];
        $this->project_code = $dataRow['project_code'];
        $this->rejected_reason = $dataRow['rejected_reason'];
         $this->status = $dataRow['status'];

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        username = :username,
                        emp_id = :emp_id,
                        today_date = :today_date,
                        hours = :hours,
                        image = :image,
                        job_name = :job_name,
                        task_name = :task_name,
                        posting_date = :posting_date,
                        work_status = :work_status,
                        description = :description,
                        project_name = :project_name,
                        project_code = :project_code,
                        rejected_reason = :rejected_reason,
                        status = :status
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->today_date=htmlspecialchars(strip_tags($this->today_date));
        $this->hours=htmlspecialchars(strip_tags($this->hours));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->job_name=htmlspecialchars(strip_tags($this->job_name));
        $this->task_name=htmlspecialchars(strip_tags($this->task_name));
        $this->posting_date=htmlspecialchars(strip_tags($this->posting_date));
        $this->work_status=htmlspecialchars(strip_tags($this->work_status));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->project_name=htmlspecialchars(strip_tags($this->project_name));
          $this->project_code=htmlspecialchars(strip_tags($this->project_code));
        $this->rejected_reason=htmlspecialchars(strip_tags($this->rejected_reason));
        $this->status=htmlspecialchars(strip_tags($this->status));
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":today_date", $this->today_date);
        $stmt->bindParam(":hours", $this->hours);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":job_name", $this->job_name);
        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":posting_date", $this->posting_date);
        $stmt->bindParam(":work_status", $this->work_status);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":project_name", $this->project_name);
        $stmt->bindParam(":project_code", $this->project_code);    
        $stmt->bindParam(":rejected_reason", $this->rejected_reason);
        $stmt->bindParam(":status", $this->status);

 
        

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


