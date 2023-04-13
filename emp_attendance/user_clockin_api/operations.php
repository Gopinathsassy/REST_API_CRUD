
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_user_clock_in";

    // Columns
    public $id;
    public $curr_date;
    public $curr_time;
    public $username;
    public $emp_id;
    public $button_color;
    public $button_id;
    public $button_name;
    public $location;
    public $status;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, curr_date,curr_time, username, emp_id, button_color, button_id, button_name ,location, status FROM " . $this->db_table  ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        curr_date = :curr_date,
                        curr_time = :curr_time,
                        username = :username,
                        emp_id = :emp_id,
                        button_color = :button_color,
                        button_id = :button_id,
                        button_name = :button_name,
                        location = :location,
                        status = :status
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->curr_date=htmlspecialchars(strip_tags($this->curr_date));
        $this->curr_time=htmlspecialchars(strip_tags($this->curr_time));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->button_color=htmlspecialchars(strip_tags($this->button_color));
        $this->button_id=htmlspecialchars(strip_tags($this->button_id));
        $this->button_name=htmlspecialchars(strip_tags($this->button_name));
        $this->location=htmlspecialchars(strip_tags($this->location));
        $this->status=htmlspecialchars(strip_tags($this->status));
  
   
        


        // bind data
        $stmt->bindParam(":curr_date", $this->curr_date);
        $stmt->bindParam(":curr_time", $this->curr_time);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":button_color", $this->button_color);
        $stmt->bindParam(":button_id", $this->button_id);
        $stmt->bindParam(":button_name", $this->button_name);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":status", $this->status);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, curr_date,curr_time, username, emp_id, button_color, button_id, button_name ,location, status 
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
        $this->curr_date = $dataRow['curr_date'];
        $this->curr_time = $dataRow['curr_time'];
        $this->username = $dataRow['username'];
        $this->emp_id = $dataRow['emp_id'];
        $this->button_color = $dataRow['button_color'];
        $this->button_id = $dataRow['button_id'];
        $this->button_name = $dataRow['button_name'];
        $this->location = $dataRow['location'];
        $this->status = $dataRow['status'];
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        
                        curr_date = :curr_date,
                        curr_time = :curr_time,
                        username = :username,
                        emp_id = :emp_id,
                        button_color = :button_color,
                        button_id = :button_id,
                        button_name = :button_name,
                        location = :location,
                        status = :status
                       
                    WHERE 
                        emp_id = :emp_id";

        $stmt = $this->conn->prepare($sqlQuery);

        
        $this->curr_date=htmlspecialchars(strip_tags($this->curr_date));
        $this->curr_time=htmlspecialchars(strip_tags($this->curr_time));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->button_color=htmlspecialchars(strip_tags($this->button_color));
        $this->button_id=htmlspecialchars(strip_tags($this->button_id));
        $this->button_name=htmlspecialchars(strip_tags($this->button_name));
        $this->location=htmlspecialchars(strip_tags($this->location));
        $this->status=htmlspecialchars(strip_tags($this->status));
  
       
        


        // bind data
     
        $stmt->bindParam(":curr_date", $this->curr_date);
        $stmt->bindParam(":curr_time", $this->curr_time);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":button_color", $this->button_color);
        $stmt->bindParam(":button_id", $this->button_id);
        $stmt->bindParam(":button_name", $this->button_name);
        $stmt->bindParam(":location", $this->location);
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


