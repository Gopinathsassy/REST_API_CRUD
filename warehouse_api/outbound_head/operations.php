
<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "wms_management_outbound_head";

    // Columns
    public $id;
    public $delnum;
    public $date;
    public $no_of_item;
    public $customer;
    public $note1;
    public $note2;
     



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, delnum,date, no_of_item , customer FROM  .$this->db_table ORDER BY id DESC " ;
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
                        date = :date,
                        no_of_item = :no_of_item,
                        customer = :customer,
                        note1 = :note1,
                        note2 = :note2
                       
                    
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->delnum=htmlspecialchars(strip_tags($this->delnum));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->no_of_item=htmlspecialchars(strip_tags($this->no_of_item));
        $this->customer=htmlspecialchars(strip_tags($this->customer));
        $this->note1=htmlspecialchars(strip_tags($this->note1));
        $this->note2=htmlspecialchars(strip_tags($this->note2));
      
  
   
        


        // bind data
        $stmt->bindParam(":delnum", $this->delnum);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":no_of_item", $this->no_of_item);
        $stmt->bindParam(":customer", $this->customer);
        $stmt->bindParam(":note1", $this->note1);
        $stmt->bindParam(":note2", $this->note2);



        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, delnum,date, no_of_item , customer, note1, note2 FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->delnum = $dataRow['delnum'];
        $this->date = $dataRow['date'];
        $this->no_of_item = $dataRow['no_of_item'];
        $this->customer = $dataRow['customer'];
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


