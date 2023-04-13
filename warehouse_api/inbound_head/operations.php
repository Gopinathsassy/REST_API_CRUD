
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "wms_management_inbound_head";

    // Columns
    public $id;
    public $GRnum;
    public $vendor;
    public $date;
    public $no_of_item;
    public $note1;
    public $note2;
    // public $vendor;
    // public $uom;




    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, GRnum,vendor, date , no_of_item,note1,note2 FROM  .$this->db_table ORDER BY id DESC " ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        GRnum = :GRnum,
                        vendor = :vendor,
                        date = :date,
                        no_of_item = :no_of_item,
                        note1 = :note1,
                        note2 = :note2
                       
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->GRnum=htmlspecialchars(strip_tags($this->GRnum));
        $this->vendor=htmlspecialchars(strip_tags($this->vendor));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->no_of_item=htmlspecialchars(strip_tags($this->no_of_item));
        
        $this->note1=htmlspecialchars(strip_tags($this->note1));
        $this->note2=htmlspecialchars(strip_tags($this->note2));

   
        


        // bind data
        $stmt->bindParam(":GRnum", $this->GRnum);
        $stmt->bindParam(":vendor", $this->vendor);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":no_of_item", $this->no_of_item);
        
        $stmt->bindParam(":note1", $this->note1);
        $stmt->bindParam(":note2", $this->note2);



        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, GRnum,vendor, date , no_of_item,note1,note2  FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->GRnum = $dataRow['GRnum'];
        $this->vendor = $dataRow['vendor'];
        $this->date = $dataRow['date'];
        $this->no_of_item = $dataRow['no_of_item'];
        $this->note1 = $dataRow['note1'];
        $this->note2 = $dataRow['note2'];
       
   

       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                                                no_of_item = :no_of_item
             
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->no_of_item=htmlspecialchars(strip_tags($this->no_of_item));

       
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":no_of_item", $this->no_of_item);


 
        

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


