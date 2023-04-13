
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "attendance_tools_emp_location";

    // Columns
    public $id;
    public $name;
    public $lat;
    public $lon;
    public $status;
    public $added_by;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id,name,lat, lon, status, added_by  FROM " . $this->db_table . " WHERE status = 'approved'" ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        name = :name,
                        lat = :lat,
                        lon = :lon,
                        status = :status,
                        added_by = :added_by
                   
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->lat=htmlspecialchars(strip_tags($this->lat));
        $this->lon=htmlspecialchars(strip_tags($this->lon));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->added_by=htmlspecialchars(strip_tags($this->added_by));

   
        


        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lat", $this->lat);
        $stmt->bindParam(":lon", $this->lon);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":added_by", $this->added_by);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id,name,lat, lon, status 
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
        $this->name = $dataRow['name'];
        $this->lat = $dataRow['lat'];
        $this->lon = $dataRow['lon'];
        $this->status = $dataRow['status'];


       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        name = :name,
                        lat = :lat,
                        lon = :lon,
                        status = :status,
                     
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->lat=htmlspecialchars(strip_tags($this->lat));
        $this->lon=htmlspecialchars(strip_tags($this->lon));
        $this->status=htmlspecialchars(strip_tags($this->status));

        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lat", $this->lat);
        $stmt->bindParam(":lon", $this->lon);
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


