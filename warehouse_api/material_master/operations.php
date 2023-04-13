
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "wms_management_material_master";

    // Columns
    public $id;
    public $MatCode;
    public $MatDesc;
    public $Uom;
    public $note1;
    public $note2;
    // public $user_total_hours;
    // public $attendance_form;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, MatCode,MatDesc, Uom, note1, note2  FROM  .$this->db_table " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        MatCode = :MatCode,
                        MatDesc = :MatDesc,
                        Uom = :Uom,
                        note1 = :note1,
                        note2 = :note2,
                        // user_total_hours = :user_total_hours,
                        // attendance_form = :attendance_form
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->MatCode=htmlspecialchars(strip_tags($this->MatCode));
        $this->MatDesc=htmlspecialchars(strip_tags($this->MatDesc));
        $this->Uom=htmlspecialchars(strip_tags($this->Uom));
        $this->note1=htmlspecialchars(strip_tags($this->note1));
        $this->note2=htmlspecialchars(strip_tags($this->note2));
        // $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
  
   
        


        // bind data
        $stmt->bindParam(":MatCode", $this->MatCode);
        $stmt->bindParam(":MatDesc", $this->MatDesc);
        $stmt->bindParam(":Uom", $this->Uom);
        $stmt->bindParam(":note1", $this->note1);
        $stmt->bindParam(":note2", $this->note2);
        // $stmt->bindParam(":user_total_hours", $this->user_total_hours);
        // $stmt->bindParam(":attendance_form", $this->attendance_form);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, MatCode,MatDesc, Uom  FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->MatCode = $dataRow['MatCode'];
        $this->MatDesc = $dataRow['MatDesc'];
        $this->Uom = $dataRow['Uom'];
        $this->note1 = $dataRow['note1'];
        $this->note2 = $dataRow['note2'];
        // $this->user_total_hours = $dataRow['user_total_hours'];
        // $this->attendance_form = $dataRow['attendance_form'];
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        MatCode = :MatCode,
                        MatDesc = :MatDesc,
                        Uom = :Uom,
                        note1 = :note1,
                        note2 = :note2,
                        // user_total_hours = :user_total_hours,
                        // attendance_form = :attendance_form
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->MatCode=htmlspecialchars(strip_tags($this->MatCode));
        $this->MatDesc=htmlspecialchars(strip_tags($this->MatDesc));
        $this->Uom=htmlspecialchars(strip_tags($this->Uom));
        $this->note1=htmlspecialchars(strip_tags($this->note1));
        $this->note2=htmlspecialchars(strip_tags($this->note2));
        // $this->user_total_hours=htmlspecialchars(strip_tags($this->user_total_hours));
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":MatCode", $this->MatCode);
        $stmt->bindParam(":MatDesc", $this->MatDesc);
        $stmt->bindParam(":Uom", $this->Uom);
        $stmt->bindParam(":note1", $this->note1);
        $stmt->bindParam(":note2", $this->note2);
        // $stmt->bindParam(":user_total_hours", $this->user_total_hours);
        // $stmt->bindParam(":attendance_form", $this->attendance_form);

 
        

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


