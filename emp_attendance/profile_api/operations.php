
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_user";

    // Columns
    public $id;
    public $username;
    public $emp_id;
    public $user_password;
    public $dob;
    public $date_of_join;
    public $mobile_no;
    public $official_email_id;
    public $module;
    public $job_role;
    public $first_name;
    public $last_name;
    public $user_image;
    public $address;
    public $gender;
    public $is_superuser;
    public $is_active;

    
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, username, emp_id, user_password, dob, date_of_join, mobile_no, official_email_id, module,job_role, user_image, address,gender, 
        first_name, last_name FROM " . $this->db_table . " WHERE is_superuser = '0' AND is_active = '1' ORDER BY id ASC ";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        id                  = :id,
                        emp_id              = :emp_id,
                        user_password       = :user_password,
                        first_name          = :first_name,
                        last_name           = :last_name,
                        official_email_id   = :official_email_id,
                        mobile_no           = :mobile_no,
                        module              = :module,
                        job_role            = :job_role
                        dob                 = :dob,
                        date_of_join        = :date_of_join,
                        user_image        = :user_image,
                        address        = :address,
                        gender        = :gender
                        ";


        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->user_password=htmlspecialchars(strip_tags($this->user_password));
        $this->dob=htmlspecialchars(strip_tags($this->dob));
        $this->date_of_join=htmlspecialchars(strip_tags($this->date_of_join));
        $this->mobile_no=htmlspecialchars(strip_tags($this->mobile_no));
        $this->official_email_id=htmlspecialchars(strip_tags($this->official_email_id));
        $this->module=htmlspecialchars(strip_tags($this->module));
        $this->job_role=htmlspecialchars(strip_tags($this->job_role));
        


        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":user_password", $this->user_password);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":date_of_join", $this->date_of_join);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":official_email_id", $this->official_email_id);
        $stmt->bindParam(":module", $this->module);
        $stmt->bindParam(":job_role", $this->job_role);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id,username,emp_id,user_password,dob,date_of_join,mobile_no,official_email_id,module,job_role
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
        $this->user_password = $dataRow['user_password'];
        $this->dob = $dataRow['dob'];
        $this->date_of_join = $dataRow['date_of_join'];
        $this->mobile_no = $dataRow['mobile_no'];
        $this->official_email_id = $dataRow['official_email_id'];
        $this->module = $dataRow['module'];
        $this->job_role = $dataRow['job_role'];

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        username = :username,
                        emp_id = :emp_id,
                        user_password = :user_password,
                        dob = :dob,
                        date_of_join = :date_of_join,
                        mobile_no = :mobile_no,
                        official_email_id = :official_email_id,
                        module = :module,
                        job_role = :job_role
                       
           
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->user_password=htmlspecialchars(strip_tags($this->user_password));
        $this->dob=htmlspecialchars(strip_tags($this->dob));
        $this->date_of_join=htmlspecialchars(strip_tags($this->date_of_join));
        $this->mobile_no=htmlspecialchars(strip_tags($this->mobile_no));
        $this->official_email_id=htmlspecialchars(strip_tags($this->official_email_id));
        $this->module=htmlspecialchars(strip_tags($this->module));
        $this->job_role=htmlspecialchars(strip_tags($this->job_role));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":user_password", $this->user_password);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":date_of_join", $this->date_of_join);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":official_email_id", $this->official_email_id);
        $stmt->bindParam(":module", $this->module);
        $stmt->bindParam(":job_role", $this->job_role);


        

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


