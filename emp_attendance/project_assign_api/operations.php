
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_assign_project";

    // Columns
    public $id;
    public $project_code;
    public $job_name;
    public $project_name;
    public $username_assign;





    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, project_code,job_name, project_name, username_assign  FROM " . $this->db_table  ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        project_code = :project_code,
                        job_name = :job_name,
                        project_name = :project_name,
                        username_assign = :username_assign,
                     
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->project_code=htmlspecialchars(strip_tags($this->project_code));
        $this->job_name=htmlspecialchars(strip_tags($this->job_name));
        $this->project_name=htmlspecialchars(strip_tags($this->project_name));
        $this->username_assign=htmlspecialchars(strip_tags($this->username_assign));
     
  
   
        


        // bind data
        $stmt->bindParam(":project_code", $this->project_code);
        $stmt->bindParam(":job_name", $this->job_name);
        $stmt->bindParam(":project_name", $this->project_name);
        $stmt->bindParam(":username_assign", $this->username_assign);
     

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, project_code,job_name, project_name, username_assign FROM ". $this->db_table ."  WHERE 
                       id = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->project_code = $dataRow['project_code'];
        $this->job_name = $dataRow['job_name'];
        $this->project_name = $dataRow['project_name'];
        $this->username_assign = $dataRow['username_assign'];
    
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        project_code = :project_code,
                        job_name = :job_name,
                        project_name = :project_name,
                        username_assign = :username_assign,
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->project_code=htmlspecialchars(strip_tags($this->project_code));
        $this->job_name=htmlspecialchars(strip_tags($this->job_name));
        $this->project_name=htmlspecialchars(strip_tags($this->project_name));
        $this->username_assign=htmlspecialchars(strip_tags($this->username_assign));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
           $stmt->bindParam(":project_code", $this->project_code);
        $stmt->bindParam(":job_name", $this->job_name);
        $stmt->bindParam(":project_name", $this->project_name);
        $stmt->bindParam(":username_assign", $this->username_assign);
     
 
        

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


