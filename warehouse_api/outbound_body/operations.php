
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "wms_management_outbound_data";

    // Columns
    public $id;
    public $delnum;
    public $matcode;
    public $matdesc;
    public $quantity;
    public $scan_date;
    public $scan_time;
    public $serial_num;
     public $uom;
      




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, delnum,matcode, matdesc , quantity, scan_date, scan_time, serial_num,uom FROM  .$this->db_table ORDER BY id DESC " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        delnum = :delnum,
                        matcode = :matcode,
                        matdesc = :matdesc,
                        quantity = :quantity,
                        scan_date = :scan_date,
                        scan_time = :scan_time,
                        serial_num = :serial_num,
                       uom = :uom
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->delnum=htmlspecialchars(strip_tags($this->delnum));
        $this->matcode=htmlspecialchars(strip_tags($this->matcode));
        $this->matdesc=htmlspecialchars(strip_tags($this->matdesc));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->scan_date=htmlspecialchars(strip_tags($this->scan_date));
        $this->scan_time=htmlspecialchars(strip_tags($this->scan_time));
        $this->serial_num=htmlspecialchars(strip_tags($this->serial_num));

          $this->uom=htmlspecialchars(strip_tags($this->uom));
   
        


        // bind data
        $stmt->bindParam(":delnum", $this->delnum);
        $stmt->bindParam(":matcode", $this->matcode);
        $stmt->bindParam(":matdesc", $this->matdesc);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":scan_date", $this->scan_date);
        $stmt->bindParam(":scan_time", $this->scan_time);
        $stmt->bindParam(":serial_num", $this->serial_num);
   
     $stmt->bindParam(":uom", $this->uom);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, delnum,matcode, matdesc , quantity, scan_date, scan_time, serial_num,uom FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->delnum = $dataRow['delnum'];
        $this->matcode = $dataRow['matcode'];
        $this->matdesc = $dataRow['matdesc'];
        $this->quantity = $dataRow['quantity'];
        $this->scan_date = $dataRow['scan_date'];
        $this->scan_time = $dataRow['scan_time'];
        $this->serial_num = $dataRow['serial_num'];
              $this->uom = $dataRow['uom'];
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        delnum = :delnum,
                        matcode = :matcode,
                        matdesc = :matdesc,
                        quantity = :quantity,
                        scan_date = :scan_date,
                        scan_time = :scan_time,
                        serial_num = :serial_num,
                             uom = :uom
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->delnum=htmlspecialchars(strip_tags($this->delnum));
        $this->matcode=htmlspecialchars(strip_tags($this->matcode));
        $this->matdesc=htmlspecialchars(strip_tags($this->matdesc));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->scan_date=htmlspecialchars(strip_tags($this->scan_date));
        $this->scan_time=htmlspecialchars(strip_tags($this->scan_time));
        $this->serial_num=htmlspecialchars(strip_tags($this->serial_num));
      
              $this->uom=htmlspecialchars(strip_tags($this->uom));
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":delnum", $this->delnum);
        $stmt->bindParam(":matcode", $this->matcode);
        $stmt->bindParam(":matdesc", $this->matdesc);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":scan_date", $this->scan_date);
        $stmt->bindParam(":scan_time", $this->scan_time);
        $stmt->bindParam(":serial_num", $this->serial_num);
        
        $stmt->bindParam(":uom", $this->uom);
        
        

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


