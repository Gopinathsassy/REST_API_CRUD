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
    public $project_name;
    public $project_code;
    public $status;
    public $work_status;
    public $posting_date;
    public $task_name;
    public $hours;
    public $today_date;
    public $description;
    public $image;
    public $rejected_reason;
    public $leadname;



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, username, emp_id, project_name, project_code, status, work_status, posting_date, task_name, hours, today_date, description, image, rejected_reason, leadname  FROM  . $this->db_table ORDER BY id DESC"  ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    
    // GET DRAFT
     public function getdraft(){
        $sqlQuery = "SELECT id, username, emp_id, project_name, project_code, status, work_status, posting_date, task_name, hours, today_date, description, image, rejected_reason, leadname  FROM " . $this->db_table . " WHERE status = 'draft'"  ;
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
                        project_name = :project_name,
                        project_code = :project_code,
                        status = :status,
                        work_status = :work_status,
                        posting_date = :posting_date,
                        task_name = :task_name,
                        hours = :hours,
                        today_date = :today_date,
                        description = :description,
                        image = :image,
                        rejected_reason = :rejected_reason,
                        leadname = :leadname
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->project_name=htmlspecialchars(strip_tags($this->project_name));
        $this->project_code=htmlspecialchars(strip_tags($this->project_code));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->work_status=htmlspecialchars(strip_tags($this->work_status));
        $this->posting_date=htmlspecialchars(strip_tags($this->posting_date));
        $this->task_name=htmlspecialchars(strip_tags($this->task_name));
        $this->hours=htmlspecialchars(strip_tags($this->hours));
        $this->today_date=htmlspecialchars(strip_tags($this->today_date));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->rejected_reason=htmlspecialchars(strip_tags($this->rejected_reason));
        $this->leadname=htmlspecialchars(strip_tags($this->leadname));



        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":project_name", $this->project_name);
        $stmt->bindParam(":project_code", $this->project_code);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":work_status", $this->work_status);
        $stmt->bindParam(":posting_date", $this->posting_date);
        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":hours", $this->hours);
        $stmt->bindParam(":today_date", $this->today_date);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":rejected_reason", $this->rejected_reason);
        $stmt->bindParam(":leadname", $this->leadname);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, username, emp_id, project_name, project_code, status, work_status, posting_date, task_name, hours, today_date, description, image, rejected_reason, leadname
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
        $this->project_name = $dataRow['project_name'];
        $this->project_code = $dataRow['project_code'];
        $this->status = $dataRow['status'];
        $this->work_status = $dataRow['work_status'];
        $this->posting_date = $dataRow['posting_date'];
        $this->task_name = $dataRow['task_name'];
        $this->hours = $dataRow['hours'];
        $this->today_date = $dataRow['today_date'];
        $this->description = $dataRow['description'];
        $this->image = $dataRow['image'];
        $this->rejected_reason = $dataRow['rejected_reason'];
        $this->leadname = $dataRow['leadname'];


    }
    
    
    // Submit
    
    public function submitTs(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                       
                        status = :status,
                        work_status = :work_status

                    WHERE
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
   
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->work_status = htmlspecialchars(strip_tags($this->work_status));



        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":work_status", $this->work_status);


        if($stmt->execute()){
            return true;
        }
        return false;
    }
    
    // AppUpdate
    
    public function appupdate(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                       
                        task_name = :task_name,
                        hours = :hours,
                        today_date = :today_date,
                        description = :description,
                        image = :image

                    WHERE
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
   
        $this->task_name = htmlspecialchars(strip_tags($this->task_name));
        $this->hours = htmlspecialchars(strip_tags($this->hours));
        $this->today_date = htmlspecialchars(strip_tags($this->today_date));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->image = htmlspecialchars(strip_tags($this->image));



        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":hours", $this->hours);
        $stmt->bindParam(":today_date", $this->today_date);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);


        if($stmt->execute()){
            return true;
        }
        return false;
    }
    

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        username = :username,
                        emp_id = :emp_id,
                        project_name = :project_name,
                        project_code = :project_code,
                        status = :status,
                        work_status = :work_status,
                        posting_date = :posting_date,
                        task_name = :task_name,
                        hours = :hours,
                        today_date = :today_date,
                        description = :description,
                        image = :image,
                        rejected_reason = :rejected_reason,
                        leadname = :leadname

                    WHERE
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->emp_id = htmlspecialchars(strip_tags($this->emp_id));
        $this->project_name = htmlspecialchars(strip_tags($this->project_name));
        $this->project_code = htmlspecialchars(strip_tags($this->project_code));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->work_status = htmlspecialchars(strip_tags($this->work_status));
        $this->posting_date = htmlspecialchars(strip_tags($this->posting_date));
        $this->task_name = htmlspecialchars(strip_tags($this->task_name));
        $this->hours = htmlspecialchars(strip_tags($this->hours));
        $this->today_date = htmlspecialchars(strip_tags($this->today_date));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->rejected_reason = htmlspecialchars(strip_tags($this->rejected_reason));
        $this->leadname = htmlspecialchars(strip_tags($this->leadname));



        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":project_name", $this->project_name);
        $stmt->bindParam(":project_code", $this->project_code);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":work_status", $this->work_status);
        $stmt->bindParam(":posting_date", $this->posting_date);
        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":hours", $this->hours);
        $stmt->bindParam(":today_date", $this->today_date);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":rejected_reason", $this->rejected_reason);
        $stmt->bindParam(":leadname", $this->leadname);


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