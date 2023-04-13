
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_overall_work_hours";

    // Columns
    public $id;
    public $emp_id;
    public $username;
    public $dates;
    public $hours;
    public $location;
    public $note2;
    public $note3;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, emp_id, username,dates, hours, location, note2, note3   FROM  . $this->db_table ORDER BY id DESC  " ;
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
                        dates = :dates,
                        hours = :hours,
                        location = :location,
                        note2 = :note2,
                        note3 = :note3
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->dates=htmlspecialchars(strip_tags($this->dates));
        $this->hours=htmlspecialchars(strip_tags($this->hours));
        $this->location=htmlspecialchars(strip_tags($this->location));
        $this->note2=htmlspecialchars(strip_tags($this->note2));
        $this->note3=htmlspecialchars(strip_tags($this->note3));
  
   
        


        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":dates", $this->dates);
        $stmt->bindParam(":hours", $this->hours);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":note2", $this->note2);
        $stmt->bindParam(":note3", $this->note3);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, username,emp_id, dates, hours, location, note2, note3 
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
        $this->dates = $dataRow['dates'];
        $this->hours = $dataRow['hours'];
        $this->location = $dataRow['location'];
        $this->note2 = $dataRow['note2'];
        $this->note3 = $dataRow['note3'];
   

       
        
    }


    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                   SET
                        id = :id,
                        username = :username,
                        emp_id = :emp_id,
                        dates = :dates,
                        hours = :hours,
                        location = :location,
                        note2 = :note2,
                        note3 = :note3
                       
                    WHERE 
                        id = :id";


        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->emp_id=htmlspecialchars(strip_tags($this->emp_id));
        $this->dates=htmlspecialchars(strip_tags($this->dates));
        $this->hours=htmlspecialchars(strip_tags($this->hours));
        $this->location=htmlspecialchars(strip_tags($this->location));
        $this->note2=htmlspecialchars(strip_tags($this->note2));
        $this->note3=htmlspecialchars(strip_tags($this->note3));
  
      
        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":emp_id", $this->emp_id);
        $stmt->bindParam(":dates", $this->dates);
        $stmt->bindParam(":hours", $this->hours);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":note2", $this->note2);
        $stmt->bindParam(":note3", $this->note3);


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


