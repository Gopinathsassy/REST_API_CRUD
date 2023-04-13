
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "wms_management_material_stock";

    // Columns
    public $id;
    public $mat_code;
    public $mat_desc;
    public $curr_stock;
    public $uom;
    public $note1;
    public $note2;
    // public $attendance_form;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, mat_code,mat_desc, curr_stock, uom,note1,note2 FROM  .$this->db_table " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        mat_code = :mat_code,
                        mat_desc = :mat_desc,
                        curr_stock = :curr_stock,
                        uom = :uom,
                        note1 = :note1,
                        note2 = :note2,
                        // attendance_form = :attendance_form
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->mat_code=htmlspecialchars(strip_tags($this->mat_code));
        $this->mat_desc=htmlspecialchars(strip_tags($this->mat_desc));
        $this->curr_stock=htmlspecialchars(strip_tags($this->curr_stock));
        $this->uom=htmlspecialchars(strip_tags($this->uom));
        $this->note1=htmlspecialchars(strip_tags($this->note1));
        $this->note2=htmlspecialchars(strip_tags($this->note2));
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
  
   
        


        // bind data
        $stmt->bindParam(":mat_code", $this->mat_code);
        $stmt->bindParam(":mat_desc", $this->mat_desc);
        $stmt->bindParam(":curr_stock", $this->curr_stock);
        $stmt->bindParam(":uom", $this->uom);
        $stmt->bindParam(":note1", $this->note1);
        $stmt->bindParam(":note2", $this->note2);
        // $stmt->bindParam(":attendance_form", $this->attendance_form);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, mat_code,mat_desc, curr_stock  FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->mat_code = $dataRow['mat_code'];
        $this->mat_desc = $dataRow['mat_desc'];
        $this->curr_stock = $dataRow['curr_stock'];
        $this->uom = $dataRow['uom'];
        $this->note1 = $dataRow['note1'];
        $this->note2 = $dataRow['note2'];
        // $this->attendance_form = $dataRow['attendance_form'];
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        
                        curr_stock = :curr_stock
                        
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
   
        $this->curr_stock=htmlspecialchars(strip_tags($this->curr_stock));
   
        // $this->attendance_form=htmlspecialchars(strip_tags($this->attendance_form));
       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
  
        $stmt->bindParam(":curr_stock", $this->curr_stock);

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


